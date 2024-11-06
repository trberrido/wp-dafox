<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'init', 'df__register_blocks_types' );
function df__register_blocks_types(): void {

	foreach ( glob( get_stylesheet_directory() . '/blocks/build/*' ) as $block_directory ) {
		register_block_type( $block_directory );
	}

}