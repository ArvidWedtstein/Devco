<?php


/*
* Create a class for setting
*/
class Customizer_Setting {
	public $id;
	public $label;
	public $description;
	public $section;
	public $type;
	public $priority;
	function __construct($id, $label, $description, $section, $type, $priority = 100) {
		$this -> id = $id; // id for the setting. this will be used to call the setting
		$this -> label = $label; // label
		$this -> description = $description;
		$this -> section = $section;
		$this -> type = $type;
		$this -> priority = $priority;
	}
	function init( $wp_customize ) {
		$wp_customize->add_setting( $this -> id , array(
			'type'          => 'theme_mod',
			'capability'    => 'edit_theme_options',
			'transport'     => 'refresh',
		) );
		$wp_customize->add_control( $this -> id . '_control', array(
			'label'      => __($this -> label, 'text_domain'), 
			'description'=> __($this -> description, 'text_domain'),
			'section'    => $this -> section,
			'priority'   => $this -> priority,
			'settings'   => $this -> id,
			'type'       => $this -> type,
		));
	}
}

function devco_customize_register( $wp_customize ) {
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

	/*
	*	Create Footer Panel
	*/
	
	$wp_customize->add_panel( 'devco_footer', array(
		'capability'     => 'edit_theme_options',
		'title'          => __('Footer', 'text_domain'),
		'description'    => __('yEs', 'text_domain'),
	));
			
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

	// Products Footer Section 
	$wp_customize->add_section( 'devco_footer_products_section', array(
		'title'             => __('Products', 'text_domain'),
		'description'       => __('Define products here', 'text_domain'),
		'panel'             => 'devco_footer',
		'capability'        => 'edit_theme_options',
	) );


	// Copyright text
	$copyright = new Customizer_setting(
		'devco_copyright', // id for the setting. this will be used to call the setting
		'Copyright', // Label
		'Copyright text', // Description
		'title_tagline', // Section for the setting
		'textarea', // type of the setting
		100 // priority in menu
	);
	$copyright -> init( $wp_customize );


	// Company Description Settings Field
	$description = new Customizer_setting(
		'devco_description', // id for the setting. this will be used to call the setting
		'Description', // Label
		'Company Description', // Description
		'title_tagline', // Section for the setting
		'textarea', // type of the setting
		20 // priority in menu
	);
	$description -> init( $wp_customize );
	

	// Address
	$address = new Customizer_setting(
		'devco_footer_contact_address', // id for the setting. this will be used to call the setting
		'Contact Address', // Label
		'Contact Address', // Description
		'devco_footer_contact_section', // Section for the setting
		'textarea' // type of the setting
	);
	$address -> init( $wp_customize );


	// Email Settings field
	$email = new Customizer_setting(
		'devco_footer_contact_email', // id for the setting. this will be used to call the setting
		'Contact Email', // Label
		'Company Email', // Description
		'devco_footer_contact_section', // Section for the setting
		'email' // type of the setting
	);
	$email -> init( $wp_customize );


	// Github link Settings field
	$github = new Customizer_setting(
		'devco_footer_contact_github', // id for the setting. this will be used to call the setting
		'Contact Github', // Label
		'Company Github', // Description
		'devco_footer_contact_section', // Section for the setting
		'url' // type of the setting
	);
	$github -> init( $wp_customize );


	// Twitter link Settings field
	$twitter = new Customizer_setting(
		'devco_footer_contact_twitter', // id for the setting. this will be used to call the setting
		'Contact Twitter', // Label
		'Company Twitter', // Description
		'devco_footer_contact_section', // Section for the setting
		'url' // type of the setting
	);
	$twitter -> init( $wp_customize );
	


	/*
	* Products Section settings
	*/
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