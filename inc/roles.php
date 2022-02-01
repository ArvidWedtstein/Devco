<?php
class Role {
    public $role_name;
    public $display_name;
    public $permissions;
    function __construct($role_name, $display_name, $permissions) {
        $this -> role_name = $role_name;
        $this -> display_name = $display_name;
        $this -> permissions = $permissions;
        add_role( $this -> role_name, $this -> display_name, $this -> permissions );
    }

}
function devco_init_roles() {
    $Peasant = new Role('Peasant', 'Peasant', get_role('visitor')->capabilities);
    
}
add_action("init", 'devco_init_roles');
?>
