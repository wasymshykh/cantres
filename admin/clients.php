<?php 
    require('../config/start.php');
    require('../include/functions.php');

    $query_client = "SELECT `name`, `reserve_date`, `cost`, `come_from`, `email`, `phone` 
    FROM `client` c LEFT JOIN `reserve` r ON c.id = r.client_id";
    $stmt = $db->prepare($query_client);
    $stmt->execute();
    $clients = $stmt->fetchAll();
?>

<?php 
    $browserTitle = "View";
    $pageTitle = "Clientes";
    $customTop = '<div class="reserve-t-link">
        <a href="client_add.php">AÑADIR Cliente</a>
    </div>';
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/clients.php'); ?>

<?php require('../views/layout/admin_footer.php'); ?>