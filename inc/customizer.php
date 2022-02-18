<?php

/**
* Create Logo Setting and Upload Control
*/
function devco_new_customizer_settings($wp_customize) {
    // add a setting for the site logo
    $wp_customize -> add_setting('devco_theme_logo');
    // Add a control to upload the logo
    $wp_customize -> add_control( new WP_Customize_Image_Control( $wp_customize, 'devco_theme_logo',
    array(
    'label' => 'Upload Logo',
    'section' => 'title_tagline',
    'settings' => 'devco_theme_logo',
    )));

    $wp_customize -> add_setting('devco_color');
    // Add a control to upload the logo
    $wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'devco_color',
    array(
    'label' => 'Color',
    'section' => 'title_tagline',
    'settings' => 'devco_color',
    )));
}
add_action('customize_register', 'devco_new_customizer_settings');


/*function devco_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'devco_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'devco_customize_partial_blogdescription',
			)
		);
	}
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => 'default',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'devco_sanitize_color_option',
		)
	);

	$wp_customize->add_control(
		'primary_color',
		array(
			'type'     => 'radio',
			'label'    => __( 'Primary Color', 'devco' ),
			'choices'  => array(
				'default' => _x( 'Default', 'primary color', 'devco' ),
				'custom'  => _x( 'Custom', 'primary color', 'devco' ),
			),
			'section'  => 'colors',
			'priority' => 5,
		)
	);

	// Add primary color hue setting and control.
	$wp_customize->add_setting(
		'header_color_hue',
		array(
			'default'           => 199,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'header_color_hue',
			array(
				'description' => __( 'Apply a custom color for header', 'devco' ),
				'section'     => 'colors',
				'mode'        => 'hue',
			)
		)
	);
    $wp_customize->add_section( 'devco_new_section' , array(
        'title'      => __( 'Visible Section Name', 'devco' ),
        'priority'   => 30
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'label'      => __( 'Header Color', 'devco' ),
        'section'    => 'devco_new_section',
        'settings'   => 'header_color_hue',
    ) ) );

}*/
function devco_customize_register( $wp_customize ) {

	// Create our panels
	
	$wp_customize->add_panel( 'devco_footer', array(
		'capability'     => 'edit_theme_options',
		'title'          => __('Footer', 'text_domain'),
		'description'    => __('Define the colors of the page by selecting one of the 36 million colors', 'text_domain'),
	) );
			
	// Create our sections
	
	// $wp_customize->add_section( 'devco_colors_section' , array(
	// 	'title'             => __('Footer', 'text_domain'),
	// 	'description'       => __('Define colors here', 'text_domain'),
	// 	'panel'             => 'devco_colors',
	// 	'capability'        => 'edit_theme_options',
	// ));
			
	// Create our settings
	
	// $wp_customize->add_setting( 'devco_footer_copyright' , array(
	// 	'type'          => 'theme_mod',
	// 	'capability'    => 'edit_theme_options',
	// 	'transport'     => 'refresh',
	// ) );
	// $wp_customize->add_control( 'devco_footer_copyright_control', array(
	// 	'label'      => __('Footer Copyright', 'text_domain'),
	// 	'description'=> __('Copyright text', 'text_domain'),
	// 	'section'    => 'devco_colors_section',
	// 	'settings'   => 'devco_footer_copyright',
	// 	'type'       => 'textarea',
	// ) );

	// Contact Footer Area
	$wp_customize->add_section( 'devco_footer_contact_section', array(
		'title'             => __('Contact', 'text_domain'),
		'description'       => __('Define footer here', 'text_domain'),
		'panel'             => 'devco_footer',
		'capability'        => 'edit_theme_options',
	) );
	$wp_customize->add_setting( 'devco_footer_copyright', array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'devco_footer_copyright_control', array(
		'label'      => __('Footer Copyright', 'text_domain'),
		'description'=> __('Copyright text', 'text_domain'),
		'section'    => 'devco_footer_contact_section',
		'settings'   => 'devco_footer_copyright',
		'type'       => 'textarea',
	) );
	$wp_customize->add_setting( 'devco_footer_contact_address' , array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'devco_footer_contact_address_control', array(
		'label'      => __('Contact Address', 'text_domain'),
		'description'=> __('Company Address', 'text_domain'),
		'section'    => 'devco_footer_contact_section',
		'settings'   => 'devco_footer_contact_address',
		'type'       => 'textarea',
	) );
	$wp_customize->add_setting( 'devco_footer_contact_email' , array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'devco_footer_contact_email_control', array(
		'label'      => __('Contact Email', 'text_domain'),
		'description'=> __('Company Email', 'text_domain'),
		'section'    => 'devco_footer_contact_section',
		'settings'   => 'devco_footer_contact_email',
		'type'       => 'email',
	) );
	$wp_customize->add_setting( 'devco_footer_contact_github' , array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'devco_footer_contact_github_control', array(
		'label'      => __('Contact Github', 'text_domain'),
		'description'=> __('Company Github', 'text_domain'),
		'section'    => 'devco_footer_contact_section',
		'settings'   => 'devco_footer_contact_github',
		'type'       => 'url',
	) );
	$wp_customize->add_setting( 'devco_footer_contact_twitter' , array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'devco_footer_contact_twitter_control', array(
		'label'      => __('Contact Twitter', 'text_domain'),
		'description'=> __('Company Twitter', 'text_domain'),
		'section'    => 'devco_footer_contact_section',
		'settings'   => 'devco_footer_contact_twitter',
		'type'       => 'url',
	) );

	/* Products section */
	$wp_customize->add_section( 'devco_footer_products_section', array(
		'title'             => __('Products', 'text_domain'),
		'description'       => __('Define products here', 'text_domain'),
		'panel'             => 'devco_footer',
		'capability'        => 'edit_theme_options',
	) );
	$wp_customize->add_setting( 'devco_footer_contact_twitter2' , array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'devco_footer_contact_twitter_control', array(
		'label'      => __('Contact Twitter', 'text_domain'),
		'description'=> __('Company Twitter', 'text_domain'),
		'section'    => 'devco_footer_contact_section',
		'settings'   => 'devco_footer_contact_twitter2',
		'type'       => 'url',
	) );
	$wp_customize->add_setting( 'devco_footer_products' , array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	));
	$wp_customize->add_control( 'devco_footer_products_control', array(
		'label'      => __('Products', 'text_domain'),
		'description'=> __('Company Products', 'text_domain'),
		'section'    => 'devco_footer_products_section',
		'settings'   => 'devco_footer_products',
		'type'       => 'checkbox',
		'choices'	 => array(
			'Wordpress' => __('Wordpress Websites'),
			'Nuxt' => __('Nuxt Websites', 'nm'),
			'React Native' => __('React Native App', 'nm')
		)
	) );

	// $wp_customize->add_setting( 'devco_project_post_page' , array(
	// 	'type'          => 'theme_mod',
	// 	'capability'    => 'edit_theme_options',
	// 	'transport'     => 'refresh',
	// ) );
	// $wp_customize->add_control( 'devco_project_post_page_control', array(
	// 	'label'      => __('Post Project Page', 'text_domain'),
	// 	'description'=> __('yEs', 'text_domain'),
	// 	'section'    => 'devco_colors_section',
	// 	'settings'   => 'devco_project_post_page',
	// 	'type'       => 'dropdown-pages',
	// ) );
			
	// $wp_customize->add_setting( 'devco_oppdrag_post_page' , array(
	// 	'type'          => 'theme_mod',
	// 	'capability'    => 'edit_theme_options',
	// 	'transport'     => 'refresh',
	// ) );
	// $wp_customize->add_control( 'devco_oppdrag_post_page_control', array(
	// 	'label'      => __('Post Oppdrag Page', 'text_domain'),
	// 	'description'=> __('Set Oppdrag page', 'text_domain'),
	// 	'section'    => 'devco_colors_section',
	// 	'settings'   => 'devco_oppdrag_post_page',
	// 	'type'       => 'dropdown-pages',
	// ) );
			
}
add_action( 'customize_register', 'devco_customize_register' );
//https://passwordprotectwp.com/how-to-add-extra-sections-to-wordpress-customizer/

// Generator
// https://dev.lws-webdesign.de/generator/customizer-v3/
// add_action( 'customize_register', 'devco_customize_register' );

?>