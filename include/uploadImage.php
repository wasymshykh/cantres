<?php 
    require('../config/start.php');
    require('../include/functions.php');

    if(isset($_FILES['theupload'])) {
        uploadImage($_FILES['theupload']);
    } else {
        header('location:'.URL);
    }

?>