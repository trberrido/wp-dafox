<?php defined('ABSPATH') or die();

add_action( 'init', 'df__register_menu' );
function df__register_menu() {
	register_nav_menus( array( 'footer' => 'Footer navigation' ) );
}