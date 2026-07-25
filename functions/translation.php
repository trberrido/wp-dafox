<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'after_setup_theme', 'df__load_textdomain' );
function df__load_textdomain(): void {
	load_theme_textdomain( 'df', get_parent_theme_file_path( 'languages/' ) );
}