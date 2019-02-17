<?php 
    require('../config/start.php');
    require('../include/functions.php');


    
    $errors = [];



    if(isset($_POST['add_apartment']) && !empty(normal($_POST['add_apartment']))){

        foreach ($_POST as $p_name => $p_value) {
            if(!in_array($p_name, ['p_1_a', 'p_2_a', 'p_3_a', 'p_4_a'])){
                if(empty(normal($p_value)) && gettype($p_value) !== 'array'){
                    $errors[] = apt_error($p_name, 'Empty');
                }
            }
        }

        if(empty($_POST['apt_images'])){
            $errors[] = 'Apartment images is not selected';
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


            // $s_1_start = dateDB(normal($_POST['s_1_start']));
            // $s_1_end = dateDB(normal($_POST['s_1_end']));
            // $s_2_start = dateDB(normal($_POST['s_2_start']));
            // $s_2_end = dateDB(normal($_POST['s_2_end']));
            // $s_3_start = dateDB(normal($_POST['s_3_start']));
            // $s_3_end = dateDB(normal($_POST['s_3_end']));
            // $s_4_start = dateDB(normal($_POST['s_4_start']));
            // $s_4_end = dateDB(normal($_POST['s_4_end']));

            //$totalDay = dateDiffer($s_1_start, $s_1_end)+dateDiffer($s_2_start, $s_2_end)+dateDiffer($s_3_start, $s_3_end)+dateDiffer($s_4_start, $s_4_end);
            

            $apt_imgs = $_POST['apt_images'];

            $apt_query = "
                INSERT INTO `apartments` (`name`, `desc_1`, `desc_2`, `adults`, 
                `children`, `p_1`, `p_2`, `p_3`, `p_4`, `p_1_a`, `p_2_a`, `p_3_a`, `p_4_a`,
                `s_1_start`, `s_1_end`, `s_2_start`, `s_2_end`, 
                `s_3_start`, `s_3_end`, `s_4_start`, `s_4_end`)
                VALUES ('$name', '$desc_1', '$desc_2', '$adults',
                '$children', '$price_1', '$price_2', '$price_3', '$price_4', '$price_1_a', '$price_2_a', '$price_3_a', '$price_4_a',
                DATE('$s_1_start'), DATE('$s_1_end'), DATE('$s_2_start'), DATE('$s_2_end'),
                DATE('$s_3_start'), DATE('$s_3_end'), DATE('$s_4_start'), DATE('$s_4_end'))
            ";

            $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);

            try {
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();
                $db->exec($apt_query);

                $apt_toBe = $db->lastInsertId();

                foreach ($apt_imgs as $apt_img) {
                    $img_query = "
                    INSERT INTO `apartment_images` (`img_name`, `apt_id`, `is_active`)
                    VALUES ('$apt_img', '$apt_toBe', 1)
                    ";

                    $db->exec($img_query);
                }

                $db->commit();

            } catch(Exception $e) {
                $db->rollBack();
                $errors[] = "FAILED: " . $e->getMessage();
            }
            

            if(empty($errors)){
                $success = "Successfully Added the apartment!";
                $_POST = [];
            }

            
            
        }

    }







?>


<?php 
    $browserTitle = "Add";
    $pageTitle = "Add Apartment";
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/apartment_add.php'); ?>




<script>
let up = document.getElementById("aptimages")
let reqTo = "<?php echo URL ?>/include/uploadImage.php";

up.addEventListener('change',(e)=>{

    let theFile = e.target.files;

    if(theFile.length > 0) {
        let fileType = theFile[0].type;
        let fileName = theFile[0].name;
        let fileSize = theFile[0].size;

        let allowedTypes = ['image/png', 'image/jpg', 'image/jpeg']

        if(allowedTypes.includes(fileType)) {
            
            let formData = new FormData();
            formData.append('theupload', theFile[0]);
            
            let req = new XMLHttpRequest();
            req.open('POST', reqTo);

            req.onload = (e)=>{
                if(req.status == 200) {
                    theResponse = JSON.parse(req.response);
                    theUploaded = '<?php echo URL ?>/assets/uploads/' + theResponse.message;

                    let theNewIMG = document.createElement('img');
                    theNewIMG.setAttribute('src', theUploaded);
                    document.querySelector('.apt-gallary-img').append(theNewIMG);

                    let createInvisible = document.createElement('input');
                    createInvisible.setAttribute('type', 'hidden');
                    createInvisible.setAttribute('name', 'apt_images[]');
                    createInvisible.setAttribute('class', 'theimages');
                    createInvisible.setAttribute('value', theResponse.message);
                    document.querySelector('#addForm').append(createInvisible);


                    console.log(req.response);
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