<?php 
    require('../config/start.php');
    require('../include/functions.php');


    if(empty($_POST['reserve_check'])){
        $reservation_query = "
            SELECT r.*,a.*,c.email,c.name as client_name,c.come_from FROM `reserve` r JOIN `apartments` a ON r.apt_id = a.id JOIN `client` c ON r.client_id = c.id
        ";
        $stmt = $db->prepare($reservation_query);
        $stmt->execute();
        $get_reservations = $stmt->fetchAll();
    }

    if(!empty($_POST['reserve_check'])){
        $reserve_id = normal($_POST['reserve_id']);
        $reservation_query = "
            SELECT * FROM `reserve` r JOIN `apartments` a ON r.apt_id = a.id WHERE r.res_no = $reserve_id
        ";
        $stmt = $db->prepare($reservation_query);
        $stmt->execute();
        $get_reservations = $stmt->fetchAll();
    }


    if(!empty($_POST['reserve_filter'])){
        if(isset($_POST['from']) && !empty($_POST['from'])){
            $from = dateDB(normal($_POST['from']));
        }
        if(isset($_POST['to']) && !empty($_POST['to'])){
            $to = dateDB(normal($_POST['to']));
        }


        $get_reservations = getAvailableReserve($from, $to, $db);
        for ($i = 0; $i < count($get_reservations); $i++) {
            $reservation_query = "SELECT `name` from `apartments` where `id`=:apt_id";
            $stmt = $db->prepare($reservation_query);
            $stmt->execute(['apt_id' => $get_reservations[$i]['apt_id']]);
            $apt_name = $stmt->fetch()['name'];
            $get_reservations[$i]['name'] = $apt_name;
        }
        
    }


?>

<?php 
    $browserTitle = "Reserve";
    $pageTitle = "List Reserve";
    $customTop = '
    <div class="reserve-t-link">
        <a href="reserve_add.php">AÑADIR Reserva</a>
    </div>
    
    <form class="reserve-t-date" method="POST">
        <h3>Fechas</h3>
        <div class="book-field dateField">
            <input type="text" name="from" id="from" placeholder="Entrada">
        </div>
        <div class="book-field dateField">
            <input type="text" name="to" id="to" placeholder="Salida">
        </div>
        <div class="book-field-submit">
            <input type="submit" name="reserve_filter" value="go">
        </div>
    </form>';
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/reserves.php'); ?>



<?php require('../views/layout/admin_footer.php'); ?>