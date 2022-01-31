<?php
function devco_register_blocks() {

	// Check if Gutenberg is active.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	// Add block script.
	wp_register_script(
		'call-to-action',
        get_template_directory() . '/inc/blocks/call-to-action/call-to-action.js',
		[ 'wp-blocks', 'wp-element', 'wp-editor' ],
		filemtime( get_template_directory() . '/inc/blocks/call-to-action/call-to-action.js' )
	);
	wp_register_style(
		'call-to-action',
        get_template_directory() . '/inc/blocks/call-to-action/call-to-action.css',
		[],
		filemtime( get_template_directory() . '/inc/blocks/call-to-action/call-to-action.css' )
	);

	// Register block script and style.
	register_block_type( 'devco/call-to-action', [
		'style' => 'call-to-action', // Loads both on editor and frontend.
		'editor_script' => 'call-to-action', // Loads only on editor.
	] );
}

add_action( 'init', 'devco_register_blocks' );
?>