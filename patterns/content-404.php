<?php
/**
 * Title: Content 404
 * Slug: df/content-404
 * Description: Content of the 404 template
 *
 */

?>
<!-- wp:group {"backgroundColor":"neutral-700","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-neutral-700-background-color has-background">
	<!-- wp:group {"tagName":"main", "style":{"spacing":{"padding":{"top":"var:preset|spacing|600","bottom":"var:preset|spacing|600","left":"var:preset|spacing|600","right":"var:preset|spacing|600"}},"layout":{"selfStretch":"fit","flexSize":""}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--600);padding-right:var(--wp--preset--spacing--600);padding-bottom:var(--wp--preset--spacing--600);padding-left:var(--wp--preset--spacing--600)">

		<!-- wp:heading {"level":1} -->
		<h1 class="wp-block-heading">
			<?php esc_html_e( 'Page not found', 'df' ); ?>
		</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>
			<?php	echo sprintf(
						__( 'Error <em>404</em>: This page has no content.<br><a href="%s">Return to the homepage</a>.', 'df' ),
						esc_url( home_url( '/', 'https' ) )
					);
			?>
		</p>
		<!-- /wp:paragraph -->

		<!-- wp:spacer {"height":"0px","style":{"layout":{"selfStretch":"fixed","flexSize":"10rem"}}} -->
		<div style="height:0px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

	</main>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->