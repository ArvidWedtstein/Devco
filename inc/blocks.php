<?php
function devco_register_blocks() {

	// Check if Gutenberg is active.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	$version = wp_get_theme()->get( 'Version' );
	// Add block script.
	wp_register_script(
		'call-to-action',
        get_template_directory_uri() . '/inc/blocks/call-to-action/call-to-action.js',
		[ 'wp-blocks', 'wp-element', 'wp-editor' ],
		$version
		// filemtime( get_template_directory_uri() . '/inc/blocks/call-to-action/call-to-action.js' )
	);
	wp_register_style(
		'call-to-action',
        get_template_directory_uri() . '/inc/blocks/call-to-action/call-to-action.css',
		[],
		$version
		// filemtime( get_template_directory_uri() . '/inc/blocks/call-to-action/call-to-action.css' )
	);

	// Register block script and style.
	register_block_type( 'devco/call-to-action', [
		'style' => 'call-to-action', // Loads both on editor and frontend.
		'editor_script' => 'call-to-action', // Loads only on editor.
	] );


	// test
	
	wp_register_script(
		'project',
        get_template_directory_uri() . '/inc/blocks/project/project.js',
		[ 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components' ],
		$version
		// filemtime( get_template_directory_uri() . '/inc/blocks/project/project.js' )
	);
	wp_register_style(
		'project',
        get_template_directory_uri() . '/inc/blocks/project/project.css',
		[],
		$version
		// filemtime(get_template_directory_uri() . '/inc/blocks/project/project.css')
	);

	// Register block script and style.
	register_block_type( 'devco/project', [
		'style' => 'project', // Loads both on editor and frontend.
		'editor_script' => 'project', // Loads only on editor.
	] );


	register_block_type(__DIR__);
}

add_action( 'init', 'devco_register_blocks' );
?>