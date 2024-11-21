<?php if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'admin_init', 'df__options__register' );

// Add custom setting to General Settings
function df__options__register(): void {

	register_setting(
		'general',
		'df__site_description',
		array(
			'type'				=> 'string',
			'sanitize_callback'	=> 'wp_kses_post',
			'default'			=> '',
		)
	);

	add_settings_field(
		'df__site_description',
		'Extended Description',
		'df__options__site_description__field__callback',
		'general',
		'df__options__section'
	);

	add_settings_section(
		'df__options__section',
		'Additional Description',
		'df__options__section__callback',
		'general'
	);

}

function df__options__section__callback() {
	echo '<p>Add an extended description with rich text formatting</p>';
}

function df__options__site_description__field__callback(): void {

	$value = get_option( 'df__site_description', '' );
	wp_editor(
		$value,
		'df__site_description',
		array(
			'textarea_name' => 'df__site_description',
			'media_buttons' => true,
			'teeny'			=> false,
			'textarea_rows' => 5,
		)
	);

}