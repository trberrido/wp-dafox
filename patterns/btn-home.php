<?php

/**
 * Title: Button Home
 * Slug: df/btn-home
 * Description: Basic Back Home button
 */

?>

<!-- wp:paragraph {"className":"df-btn-home"} -->
<p>
    <a class="df-btn-home" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php echo __( '← Back Home', 'df' ); ?>
    </a>
</p>
<!-- /wp:paragraph -->