<?php

	//var_dump($block);

	$taxonomy = $attributes['taxonomy'];
	$post_id = $block->context['postId'];

	if ( empty( $post_id ) || empty( $taxonomy ) ) {
		return ;
	}

	$terms = get_the_terms( $post_id, $taxonomy );

	if ( $terms === false || is_wp_error( $terms ) ) {
		return ;
	}

?>

<ul <?php echo get_block_wrapper_attributes(); ?>>
	<?php foreach ( $terms as $term ) : ?>
		<li><?php echo esc_html( $term->name ); ?></li>
	<?php endforeach; ?>
</ul>