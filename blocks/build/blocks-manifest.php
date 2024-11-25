<?php
// This file is generated. Do not modify it manually.
return array(
	'lang-switch' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'df/lang-switch',
		'version' => '0.1.0',
		'title' => 'Languages switcher',
		'category' => 'widgets',
		'icon' => 'update',
		'description' => 'Add a link to the related article in the alternate language',
		'supports' => array(
			'html' => false
		),
		'usesContext' => array(
			'postId'
		),
		'textdomain' => 'df',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'menu-fetcher' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'df/menu-fetcher',
		'version' => '0.1.0',
		'title' => 'Menu fetcher',
		'category' => 'widgets',
		'icon' => 'menu',
		'description' => 'Display a classic menu',
		'supports' => array(
			'html' => false,
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'layout' => array(
				'allowOrientation' => true,
				'default' => array(
					'orientation' => 'horizontal'
				),
				'allowSwitching' => true
			)
		),
		'attributes' => array(
			'selectedMenu' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'textdomain' => 'df',
		'editorStyle' => 'file:./index.css',
		'editorScript' => 'file:./index.js',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	),
	'post-taxonomies' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'df/post-taxonomies',
		'version' => '0.1.0',
		'title' => 'Post terms',
		'category' => 'widgets',
		'icon' => 'tag',
		'description' => 'Display a list of a post\'s terms of s specific taxonomy',
		'supports' => array(
			'html' => false,
			'color' => array(
				'text' => true
			),
			'typography' => array(
				'fontSize' => true,
				'__experimentalFontWeight' => true,
				'__experimentalTextTransform' => true
			)
		),
		'textdomain' => 'df',
		'attributes' => array(
			'taxonomy' => array(
				'type' => 'string',
				'default' => ''
			)
		),
		'usesContext' => array(
			'postId'
		),
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php'
	)
);
