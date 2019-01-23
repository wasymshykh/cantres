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
            return 'There is error ('.$field.') ' . $is_what;
            break;
    }

}


// Date Manipulation


function dateDB($d)
{
    $date = new DateTime($d);
    return $date->format('Y-m-d H:i:s');
}

function dateUser($d)
{
    $date = new DateTime($d);
    return $date->format('m/d/Y');
}

function dateForm($d, $f)
{
    $date = new DateTime($d);
    return $date->format($f);
}

function dateDiffer($d1, $d2)
{
    $dStart = new DateTime($d1);
    $dEnd  = new DateTime($d2);
    $dDiff = $dStart->diff($dEnd);
    return $dDiff->days;
}

function dateValid($d1, $d2)
{
    $dStart = new DateTime($d1);
    $dEnd = new DateTime($d2);
    $dToday = new DateTime("now");

    if($dStart > $dEnd){
        return false;
    }
    if($dToday > $dStart) {
        return false;
    }

    return true;
}

function calendarCheck($page)
{
    $current_month = date('n');
    $current_year = date('Y');

    if($page > 0){
        for($i = 1; $i < $page; $i++){
            if($current_month == 1){
                $current_year--;
                $current_month = 12;
            } else {
                $current_month--;
            }
        }
    } else {
        for($i = 1; $i > $page; $i--){
            if($current_month == 12){
                $current_year++;
                $current_month = 1;
            } else {
                $current_month++;
            }
        }
    }

    return [
        'month'=>$current_month,
        'year'=>$current_year
    ];

}



// Uploading an image from $_FILE['-----']

