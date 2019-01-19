<?php 
    require('../config/start.php');
    require('../include/functions.php');

    if(isset($_FILES['theupload'])) {
        uploadImage($_FILES['theupload']);
    } 
    else
    if(isset($_FILES['theuploadUpdate']) && isset($_GET['apt_id'])) {        
        uploadUpdateImage($_FILES['theuploadUpdate'], $_GET['apt_id'], $db);
    } else {
        header('location:'.URL);
    }

?>