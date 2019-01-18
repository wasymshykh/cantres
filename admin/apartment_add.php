<?php 
    require('../config/start.php');
    require('../include/functions.php');


    
    $errors = [];



    if(isset($_POST['add_apartment']) && !empty(normal($_POST['add_apartment']))){
        echo print_r($_POST);

        foreach ($_POST as $p_name => $p_value) {
            if(empty(normal($p_value))){
                $errors[] = apt_error($p_name, 'Empty');
            }
        }

        if(empty($errors)){
            $name = empty(normal($_POST['apt_name']));
            $desc_1 = empty(normal($_POST['apt_desc_1']));
            $desc_2 = empty(normal($_POST['apt_desc_2']));
            $adults = empty(normal($_POST['apt_adults']));
            $children = empty(normal($_POST['apt_children']));

            $price_1 = empty(normal($_POST['p_1']));
            $price_2 = empty(normal($_POST['p_2']));
            $price_3 = empty(normal($_POST['p_3']));
            $price_4 = empty(normal($_POST['p_4']));

            $s_1_start = empty(normal($_POST['s_1_start']));
            $s_1_end = empty(normal($_POST['s_1_end']));
            $s_2_start = empty(normal($_POST['s_2_start']));
            $s_2_end = empty(normal($_POST['s_2_end']));
            $s_3_start = empty(normal($_POST['s_3_start']));
            $s_3_end = empty(normal($_POST['s_3_end']));
            $s_4_start = empty(normal($_POST['s_4_start']));
            $s_4_end = empty(normal($_POST['s_4_end']));



        }

        print_r($errors);

    }







?>


<?php 
    $browserTitle = "Add";
    $pageTitle = "Add Apartment";
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/apartment-add.php'); ?>




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



let getHiddens = document.querySelectorAll('.theimages');
getHiddens.forEach(t => {
    let theNewIMG = document.createElement('img');
    theNewIMG.setAttribute('src', t.getAttribute('src'));
    document.querySelector('.apt-gallary-img').append(theNewIMG);
})


</script>


<?php require('../views/layout/admin_footer.php'); ?>