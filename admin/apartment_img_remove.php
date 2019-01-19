<?php 
    require('../config/start.php');
    require('../include/functions.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){

        $img_id = normal($_GET['id']);
        $apt_img_query = 'SELECT * from `apartment_images` where `id`=:id AND `is_active`=1';
        $stmt = $db->prepare($apt_img_query);
        $stmt->execute(['id'=>$img_id]);
        $apt_imgs = $stmt->fetch();

        if(!empty($apt_imgs)){

            try{
                $apt_imgUp_query = 'UPDATE `apartment_images` SET `is_active`="0" where `id`=:id';
                $stmt2 = $db->prepare($apt_imgUp_query);
                if($stmt2->execute(['id'=>$img_id])){
                    echo '<script>
                    setTimeout(()=>{
                        console.log("helo");
                        window.close()
                        console.log("helo");
                    }, 100)
                    </script>';
                } else {
                    echo 'PROBLEM';
                }
            } catch(Exception $e){
                echo $e->getMessage();
            } 
            

        } else {
            echo '<script>window.close();</script>';
        }

    } else {
        // Invalid edit param
        header('location: apartments.php');
        echo '<script>window.close();</script>';
    }

?>