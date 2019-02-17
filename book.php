<?php 
    require('./config/start.php');
    require('./include/functions.php');
    session_start();
   

    $errors = [];
    $payerrors = [];

    if(isset($_POST['check_result']) && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['adults']) && isset($_POST['children'])){
        $from = normal($_POST['from']);
        $to = normal($_POST['to']);
        $adults = normal($_POST['adults']);
        $children = normal($_POST['children']);
        
        if(isset($_POST['email']) && isset($_POST['come_from'])) {
            $email = normal($_POST['email']);
            $come_from = normal($_POST['come_from']);
            $_SESSION['came_from'] = $come_from;
        }
        if(empty($from)){
            $errors[] = "From field is empty!";
        }
        if(empty($to)){
            $errors[] = "To field is empty!";
        }
        if(empty($adults)){
            $errors[] = "Personas field is empty!";
        }
        if(isset($_POST['email']) && empty($email)){
            $errors[] = "Email field is empty!";
        }
        if(!dateValid($from, $to)){
            $errors[] = "Invalid date selected!";
        }

        if(empty($errors)){
            $apt_available = getAvailable($from, $to, $adults, $children, $db, 3);
            $page_view = "search_result.php";
        } else {
            $page_view = "book.php";
        }
    } else
    if(isset($_POST['reserve'])) {

        $from = normal($_POST['from']);
        $to = normal($_POST['to']);
        $adults = normal($_POST['adults']);
        $children = normal($_POST['children']);
        $apt_id = normal($_POST['apt_id']);

        $apt = getApartment($apt_id, $db);
        $cost = getApartmentPrice($from, $to, $apt);
        $tax = $cost * 0.1;
        $totalCost = $cost + $tax;
        
        $specialClass = "main-grey";
        $page_view = "confirm.php";

    } else 
    if(isset($_POST['confirm'])){

        // Person Data

        $person_name = normal($_POST['person_name']);
        $surname = normal($_POST['surname']);
        $email = normal($_POST['email']);
        $phone = normal($_POST['phone']);
        $region = normal($_POST['region']);
        $note = normal($_POST['note']);

        $from = normal($_POST['from']);
        $to = normal($_POST['to']);
        $adults = normal($_POST['adults']);
        $children = normal($_POST['children']);
        $apt_id = normal($_POST['apt_id']);


        if(isset($_POST['payment_type']) && !empty(normal($_POST['payment_type']))){
            $payment_type = normal($_POST['payment_type']);

            if($payment_type == "Credit Card"){
                $cc_name = normal($_POST['c_name']);
                $cc_number = normal($_POST['c_number']);
                $cc_cvv = (int)normal($_POST['c_cvv']);
                $cc_mm = (int)normal($_POST['c_mm']);
                $cc_yy = (int)normal($_POST['c_aa']);

                if(empty($cc_name)){
                    $payerrors[] = "Credit Card name is empty";
                }
                if(empty($cc_number)){
                    $payerrors[] = "Credit Card number is empty";
                }
                if(empty($cc_cvv)){
                    $payerrors[] = "Credit Card CVV is empty";
                }
                if(empty($cc_mm)){
                    $payerrors[] = "Credit Card MM is empty";
                }
                if(empty($cc_yy)){
                    $payerrors[] = "Credit Card AA is empty";
                }
            }

        } else {
            $payerrors[] = "Payment processor not selected";
        }

        if(empty($person_name)){
            $errors[] = "Name field is empty";
        }
        if(empty($surname)){
            $errors[] = "Apellido field is empty";
        }
        if(empty($email)){
            $errors[] = "Email field is empty";
        }
        if(empty($phone)){
            $errors[] = "Telefono field is empty";
        }
        if(empty($region)){
            $errors[] = "Pais field is empty";
        }


        $apt = getApartment($apt_id, $db);
        $cost = getApartmentPrice($from, $to, $apt);
        $tax = $cost * 0.1;
        $totalCost = $cost + $tax;

        if(empty($errors) && empty($payerrors)) {

            if(!isset($come_from) && isset($_SESSION['came_from']) && !empty($_SESSION['came_from'])){
                $come_from = $_SESSION['came_from'];
            }

            if(!isset($come_from) || empty($come_from)){
                $come_from = "Other";
            }
            $reserve_date = date('Y-m-d H:i:s');
            $start_date = dateDB($from);
            $end_date = dateDB($to);
        
            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $db->beginTransaction();
                
                $add_c_query = "INSERT INTO `client`(`name`,`surname`,`email`,`phone`,`region`,`come_from`,`note`)
                    VALUE ('$person_name', '$surname', '$email', '$phone', '$region', '$come_from', '$note')";
                $db->exec($add_c_query);

                $client_id = $db->lastInsertId();

                $add_r_query = "INSERT INTO `reserve`(`reserve_date`, `start_date`, `end_date`, `apt_id`,
                 `client_id`, `cost`, `payment_via`, `adults`, `children`, `status`) VALUE
                ('$reserve_date', '$start_date', '$end_date', '$apt_id', '$client_id', '$totalCost', '$payment_type',
                '$adults', '$children', '0');
                 ";
                $db->exec($add_r_query);
                $reserve_id = $db->lastInsertId();

                if($payment_type == "Credit Card"){
                    $add_cc_query = "INSERT INTO `cc_payments`
                    (`cc_name`, `cc_number`,`cc_cvv`, `cc_mm`, `cc_yy`, `res_no`) VALUE
                    ('$cc_name', '$cc_number', $cc_cvv, $cc_mm, $cc_yy, $reserve_id)";
                    $db->exec($add_cc_query);
                }
                $db->commit();

            } catch(Exception $e) {
                $db->rollBack();
                $errors[] = "FAILED: " . $e->getMessage();
            }


            if(empty($errors)){

                $apt_img = getApartmentImages($apt['id'], $db)[0];
                    
                $specialDiv = '<div class="beforeMain" style="background: url('.URL.'/assets/uploads/'.$apt_img['img_name'].') no-repeat;
                    background-size: cover;
                    background-position: center center;"></div>';
                $specialClass = "main-grey";

                // IF SUCCESSFULLY BOOKED - SENDING EMAIL
                include './views/mail_content.php';

                $page_view = "done.php";

            } else {

                $specialClass = "main-grey";
                $page_view = "confirm.php";
            }

        } else {

            $specialClass = "main-grey";
            $page_view = "confirm.php";

        }

    }
    else {
        $page_view = "book.php";
    }


?>

<?php 
    $browserTitle = "Book";
    require('./views/layout/header.php'); 
?>

<?php require('./views/'.$page_view); ?>

<?php require('./views/layout/footer.php'); ?>