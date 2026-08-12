<?php defined('ABSPATH') or die();

add_action( 'wp_enqueue_scripts', function () {

	foreach ( glob( get_template_directory() . '/assets/styles/*.css' ) as $css_file ) {
		$handle = 'df-styles-' . basename( $css_file, '.css' );
		$inline_css = file_get_contents( $css_file );
		wp_register_style( $handle, false );
		wp_enqueue_style( $handle, false );
		wp_add_inline_style( $handle, $inline_css );
	}

});