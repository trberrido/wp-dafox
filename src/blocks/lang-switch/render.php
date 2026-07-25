<?php

	if ( is_home() || is_404() ){
		$current_url = home_url( '/' );
	} else {
		$current_url = get_the_permalink();
	}

	if ( get_locale() === 'en_US' ){
		$languages = array(
			array(
				'label' => 'français',
				'tag'	=> 'a',
				'href'	=> str_replace( '/en/', '/', $current_url )
			),
			array(
				'label' => 'english',
				'tag'	=> 'span'
			)
		);
	} else {
		$languages = array(
			array(
				'label' => 'français',
				'tag'	=> 'span',
				'class'	=> ''
			),
			array(
				'label' => 'english',
				'tag'	=> 'a',
				'href'	=> home_url( '/en' . parse_url( $current_url, PHP_URL_PATH ) )
			)
		);
	}

?>

<p <?php echo get_block_wrapper_attributes(); ?>>
	Switch language : <?php

		foreach ( $languages as $language ) :
			echo '<' . $language['tag'] . ( isset( $language['href'] ) ? ' href="' . esc_attr( $language['href'] ) . '"' : '') . ' class="wp-block-df-lang-switch__item">' . $language['label'] . '</' . $language['tag'] . '>';
		endforeach;

	?>
</p>
