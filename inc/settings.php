<?php
function devco_add_settings() {
    //add_theme_page("Theme Customization", "Theme Customization", "manage_options", "theme_options", "devco_theme_option_page", null, 99);
    add_menu_page(
        __( 'Devco' ),
        __( 'Devco' ),
        'manage_options',
        'devco_admin_page',
        'devco_theme_option_page',
        'dashicons-schedule',
        3
    );
    add_submenu_page('devco_admin_page', 'Devco Role', 'Sub Page', "manage_options", 'devco_theme_subpage', 'devco_theme_option_subpage', null, 2);
}

add_action('admin_menu', 'devco_add_settings' );


function devco_theme_option_page() {
    ?>
    <div class="wrap">
    <h1>Custom Theme Options Page</h1>
    <form method="post" action="options.php">
    <?php
        // display all sections for theme-options page

        settings_fields( 'devco_admin_page' );
        do_settings_sections( 'devco_admin_page' );
        submit_button();
    ?>
    <!-- Alternative Submit/Save button -->
    <!-- <input
      type="submit"
      name="submit"
      class="button button-primary"
      value="<?php esc_attr_e( 'Save' ); ?>"
    /> -->

    </form>
    </div>
    <?php
}
function devco_theme_option_subpage() {
    ?>
    <div class="wrap">
    <h1>Custom Theme Options SubPage</h1>
    <form method="post" action="options.php">
    <?php
        // display all sections for theme-options page

        settings_fields( 'devco_admin_subpage' );
        do_settings_sections( 'devco_admin_subpage' );
        submit_button();
    ?>

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
        <input type="checkbox" id="show_avatars_comment" name="d" value="<?php echo get_option( 'show_avatars_comment' ); ?>">
    <?php
}
function devco_get_role_names() {

    global $wp_roles;
    
    if ( ! isset( $wp_roles ) )
        $wp_roles = new WP_Roles();
    
    return $wp_roles->get_names();
    }
function devco_user_role_setting_markup() {
    $users = get_users( array( 'fields' => array( 'ID' ) ) );
    echo '<div class="w-full bg-discord-800 rounded-lg shadow-lg lg:w-1/3"><ul class="divide-y-2 divide-gray-400">';
    foreach($users as $user) {
        echo '<li class="flex justify-between p-3 hover:bg-blue-600 hover:text-blue-200">' . get_user_meta ($user->ID) . "</li>";
        echo '<li class="flex justify-between p-3 hover:bg-blue-600 hover:text-blue-200">' . $user->email . "</li>";
        print_r(get_user_meta ( $user->ID));
    }
    echo "</ul></div>";
    $roles = devco_get_role_names();
    echo '<div class="w-full bg-discord-800 rounded-lg shadow-lg lg:w-1/3"><ul class="divide-y-2 divide-gray-400">';
    foreach( $roles as $role ) {
        echo '<li class="flex justify-between p-3 hover:bg-blue-600 hover:text-blue-200">' . $role . "</li>";
    }
    echo "</ul></div>";
    ?>
        <!-- <input type="checkbox" id="show_avatars_comment" name="d" value="<?php echo get_option( 'show_avatars_comment' ); ?>"> -->
    <?php
}

    //admin-init hook to create settings section with title “New Theme Options Section”.
function devco_admin_theme_settings(){
    add_settings_section(
        'devco_admin_page_setting_section',
        __( 'Oppdrag', 'my-domain'),
        'my_settings_callback_function',
        'devco_admin_page'
    );
    add_settings_field(
        'my_setting_field',
        __( 'Oppdrag', 'my-textdomain' ),
        'my_setting_markup',
        'devco_admin_page',
        'sample_page_setting_section'
    );
    add_settings_section(
        'devco_comment_setting_section',
        __( 'Comments', 'my-domain'),
        'my_settings_callback_function',
        'devco_admin_page'
    );
    
    add_settings_field(
        'show_avatars_comment',
        __( 'Show Avatar on Comment', 'my-textdomain' ),
        'avatar_comment_setting_markup',
        'devco_admin_page',
        'devco_comment_setting_section'
    );
    add_settings_section(
        'devco_users_setting_section',
        __( 'Users', 'my-domain'),
        'my_settings_callback_function',
        'devco_admin_page'
    );
    
    add_settings_field(
        'role_create',
        __( 'Create new role', 'my-textdomain' ),
        'devco_user_role_setting_markup',
        'devco_admin_page',
        'devco_users_setting_section'
    );
    

    register_setting( 'devco_admin_page', 'my_setting_field' );
    register_setting( 'devco_admin_page', 'show_avatars_comment' );
    register_setting( 'devco_admin_page', 'role_create' );
}
add_action('admin_menu','devco_admin_theme_settings');


function devco_admin_subpage_settings() {
    add_settings_section(
        'devco_users_setting_section',
        __( 'Users', 'my-domain'),
        'my_settings_callback_function',
        'devco_admin_subpage'
    );
    
    add_settings_field(
        'role_create',
        __( 'Roles', 'my-textdomain' ),
        'devco_user_role_setting_markup',
        'devco_admin_subpage',
        'devco_users_setting_section'
    );
    
    register_setting( 'devco_admin_subpage', 'role_create' );
}
add_action('admin_menu','devco_admin_subpage_settings');


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