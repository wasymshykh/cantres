<?php 
    require('../config/start.php');
    require('../include/functions.php');

    if(isset($_GET['id']) && !empty($_GET['id'])){
        
        $page_id = normal($_GET['id']);
    
        $apt_query = 'SELECT * from `apartments` where id=:page_id';
        $stmt = $db->prepare($apt_query);
        $stmt->execute(['page_id'=>$page_id]);
        $apartment = $stmt->fetch();

        if($stmt->rowcount() > 0){
            $apt_img_query = 'SELECT * from `apartment_images` where apt_id=:apt_id AND `is_active`=1';
            $stmt = $db->prepare($apt_img_query);
            $stmt->execute(['apt_id'=>$apartment['id']]);
            $apt_imgs = $stmt->fetchAll();
        } else {
            // Apartment not found
            header('location: apartments.php');
        }


        if(isset($_POST['edit_apartment']) && !empty(normal($_POST['edit_apartment']))){

            foreach ($_POST as $p_name => $p_value) {
                if(!in_array($p_name, ['p_1_a', 'p_2_a', 'p_3_a', 'p_4_a'])){
                    if(empty(normal($p_value)) && gettype($p_value) !== 'array'){
                        $errors[] = apt_error($p_name, 'Empty');
                    }
                }
            }

            if(empty($errors)){
                $name = normal($_POST['apt_name']);
                $desc_1 = normal($_POST['apt_desc_1']);
                $desc_2 = normal($_POST['apt_desc_2']);
                $adults = normal($_POST['apt_adults']);
                $children = normal($_POST['apt_children']);

                $price_1 = normal($_POST['p_1']);
                $price_2 = normal($_POST['p_2']);
                $price_3 = normal($_POST['p_3']);
                $price_4 = normal($_POST['p_4']);

                $price_1_a = normal($_POST['p_1_a']);
                $price_2_a = normal($_POST['p_2_a']);
                $price_3_a = normal($_POST['p_3_a']);
                $price_4_a = normal($_POST['p_4_a']);

                $s_1_date = normal($_POST['s_1_date']);
                $s_2_date = normal($_POST['s_2_date']);
                $s_3_date = normal($_POST['s_3_date']);
                $s_4_date = normal($_POST['s_4_date']);

                $s_sub = explode(" to ", $s_1_date);
                $s_1_start = dateDB(normal($s_sub[0]));
                $s_1_end = dateDB(normal($s_sub[1]));

                $s_sub = explode(" to ", $s_2_date);
                $s_2_start = dateDB(normal($s_sub[0]));
                $s_2_end = dateDB(normal($s_sub[1]));

                $s_sub = explode(" to ", $s_3_date);
                $s_3_start = dateDB(normal($s_sub[0]));
                $s_3_end = dateDB(normal($s_sub[1]));

                $s_sub = explode(" to ", $s_4_date);
                $s_4_start = dateDB(normal($s_sub[0]));
                $s_4_end = dateDB(normal($s_sub[1]));


                $apt_query = "
                UPDATE `apartments` SET `name`='$name', `desc_1`='$desc_1', `desc_2`='$desc_2', `adults`=$adults, 
                `children`=$children, `p_1`=$price_1, `p_2`=$price_2, `p_3`=$price_3, `p_4`=$price_4, 
                `p_1_a`=$price_1_a, `p_2_a`=$price_2_a, `p_3_a`=$price_3_a, `p_4_a`=$price_4_a,
                `s_1_start`='$s_1_start', `s_1_end`='$s_1_end', `s_2_start`='$s_2_start', `s_2_end`='$s_2_end', 
                `s_3_start`='$s_3_start', `s_3_end`='$s_3_end', `s_4_start`='$s_4_start', `s_4_end`='$s_4_end'
                WHERE id=:id
                ";
                $stmt = $db->prepare($apt_query);
                
                if($stmt->execute(['id'=>(int)$page_id])){
                    $success = "Successfully edited the apartment!";
                } else {
                    $errors[] = "Couldn't update the apartment.";
                }


            }


        }


    } else {
        // Invalid edit param
        header('location: apartments.php');
    }


?>

<?php 
    $browserTitle = "View";
    $pageTitle = "Apartments";
    $customTop = '<div class="reserve-t-link">
        <a href="apartments.php">Go Back</a>
    </div>';
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/apartment_edit.php'); ?>




<script>
let up = document.getElementById("aptimages")
let reqTo = "<?=URL?>/include/uploadImage.php?apt_id=<?=$page_id?>";

up.addEventListener('change',(e)=>{

    let theFile = e.target.files;

    if(theFile.length > 0) {
        let fileType = theFile[0].type;
        let fileName = theFile[0].name;
        let fileSize = theFile[0].size;

        let allowedTypes = ['image/png', 'image/jpg', 'image/jpeg']

        if(allowedTypes.includes(fileType)) {
            
            let formData = new FormData();
            formData.append('theuploadUpdate', theFile[0]);
            
            let req = new XMLHttpRequest();
            req.open('POST', reqTo);

            req.onload = (e)=>{
                if(req.status == 200) {
                    
                    theResponse = JSON.parse(req.response);
                    theUploaded = '<?php echo URL ?>/assets/uploads/' + theResponse.message;

                    let theNewA = document.createElement('a');
                    theNewA.setAttribute('href', '<?=URL?>/admin/apartment_img_remove.php?id='+theResponse.img_id);
                    theNewA.setAttribute('target','blank');

                    let theNewIMG = document.createElement('img');
                    theNewIMG.setAttribute('src', theUploaded);
                    theNewA.append(theNewIMG);
                    document.querySelector('.apt-gallary-img').append(theNewA);

                    updateListeners();
                } else {
                    console.log('Nope', req.status);
                }
            }

            req.send(formData);
            
        } else {
            console.log('File type is not supported!');
        }
    }
    
})

</script>



<?php require('../views/layout/admin_footer.php'); ?>