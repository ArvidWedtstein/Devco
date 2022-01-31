<?php

function Devco_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'Devco' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'Devco' ) ),
		'header'   => array( 'label' => __( 'Headers', 'Devco' ) ),
		'query'    => array( 'label' => __( 'Query', 'Devco' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'Devco' ) ),
		'devco'    => array( 'label' => __( 'Devco', 'text-domain' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since Devco 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'Devco_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'footer-dark',
		'hex-grid'
	);

	$block_patterns = apply_filters( 'Devco_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'Devco/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'Devco_register_block_patterns', 9 );

?>