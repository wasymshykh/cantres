<?php 
    require('../config/start.php');
    require('../include/functions.php');
?>

<?php 
    $browserTitle = "Reserve";
    $pageTitle = "List Reserve";
    $customTop = '
    <div class="reserve-t-link">
        <a href="reserve_add.php">AÑADIR Reserva</a>
    </div>
    
    <div class="reserve-t-date">
        <h3>Fechas</h3>
        <div class="book-field dateField">
            <input type="text" id="from" placeholder="Entrada">
        </div>
        <div class="book-field dateField">
            <input type="text" id="to" placeholder="Salida">
        </div>
    </div>';
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/reserves.php'); ?>



<?php require('../views/layout/admin_footer.php'); ?>