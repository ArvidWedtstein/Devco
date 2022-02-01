<?php



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
        // print_r(get_user_meta ( $user->ID));
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
class Setting_Page {
    public $page_title;
    public $menu_title;
    public $permission;
    public $menu_slug;
    public $icon;
    public $position;
    public $file; 
    function __construct($page_title, $menu_title, $permission, $menu_slug, $icon, $position, $file) {
        $this -> page_title = $page_title;
        $this -> menu_title = $menu_title;
        $this -> permission = $permission;
        $this -> menu_slug = $menu_slug;
        $this -> icon = $icon;
        $this -> position = $position;
        $this -> file = $file;
    }
    function init() {
        $callback = array ( $this, 'devco_theme_option_page' );
        add_menu_page(
            $this -> page_title,
            $this -> menu_title,
            $this -> permission,
            $this -> menu_slug,
            $callback,
            $this -> icon,
            $this -> position,
        );
    }
    function devco_theme_option_page() {
        $htmlfile = get_theme_file_path( '/inc/pages/' . $this -> file . '.php' );
        require $htmlfile;
    }
}
class Setting_SubPage {
    public $parent_slug;
    public $page_title;
    public $menu_title;
    public $permission;
    public $menu_slug;
    public $position;
    public $file; 
    function __construct($parent_slug, $page_title, $menu_title, $permission, $menu_slug, $position, $file) {
        $this -> parent_slug = $parent_slug;
        $this -> page_title = $page_title;
        $this -> menu_title = $menu_title;
        $this -> permission = $permission;
        $this -> menu_slug = $menu_slug;
        $this -> position = $position;
        $this -> file = $file;
    }
    function init() {
        $callback = array ( $this, 'devco_theme_option_subpage' );
        add_submenu_page(
            $this -> parent_slug,
            $this -> page_title,
            $this -> menu_title,
            $this -> permission,
            $this -> menu_slug,
            $callback,
            $this -> position
        );
    }
    function devco_theme_option_subpage() {
        $htmlfile = get_theme_file_path( '/inc/pages/' . $this -> file . '.php' );
        require $htmlfile;
    }
}
class Setting_Section {
    public $id;
    public $title;
    public $callback;
    public $page;

    function __construct($id, $title, $callback, $page) {
        $this -> id = $id;
        $this -> title = $title;
        $this -> callback = $callback;
        $this -> page = $page;
    }
    function init() {
        add_settings_section(
            $this -> id,
            __( $this -> title, 'my-domain'),
            $this -> callback,
            $this -> page
        );
    }
}

class Setting_Field {
    public $id;
    public $title;
    public $page;
    public $section;
    public $type;

    function __construct($id, $title, $page, $section, $type) {
        $this -> id = $id;
        $this -> title = $title;
        $this -> page = $page;
        $this -> section = $section;
        $this -> type = $type;
    }
    function init() {
        // $handle   = $this->id . "_" . $this -> $type;
        $handle   = $this->id;
        $args = array (
            'id' => $handle,
            'type' => $this -> $type
        );
        $callback = array ( $this, 'print_input_field' );

        add_settings_field(
            $handle,
            __( $this -> title, 'my-textdomain'),
            $callback,
            $this -> page,
            $this -> section,
            $args
        );
        register_setting( $page, $id );
    }
    function print_input_field( array $args )
    {
        // $type   = $args['type'];
        $type   = $this -> type;
        $id     = $args['id'];
        $data   = get_option( $this->id, array() );
        $value  = $data[ $type ];

        $value  = esc_attr( $value );
        $name   = $this->id . '[' . $type . ']';
        $desc = $this -> title;
        print "<input type='$type' value='$value' name='$name' id='$id'
            class='regular-text code' /> <span class='description'>$desc</span>";
    }
}

function devco_add_settings() {
    $devco_settings = new Setting_Page(
        'Devco',
        'Devco',
        'manage_options',
        'devco_admin_page',
        'dashicons-schedule',
        3,
        'settingsHTML'
    );
    $devco_settings -> init();
    $devco_subpage_settings = new Setting_SubPage(
        'devco_admin_page',
        'Devco Role',
        'Devco Role',
        'manage_options',
        'devco_admin_roles',
        2,
        'settingsSubPage'
    );
    $devco_subpage_settings -> init();
}
add_action('admin_menu', 'devco_add_settings' );

//admin-init hook to create settings section with title “New Theme Options Section”.
function devco_admin_theme_settings() {
    $oppdrag_section = new Setting_Section(
        'devco_admin_page_setting_section', 
        'Oppdrag', 
        'devco_settings_callback_function', 
        'devco_admin_page'
    );
    $oppdrag_section->init();

    $oppdrag_section_field = new Setting_Field(
        'devco_admin_page_setting_section_delete',
        'Delete Oppdrag',
        'devco_admin_page',
        'devco_admin_page_setting_section',
        'checkbox'
    );
    $oppdrag_section_field->init();

    

    

    // register_setting( 'devco_admin_page', 'show_avatars_comment' );
    // register_setting( 'devco_admin_page', 'role_create' );
}
add_action('admin_menu','devco_admin_theme_settings');


function devco_admin_subpage_settings() {
    $oppdrag_section = new Setting_Section(
        'devco_users_setting_section', 
        'Users', 
        'devco_settings_callback_function', 
        'devco_admin_subpage'
    );
    $oppdrag_section->init();



}
add_action('admin_menu','devco_admin_subpage_settings');


function devco_settings_callback_function() {
    if (have_posts()) {
        $args = array( 'post_type' => 'oppdrag' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
            echo the_post();
        endwhile;
    }  
}
?>