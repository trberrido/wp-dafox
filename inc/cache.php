<?php defined('ABSPATH') or die();

const DF__CACHE__TIME = 2592000;

add_action( 'after_setup_theme', 'df__cache__init' );
add_action( 'init', 'df__cache__get_page' );
add_action( 'template_redirect', 'df__cache__start' );
add_action( 'shutdown', 'df__cache__stop' );
add_action( 'save_post', 'df__cache__clear' );
add_action( 'delete_post', 'df__cache__clear' );

function df__cache__dont_run(): bool {
	if ( is_admin()
	|| ( !is_singular( ['post', 'page'] ) && !is_home() )
	|| defined( 'DOING_AJAX' ) || defined( 'DOING_CRON' ) || wp_is_serving_rest_request() ){
		return true;
	}
	return false;
}

function df__cache__get_dir(): string {
	$upload_dir = wp_upload_dir();
	$cache_dir = $upload_dir['basedir'] . '/df-cache';
	return $cache_dir;
}

function df__cache__generate_key(): string {
	return md5( $_SERVER['REQUEST_URI'] );
}

function df__cache__get_file(): string {
	$cache_key = df__cache__generate_key();
	$cache_dir = df__cache__get_dir();
	return $cache_dir . '/' . $cache_key . '.html.gz';
}

function df__cache__init(): void {
	$cache_dir = df__cache__get_dir();
	if ( !file_exists( $cache_dir ) ){
		wp_mkdir_p( $cache_dir );
	}
};

function df__cache__start(): void {

	if ( df__cache__dont_run() ){
		return ;
	}

	$cache_file = df__cache__get_file();

	if ( !file_exists( $cache_file )
	|| time() - filemtime( $cache_file ) > DF__CACHE__TIME ){
		wp_delete_file( $cache_file );
		ob_start( 'df__cache__output' );
		echo '<!--cached-->';
	}

}

function df__cache__output( $content ): bool | string {

	$cache_file = df__cache__get_file();
	$content_compressed = gzencode( $content, 9 );

	file_put_contents( $cache_file, $content_compressed );

	return $content;

}

function df__cache__get_page(): void {

	if ( df__cache__dont_run() ){
		return ;
	}

	$cache_file = df__cache__get_file();

	if ( file_exists( $cache_file )
		&& time() - filemtime( $cache_file ) < DF__CACHE__TIME ){
		header('Content-Type: text/html; charset=UTF-8');
		header('Content-Encoding: gzip');
		header('Cache-Control: public, max-age=' . DF__CACHE__TIME );
		readfile( $cache_file );
		exit ;
	}

}

function df__cache__clear( $post_id ): void {
	$files = glob( df__cache__get_dir() . '/*' );
	foreach ( $files as $file ){
		if ( is_file( $file ) ){
			wp_delete_file( $file );
		}
	}
}

function df__cache__stop(): void {
	while ( ob_get_level() > 0 ) {
		ob_clean_end();
	}
}