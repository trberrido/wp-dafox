<?php defined('ABSPATH') or die();

add_action( 'init', 'df__register_taxonomy__client' );

function df__register_taxonomy__client(): void {

	$labels = array(
		'name'					=> 'Clients',
		'singular_name'			=> 'Client',
		'search_items'			=> 'Search',
		'popular_items'			=> 'Popular',
		'all_items'				=> 'All clients',
		'parent_client'			=> 'Parent',
		'edit_item'				=> 'Edit',
		'view_item'				=> 'View',
		'update_item'			=> 'Update',
		'add_new_item'			=> 'Add new',
		'new_item_name'			=> 'New name',
		'template_name'			=> 'Client Archives',
		'add_or_remove_item'	=> 'Add or remove',
	);

	$args = array(
		'labels'				=> $labels,
		'hierarchical'			=> false,
		'public'				=> true,
		'publicly_queryable'	=> false,
		'rewrite'				=> false,
		'show_in_rest'			=> true,
		'show_admin_column'		=> true
	);

	register_taxonomy(
		'df__taxonomy__client',
		'post',
		$args
	);

}