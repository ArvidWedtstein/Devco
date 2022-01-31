<?php
function devco_add_settings() {
    //add_theme_page("Theme Customization", "Theme Customization", "manage_options", "theme_options", "theme_option_page", null, 99);
    add_menu_page(
        __( 'Devco', 'my-textdomain' ),
        __( 'Devco', 'my-textdomain' ),
        'manage_options',
        'sample-page',
        'theme_option_page',
        'dashicons-schedule',
        3
    );
    // add_submenu_page('themes.php', 'testsubpage', 'test sub page', "manage_options", "theme-options", null, 0);
}

add_action('admin_menu', 'devco_add_settings' );


function theme_option_page() {
    ?>
    <div class="wrap">
    <h1>Custom Theme Options Page</h1>
    <form method="post" action="options.php">
    <?php
        // display all sections for theme-options page

        settings_fields( 'sample-page' );
        do_settings_sections( 'sample-page' );
        submit_button();
    ?>
    <input
      type="submit"
      name="submit"
      class="button button-primary"
      value="<?php esc_attr_e( 'Save' ); ?>"
    />

    </form>
    </div>
    <?php
}
function my_setting_markup() {
    ?>
        <input type="text" id="my_setting_field" name="tdfstgd" value="<?php echo get_option( 'my_setting_field' ); ?>">
    <?php
}
function avatar_comment_setting_markup() {
    ?>
        <input type="checkbox" id="show_avatars_comment" name="d">
    <?php
}
    //admin-init hook to create settings section with title “New Theme Options Section”.
function test_theme_settings(){
    add_settings_section(
        'sample_page_setting_section',
        __( 'Oppdrag', 'my-domain'),
        'my_settings_callback_function',
        'sample-page'
    );
    add_settings_field(
        'my_setting_field',
        __( 'Oppdrag', 'my-textdomain' ),
        'my_setting_markup',
        'sample-page',
        'sample_page_setting_section'
    );
    add_settings_field(
        'show_avatars_comment',
        __( 'Show Avatar on Comment', 'my-textdomain' ),
        'avatar_comment_setting_markup',
        'sample-page',
        'sample_page_setting_section'
    );

    register_setting( 'sample-page', 'my_setting_field' );
}
add_action('admin_menu','test_theme_settings');


function my_settings_callback_function() {
    if (have_posts()) {
        $args = array( 'post_type' => 'oppdrag' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
            echo the_post();
        endwhile;
    }  
}
?>