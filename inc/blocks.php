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
	/*
		Used to display site description ;
		the data is registered here `inc/options.php`
	*/
	return get_option( 'df__site_description', '' );
}