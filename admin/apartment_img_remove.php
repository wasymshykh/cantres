<?php 
    require('../config/start.php');
    require('../include/functions.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){

        $apt_img_query = 'SELECT * from `apartment_images` where apt_id=:apt_id AND `is_active`=1';
        $stmt = $db->prepare($apt_img_query);
        $stmt->execute(['apt_id'=>$apartment['id']]);
        $apt_imgs = $stmt->fetchAll();



    } else {
        // Invalid edit param
        header('location: apartments.php');
        echo '<script>window.close();</script>';
    }

?>