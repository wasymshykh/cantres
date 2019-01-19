<?php 
    require('../config/start.php');
    require('../include/functions.php');

    $apt_query = 'SELECT * from `apartments`';
    $stmt = $db->prepare($apt_query);
    $stmt->execute();
    $apartments = $stmt->fetchAll();


?>

<?php 
    $browserTitle = "View";
    $pageTitle = "Apartments";
    $customTop = '<div class="reserve-t-link">
        <a href="apartment_add.php">AÑADIR APARTAMENTO</a>
    </div>';
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/apartments.php'); ?>

<?php require('../views/layout/admin_footer.php'); ?>