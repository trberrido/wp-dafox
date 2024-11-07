<?php defined('ABSPATH') or die();

add_action( 'init', 'df__block_binding__register_source' );

function df__block_binding__register_source(): void {
	register_block_bindings_source(
		'df/year',
		array(
			'label'					=> 'Display current year',
			'get_value_callback'	=> 'df__binding_source__current_year'
	 ) );

}

function df__binding_source__current_year(): string {
	return 'da fox ' . date( 'Y' );
}