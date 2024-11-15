<?php defined('ABSPATH') or die();

add_filter( 'image_editor_output_format', 'df__filter_image_editor_output_format' );

function df__filter_image_editor_output_format( array $formats ): array {
	$formats['image/jpeg'] = 'image/avif';
	$formats['image/png'] = 'image/avif';
	return $formats;
}