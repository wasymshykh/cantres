<?php 
    require('../config/start.php');
    require('../include/functions.php');

    $errors = [];

    if(isset($_POST['add_client'])){
        
        $name = normal($_POST['name']);
        $email = normal($_POST['email']);
        $region = normal($_POST['region']);
        $come_from = normal($_POST['come_from']);
        $surname = normal($_POST['surname']);
        $phone = normal($_POST['phone']);
        $note = normal($_POST['note']);

        if(empty($name)) {
            $errors[] = "Name is empty";
        }
        if(empty($email)) {
            $errors[] = "Email is empty";
        }
        if(empty($region)) {
            $errors[] = "Region is empty";
        }
        if(empty($come_from)) {
            $errors[] = "Came From is empty";
        }
        if(empty($surname)) {
            $errors[] = "Surname is empty";
        }
        if(empty($phone)) {
            $errors[] = "Phone is empty";
        }
        if(empty($note)) {
            $errors[] = "Note is empty";
        }

        if(empty($errors)){

            $client_query = "INSERT INTO `client`
            (`name`, `surname`, `email`, `phone`, `region`, `come_from`, `note`)
            VALUE ('$name', '$surname', '$email', '$phone', '$region', '$come_from', '$note')";

            $stmt = $db->prepare($client_query);
            
            if($stmt->execute()){
                $success = "Successfully added the client";
            }
            


        }


    }
    
?>

<?php 
    $browserTitle = "Add";
    $pageTitle = "Clientes";
    $customTop = '<div class="reserve-t-link">
        <a href="clients.php">Go Back</a>
    </div>';
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/client_add.php'); ?>

<?php require('../views/layout/admin_footer.php'); ?>