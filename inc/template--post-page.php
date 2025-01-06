<?php defined('ABSPATH') or die();

add_action( 'init', 'df__template__post' );
function df__template__post(): void {

	$template = [
		['core/columns', ['className' => 'df-content'],
			[
				[ 'core/column', ['className' => 'df-content-column'], [ ['core/paragraph', ['placeholder'=>'Enter your text here…'], []] ] ],
				[ 'core/column', ['className' => 'df-aside-column'],[ ['core/paragraph', ['placeholder'=>'Enter more text here…'], []] ] ]
			]
		]
	];

	$post_type = get_post_type_object( 'post' );
	$post_type->template = $template;

	$post_type = get_post_type_object( 'page' );
	$post_type->template = $template;

}