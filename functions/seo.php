<?php defined('ABSPATH') or die();

add_post_type_support( 'page', 'excerpt' );

add_action( 'wp_head', 'df__metas' );
function df__metas(): void {

	if ( is_singular( 'post' ) ){
		$image = get_the_post_thumbnail_url();
	} else {
		$image = get_site_icon_url();
	}

	if ( is_home() ) {
		$description = get_bloginfo( 'description' );
		$title = 'da fox';
	} else if ( is_404() ) {
		$description = __( 'Page not found', 'df' );
	} else {
		$description = strip_tags( get_the_excerpt() );
		$title = get_the_title();
	}

	$canonical = get_the_permalink();

?>

	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<link rel="canonical" href="<?php echo esc_attr( $canonical ); ?>" />
	<meta property="og:site_name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo esc_attr( $canonical ); ?>" />
	<meta property="og:image" content="<?php echo esc_attr( $image ); ?>" />
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>" />

<?php

}

add_action( 'template_redirect', 'df__remove_archives' );
function df__remove_archives(): void {
	if ( is_archive() ) {
		wp_redirect( esc_url( home_url( '/' ) ), 301 );
		exit;
	}
}

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );

add_filter(
    'wp_sitemaps_add_provider',
    function( $provider, $name ) {
        if ( 'users' === $name ) {
            return false;
        }
		if ( 'taxonomies' === $name ) {
			return false;
		}
        return $provider;
    },
    10,
    2
);

add_action( 'init', 'df__disable_emojis' );
function df__disable_emojis(): void {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}