function uploadImage($data) {
    $target_dir = "../assets/uploads/";
    $file_name = time() . '_' . basename(normal($data['name']));
    $file_name = preg_replace('/\s/', '', $file_name);
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

// Uploading updated an image from $_FILE['-----']

function uploadUpdateImage($data, $apt_id, $db) {
    $target_dir = "../assets/uploads/";
    $file_name = time() . '_' . basename(normal($data['name']));
    $file_name = preg_replace('/\s/', '', $file_name);
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

            $stmt = $db->prepare('INSERT INTO `apartment_images`(`img_name`,`apt_id`,`is_active`) VALUE (:img_name, :apt_id, 1)');

            $stmt->execute([
                'img_name'=>$file_name,
                'apt_id'=>$apt_id
            ]);

            $img_id = $db->lastInsertId();

            echo json_encode(array(
                'success'=>true,
                'message'=>$file_name,
                'img_id'=>$img_id
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


// Apartment Checker for reservation
function getAvailable($from, $to, $adults, $children, $db, $limit = false)
{
    
    $apt_query = "SELECT * FROM `apartments`";
    $stmt = $db->prepare($apt_query);
    $stmt->execute();
    $apartments = $stmt->fetchAll();

    $availableApartments = [];
    $index = 1;
    foreach ($apartments as $apt) {
        if(isAvailable($from, $to, $apt['id'], $db) && isEligible($adults, $apt['adults'], $children, $apt['children'])){
            $availableApartments[] = $apt;
            if($limit && $index > $limit){
                return $availableApartments;
            }
        }
    }

    return $availableApartments;
}


// if person and childern can fill the apartment
function isEligible($adults, $apt_adults, $children, $apt_children) {
    if($adults <= $apt_adults && $children <= $apt_children){
        return true;
    } else {
        return false;
    }
}

// reservation table checker
function isAvailable($from, $to, $apt_id, $db) {
    $selectApartments = "SELECT `start_date`, `end_date` FROM `reserve` WHERE `apt_id`=:apt_id";
    $stmt = $db->prepare($selectApartments);
    $stmt->execute(['apt_id'=>$apt_id]);
    $results = $stmt->fetchAll();

    $givenDates = getRange($from, $to);
    $dateChecks = [];
    foreach($givenDates as $dt) {
        $dateChecks[] = $dt->format("m/d/Y");
    }

    foreach ($results as $reserve) {
        $reserveRanges = getRange($reserve['start_date'], $reserve['end_date']);
        $reservedChecks = [];
        foreach($reserveRanges as $dt) {
            $reservedChecks[] = $dt->format("m/d/Y");
        }
        
       foreach($dateChecks as $dateCheck){
           foreach ($reservedChecks as $reservedCheck) {
               if($dateCheck == $reservedCheck){
                   return false;
               }
           }
       }
    }
    
    return true;
}

function getRange($from, $to) {
    $start = new DateTime($from);
    $end = new DateTime($to);
    $end->modify('+1 day');
    $interval = DateInterval::createFromDateString('1 day');
    return new DatePeriod($start, $interval, $end);
}

function getApartmentPrice($from, $to, $apt) {
    
    $given_range = getRange($from, $to);
    $season_1_range = getRange($apt['s_1_start'],$apt['s_1_end']);
    $season_2_range = getRange($apt['s_2_start'],$apt['s_2_end']);
    $season_3_range = getRange($apt['s_3_start'],$apt['s_3_end']);
    $season_4_range = getRange($apt['s_4_start'],$apt['s_4_end']);

    $given_range_checks = [];
    foreach($given_range as $dt) {
        $given_range_checks[] = $dt->format("m/d/Y");
    }

    $season_1_checks = [];
    foreach($season_1_range as $dt) {
        $season_1_checks[] = $dt->format("m/d/Y");
    }
    $season_2_checks = [];
    foreach($season_2_range as $dt) {
        $season_2_checks[] = $dt->format("m/d/Y");
    }
    $season_3_checks = [];
    foreach($season_3_range as $dt) {
        $season_3_checks[] = $dt->format("m/d/Y");
    }
    $season_4_checks = [];
    foreach($season_4_range as $dt) {
        $season_4_checks[] = $dt->format("m/d/Y");
    }

    $totalCost = 0;
    foreach ($given_range_checks as $given_date) {
        if(in_array($given_date, $season_1_checks)){
            $totalCost += $apt['p_1'];
        }
        if(in_array($given_date, $season_2_checks)){
            $totalCost += $apt['p_2'];
        }
        if(in_array($given_date, $season_3_checks)){
            $totalCost += $apt['p_3'];
        }
        if(in_array($given_date, $season_4_checks)){
            $totalCost += $apt['p_4'];
        }
    }

    return $totalCost;
}

function getApartment($apt_id, $db)
{
    $apt_query = "SELECT * FROM `apartments` WHERE `id`=$apt_id";
    $stmt = $db->prepare($apt_query);
    $stmt->execute();
    return $stmt->fetch();
}

function getApartments($db)
{
    $apt_query = "SELECT * FROM `apartments`";
    $stmt = $db->prepare($apt_query);
    $stmt->execute();
    return $stmt->fetchAll();
}



function getAvailableReserve($from, $to, $db)
{
    
    $res_query = "SELECT * FROM `reserve`";
    $stmt = $db->prepare($res_query);
    $stmt->execute();
    $reservation = $stmt->fetchAll();

    $availableReservation = [];
    foreach ($reservation as $res) {
        if(isBooked($from, $to, $res['res_no'], $db)){
            $availableReservation[] = $res;
        }
    }

    return $availableReservation;
}


function isBooked($from, $to, $res_no, $db) {
    $selectApartments = "SELECT `start_date`, `end_date` FROM `reserve` WHERE `res_no`=:res_no";
    $stmt = $db->prepare($selectApartments);
    $stmt->execute(['res_no'=>$res_no]);
    $results = $stmt->fetchAll();

    $givenDates = getRange($from, $to);
    $dateChecks = [];
    foreach($givenDates as $dt) {
        $dateChecks[] = $dt->format("m/d/Y");
    }

    foreach ($results as $reserve) {
        $reserveRanges = getRange($reserve['start_date'], $reserve['end_date']);
        $reservedChecks = [];
        foreach($reserveRanges as $dt) {
            $reservedChecks[] = $dt->format("m/d/Y");
        }
        
        $isAvail = -1;
       foreach($dateChecks as $dateCheck){
           foreach ($reservedChecks as $reservedCheck) {
               if($dateCheck == $reservedCheck){
                   return true;
               }
           }
       }
    }
    
    return false;
}




// Calendar is Available
function isCalendarReserved($from, $to, $apt_id, $db) {
    $selectApartments = "SELECT `res_no`,`start_date`, `end_date` FROM `reserve` WHERE `apt_id`=:apt_id";
    $stmt = $db->prepare($selectApartments);
    $stmt->execute(['apt_id'=>$apt_id]);
    $results = $stmt->fetchAll();

    $givenDates = getRange($from, $to);
    $dateChecks = [];
    foreach($givenDates as $dt) {
        $dateChecks[] = $dt->format("m/d/Y");
    }

    foreach ($results as $reserve) {
        $reserveRanges = getRange($reserve['start_date'], $reserve['end_date']);
        $reservedChecks = [];
        foreach($reserveRanges as $dt) {
            $reservedChecks[] = $dt->format("m/d/Y");
        }
        
       foreach($dateChecks as $dateCheck){
           foreach ($reservedChecks as $reservedCheck) {
               if($dateCheck == $reservedCheck){
                   return $reserve;
               }
           }
       }
    }
    
    return false;
}


function getApartmentImages($apt_id, $db)
{
    $apt_img_query =  "SELECT * FROM `apartment_images` WHERE `apt_id`=:apt_id";

    $stmt = $db->prepare($apt_img_query);
    $stmt->execute(['apt_id'=>$apt_id]);
    
    return $stmt->fetchAll();
}
