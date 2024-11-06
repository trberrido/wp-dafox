<?php if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Load CSS styles only if the associated block is actually present on the document
 */

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