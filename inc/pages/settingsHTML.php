<?php 
ob_start();
?>
<div class="wrap">
    <h1>Custom Theme Options Page</h1>
    <form method="post" action="options.php">
    <?php
        // display all sections for theme-options page

        settings_fields( "devco_admin_page" );
        do_settings_sections( "devco_admin_page" );
        submit_button();
    ?>

    </form>
</div>




<?php
$html = ob_get_clean();
return print($html);
?>


