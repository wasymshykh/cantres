<?php 
    require('../config/start.php');
    require('../include/functions.php');

    $errors = [];

    if(isset($_POST['from']) && !empty($_POST['from'])){
        $from = dateDB(normal($_POST['from']));
    }
    if(isset($_POST['to']) && !empty($_POST['to'])){
        $to = dateDB(normal($_POST['to']));
    }
    if(isset($_POST['adults'])){
        $adults = normal($_POST['adults']);
    }
    if(isset($_POST['children'])){
        $children = normal($_POST['children']);
    }
    if(isset($_POST['select_apt'])){
        $select_apt = normal($_POST['select_apt']);
    }
    if(isset($_POST['price'])){
        $price = normal($_POST['price']);
    }
    if(isset($_POST['person_name'])){
        $person_name = normal($_POST['person_name']);
    }
    if(isset($_POST['phone'])){
        $phone = normal($_POST['phone']);
    }
    if(isset($_POST['surname'])){
        $surname = normal($_POST['surname']);
    }
    if(isset($_POST['region'])){
        $region = normal($_POST['region']);
    }
    if(isset($_POST['email'])){
        $email = normal($_POST['email']);
    }
    if(isset($_POST['come_from'])){
        $come_from = normal($_POST['come_from']);
    }
    if(isset($_POST['payment_via'])){
        $payment_via = normal($_POST['payment_via']);
    }
    if(isset($_POST['note'])){
        $note = normal($_POST['note']);
    }
    if(isset($_POST['apt_name'])){
        $apt_name = normal($_POST['apt_name']);
    }


    $step1 = true;
    $step2 = false;
    $step3 = false;
    $step4 = false;

    if(isset($_POST['step_1'])) {
        if(empty($from)) {
            $errors[] = "From is empty!";
        }
        if(empty($to)) {
            $errors[] = "To is empty!";
        }
        if(empty($adults)) {
            $errors[] = "Adults is empty!";
        }
        if(empty($children)) {
            $children = 0;
        }

        if(empty($errors)){
            $step1 = false;
            $step2 = true;
            $step3 = false;
            $step4 = false;
            $apt_available = getAvailable($from, $to, $adults, $children, $db);
        }
    }

    if(isset($_POST['step_2'])) {

        if(empty($select_apt)){
            $errors[] = "Please select apartment!";
        }

        if(empty($errors)){
            $step1 = false;
            $step2 = false;
            $step3 = true;
            $step4 = false;

            $apt = getApartment($select_apt, $db);
            $price = getApartmentPrice($from, $to, $apt, $adults+$children);

        } else {
            $step1 = false;
            $step2 = true;
            $step3 = false;
            $step4 = false;
            $apt_available = getAvailable($from, $to, $adults, $children, $db);
        }
    }

    if(isset($_POST['step_3'])) {
        if(empty($person_name)) {
            $errors[] = "Person name is empty!";
        }
        if(empty($phone)) {
            $errors[] = "Phone is empty!";
        }
        if(empty($region)) {
            $errors[] = "Region is empty!";
        }
        if(empty($email)) {
            $errors[] = "Email is empty!";
        }
        if(empty($payment_via)) {
            $errors[] = "Payment Via is empty!";
        }

        if(empty($errors)) {
            $step1 = false;
            $step2 = false;
            $step3 = false;
            $step4 = true;

            $reserve_date = date('Y-m-d H:i:s');

            $add_c_query = "INSERT INTO `client`(`name`,`surname`,`email`,`phone`,`region`,`come_from`,`note`)
            VALUE ('$person_name', '$surname', '$email', '$phone', '$region', '$come_from', '$note')";
            

            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $db->beginTransaction();
                $db->exec($add_c_query);
                $client_id = $db->lastInsertId();

                $add_r_query = "INSERT INTO `reserve`(`reserve_date`, `start_date`, `end_date`, `apt_id`,
                 `client_id`, `cost`, `payment_via`, `adults`, `children`, `status`) VALUE
                ('$reserve_date', '$from', '$to', '$select_apt', '$client_id', '$price', '$payment_via',
                '$adults', '$children', '1');
                 ";
                $db->exec($add_r_query);
                $reserve_id = $db->lastInsertId();

                $db->commit();

            } catch(Exception $e) {
                $db->rollBack();
                $errors[] = "FAILED: " . $e->getMessage();
            }

        } else {
            $step1 = false;
            $step2 = false;
            $step3 = true;
            $step4 = false;

            $apt = getApartment($select_apt, $db);
            $price = getApartmentPrice($from, $to, $apt, $adults+$children);
        }
       
    }

?>

<?php 
    $browserTitle = "Reservas";
    $pageTitle = "Reservas";
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/reserve_add.php'); ?>



<?php require('../views/layout/admin_footer.php'); ?>