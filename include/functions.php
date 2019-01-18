<?php 

// Form data filter

function normal($data) {
    if(gettype($data) !== "array"){
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
    return '';
}

function apt_error($field, $is_what) {
    
    switch ($field) {
        case 'apt_name':
            return 'Apartment name is '.$is_what;
        case 'apt_desc_1':
            return 'Description one is '.$is_what;
        case 'apt_desc_2':
            return 'Description two is '.$is_what;
        case 'apt_adults':
            return 'Adults is '.$is_what;
        case 'apt_children':
            return 'Childerns is '.$is_what;
        case 'p_1':
            return 'Price 1 (T.BAJA) is '.$is_what;
        case 'p_2':
            return 'Price 2 (T.MEDIA) is '.$is_what;
        case 'p_3':
            return 'Price 3 (T.ALTA) is '.$is_what;
        case 'p_4':
            return 'Price 4 (T.PRIME) is '.$is_what;
        case 's_1_start':
            return 'Season one (start) is '.$is_what;
        case 's_1_end':
            return 'Season one (end) is '.$is_what;
        case 's_2_start':
            return 'Season two (start) is '.$is_what;
        case 's_2_end':
            return 'Season two (end) is '.$is_what;
        case 's_3_start':
            return 'Season three (start) is '.$is_what;
        case 's_3_end':
            return 'Season three (end) is '.$is_what;
        case 's_4_start':
            return 'Season four (start) is '.$is_what;
        case 's_4_end':
            return 'Season four (end) is '.$is_what;
        default:
            return 'There is error ' . $is_what;
            break;
    }

}




// Uploading an image from $_FILE['-----']

function uploadImage($data)
{

    $target_dir = "../assets/uploads/";

    $file_name = time() . basename(normal($data['name']));
    $target_file = $target_dir . $file_name; 

    $file_size = $data['size'];
    $file_tmp = $data['tmp_name'];

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(in_array($imageFileType,IMG_EXT) === false) {
        $errors[]="Extension not allowed.";
    }
    if($file_size > IMG_MAX_SIZE) {
        $errors[]='File size must be less than 1 MB';
    }
    if(empty($errors)==true){

        $checker = move_uploaded_file($file_tmp, $target_file);

        if($checker){
            echo json_encode(array(
                'success'=>true,
                'message'=>$file_name
            ));
        } else {
            echo json_encode(array(
                'error'=>true,
                'message'=>'Error while uploading the file'
            ));
        }
        
    } else {
        echo json_encode(array(
            'error'=>true,
            'message'=>$errors
        ));
    }
}
