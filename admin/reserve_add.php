<?php 
    require('../config/start.php');
    require('../include/functions.php');

    $step1 = true;
    $step2 = false;
    $step3 = false;
    $step4 = false;

    if(isset($_POST['step_1'])) {
        $step1 = false;
        $step2 = true;
        $step3 = false;
        $step4 = false;
    }

    if(isset($_POST['step_2'])) {
        $step1 = false;
        $step2 = false;
        $step3 = true;
        $step4 = false;
    }

    if(isset($_POST['step_3'])) {
        $step1 = false;
        $step2 = false;
        $step3 = false;
        $step4 = true;
    }


?>

<?php 
    $browserTitle = "Reservas";
    $pageTitle = "Reservas";
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/reserve_add.php'); ?>



<?php require('../views/layout/admin_footer.php'); ?>