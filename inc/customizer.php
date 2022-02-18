<?php

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
/*
* Create a class for setting
*/
class Customizer_Setting {
	public $id;
	public $label;
	public $description;
	public $section;
	public $type;
	function __construct($id, $label, $description, $section, $type) {
		$this -> id = $id;
		$this -> label = $label;
		$this -> description = $description;
		$this -> section = $section;
		$this -> type = $type;
	}
	function init() {
		$wp_customize->add_setting( $this -> id , array(
			'type'          => 'theme_mod',
			'capability'    => 'edit_theme_options',
			'transport'     => 'refresh',
		) );
		$wp_customize->add_control( $this -> id . '_control', array(
			'label'      => __($this -> label, 'text_domain'),
			'description'=> __($this -> description, 'text_domain'),
			'section'    => $this -> section,
			'settings'   => $this -> id,
			'type'       => $this -> type,
		));
	}
}

function devco_customize_register( $wp_customize ) {
	

	/*
	*	Create Footer Panel
	*/
	
	$wp_customize->add_panel( 'devco_footer', array(
		'capability'     => 'edit_theme_options',
		'title'          => __('Footer', 'text_domain'),
		'description'    => __('yEs', 'text_domain'),
	) );
			
	/*
	* Add section to the footer panel
	*/

	// Contact Footer Section
	$wp_customize->add_section( 'devco_footer_contact_section', array(
		'title'             => __('Contact', 'text_domain'),
		'description'       => __('Define footer here', 'text_domain'),
		'panel'             => 'devco_footer',
		'capability'        => 'edit_theme_options',
	) );

	// Copyright text
	$wp_customize->add_setting( 'devco_copyright' , array(
		'type'          => 'theme_mod',
		'capability'    => 'edit_theme_options',
		'transport'     => 'refresh',
	) );
	$wp_customize->add_control( 'devco_copyright_control', array(
		'label'      => __('Copyright', 'text_domain'),
		'description'=> __('Copyright text', 'text_domain'),
		'section'    => 'title_tagline',
		'settings'   => 'devco_footer_contact_section',
		'type'       => 'textarea',
	) );

	$address = new Customizer_setting(
		'devco_footer_contact_address', // id for the setting. this will be used to call the setting
		'Contact Address', // Label
		'Contact Address', // Description
		'devco_footer_contact_section', // Section for the setting
		'textarea' // type of the setting
	);
	$address -> init();
	// Address
	// $wp_customize->add_setting( 'devco_footer_contact_address' , array(
	// 	'type'          => 'theme_mod',
	// 	'capability'    => 'edit_theme_options',
	// 	'transport'     => 'refresh',
	// ) );
	// $wp_customize->add_control( 'devco_footer_contact_address_control', array(
	// 	'label'      => __('Contact Address', 'text_domain'),
	// 	'description'=> __('Company Address', 'text_domain'),
	// 	'section'    => 'devco_footer_contact_section',
	// 	'settings'   => 'devco_footer_contact_address',
	// 	'type'       => 'textarea',
	// ) );


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

			
}
add_action( 'customize_register', 'devco_customize_register' );



?>