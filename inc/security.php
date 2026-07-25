<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'rest_endpoints', 'df__remove_users_endpoints');
function df__remove_users_endpoints( $endpoints ): array {

	if ( isset( $endpoints['/wp/v2/users'] ) ) {
		unset( $endpoints['/wp/v2/users'] );
	}
	if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
		unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}

	return $endpoints;

}

remove_action( 'wp_head', 'wp_generator' );

// removing comment feature
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_action( 'admin_init', function () {
    foreach ( get_post_types() as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
});
add_filter( 'rest_endpoints', function ( $endpoints ) {
    if ( isset( $endpoints['/wp/v2/comments'] ) ) {
        unset( $endpoints['/wp/v2/comments'] );
    }
    return $endpoints;
});

/*
	- Disallow xmlrpc.php access, in .htacces:
	<Files xmlrpc.php>
		order deny,allow
		deny from all
	</Files>

	- Disallow file editing, in wp-config.php:
	define( 'DISALLOW_FILE_EDIT', true );
	define( 'DISALLOW_FILE_MODS', true );
*/