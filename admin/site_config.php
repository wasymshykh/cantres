<?php 
    require('../config/start.php');
    require('../include/functions.php');

    $errors = [];

    if(isset($_POST['save_settings'])){

        $came_froms = normal($_POST['came_froms']);

        if(saveSetting('came_froms', $came_froms, $db)){
            $success = "Settings successfully changed!";
        } else {
            $errors[] = "Couldn't save the changes!";
        }

    }

?>

<?php 
    $browserTitle = "Config";
    $pageTitle = "SITE CONFIG";
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/site_config.php'); ?>

<?php require('../views/layout/admin_footer.php'); ?>