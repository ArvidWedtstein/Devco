<?php
/**
 * Dark footer wtih title and citation
 */
return array(
	'title'      => __( 'Dark footer with title and citation', 'Featured' ),
	'categories' => array( 'Featured' ),
	'blockTypes' => array( 'core/template-part/Featured' ),
	'content'    => '<!-- wp:group {"align":"full","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}},"spacing":{"padding":{"top":"var(--wp--custom--spacing--small, 1.25rem)","bottom":"var(--wp--custom--spacing--small, 1.25rem)"}}},"backgroundColor":"foreground","textColor":"background","layout":{"inherit":true}} -->
					<div class="wp-block-group alignfull has-background-color has-foreground-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--custom--spacing--small, 1.25rem);padding-bottom:var(--wp--custom--spacing--small, 1.25rem)"><!-- wp:group {"align":"wide","layout":{"type":"flex","justifyContent":"space-between"}} -->
					<div class="wp-block-group alignwide"><!-- wp:site-title {"level":0} /-->

					<!-- wp:paragraph {"align":"right"} -->
					<p class="has-text-align-right">' .
					sprintf(
						/* Translators: WordPress link. */
						esc_html__( 'Proudly powered by %s', 'devco' ),
						'<a href="' . esc_url( __( 'https://wordpress.org', 'devco' ) ) . '" rel="nofollow">Devco</a>'
					) . '</p>
					<!-- /wp:paragraph --></div>
					<!-- /wp:group --></div>
					<!-- /wp:group -->',
);
