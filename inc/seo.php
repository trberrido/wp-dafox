<?php defined('ABSPATH') or die();

add_action( 'wp_head', 'df__metas' );

function df__metas(): void {

	if ( is_singular( 'post' ) ){
		$image = get_the_post_thumbnail_url();
	} else {
		$image = get_template_directory_uri() . '/screenshot.png';
	}

	if ( is_home() ) {
		$description = get_bloginfo( 'description' );
		$title = 'da fox';
	} else {
		$description = strip_tags( get_the_excerpt() );
		$title = get_the_title();
	}

	$canonical = get_the_permalink();

?>

	<meta name="description" content="<?php echo esc_html( $description ); ?>">
	<link rel="canonical" href="<?php echo esc_html( $canonical ); ?>" />
	<meta property="og:site_name" content="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" />
	<meta property="og:title" content="<?php echo esc_html( $title ); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo esc_html( $canonical ); ?>" />
	<meta property="og:image" content="<?php echo $image; ?>" />
	<meta property="og:description" content="<?php echo esc_html( $description ); ?>" />

<?php

}