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

/*
	In .htacces:
	<Files xmlrpc.php>
		order deny,allow
		deny from all
	</Files>
*/