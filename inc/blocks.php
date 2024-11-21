<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'df__register_blocks_types' );
function df__register_blocks_types(): void {

	wp_register_block_metadata_collection(
		get_stylesheet_directory() . '/blocks/build/',
		get_stylesheet_directory() . '/blocks/build/blocks-manifest.php',
	);

	foreach ( glob( get_stylesheet_directory() . '/blocks/build/*' ) as $block_directory ) {
		register_block_type( $block_directory );
	}

}

add_action( 'init', 'df__block_binding__register_source' );
function df__block_binding__register_source(): void {

	$sources = array(
		'df/year' => array(
			'label'					=> 'Display current year',
			'get_value_callback'	=> 'df__binding_source__current_year'
		),
		'df/site-description' => array(
			'label'					=> 'Display the site description',
			'get_value_callback'	=> 'df__binding_source__site_description'
		)
	);

	foreach ( $sources as $source_name => $source_properties ) {
		register_block_bindings_source( $source_name, $source_properties );
	};

}

function df__binding_source__current_year(): string {
	return 'da fox ' . date( 'Y' );
}

function df__binding_source__site_description(): string {
	// cf inc/options.php
	return get_option( 'df__site_description', '' );
}

add_action( 'init', 'df__enqueue_blocks_styles' );
function df__enqueue_blocks_styles(): void {

	$blocks_css_directory = '/assets/css/blocks/';
	foreach ( glob( get_stylesheet_directory() . $blocks_css_directory . '*', GLOB_ONLYDIR ) as $directory ) {
		$namespace = basename( $directory );
		foreach ( glob( $directory . '/*.css' ) as $css_file ) {
			$blockname = basename( $css_file, '.css' );
			wp_enqueue_block_style(
				$namespace . '/' . $blockname,
				array(
					'handle'	=> 'df-' . $namespace . '-' . $blockname,
					'src'		=> get_template_directory_uri() . $blocks_css_directory . $namespace . '/' . $blockname . '.css',
					'path'		=> get_template_directory() . $blocks_css_directory . $namespace . '/' . $blockname . '.css',
					'ver'		=> filemtime( get_template_directory() . $blocks_css_directory . $namespace . '/' . $blockname . '.css' )
				)
			);
		}
	}

}