<?php 
    require('../config/start.php');
    require('../include/functions.php');


    if(!isset($_GET['page'])){
        $pageNo = 1;
    } else {
        $pageNo = (int)$_GET['page'];
    }

    $currentMonth = calendarCheck($pageNo);
    $totalDays = cal_days_in_month(CAL_GREGORIAN, $currentMonth['month'], $currentMonth['year']);
    
    $monthname = (new DateTime($currentMonth['month']."/1/".$currentMonth['year']))->format('F');

    $apartments = getApartments($db);

    if(isset($_GET['res_no']) && isset($_GET['day'])){
        $res_no = (int)normal($_GET['res_no']);
        $day = (int)normal($_GET['day']);

        $res_query = "SELECT `res_no`, a.`name` as `apt_name`, c.`name` as `person_name`, `surname`, `start_date`,
        `end_date`, `cost`, `note` FROM `reserve` r INNER JOIN `apartments` a
        ON r.apt_id = a.id INNER JOIN `client` c ON r.client_id = c.id 
        WHERE `res_no`=:res_no";

        $stmt = $db->prepare($res_query);
        $stmt->execute(['res_no'=>$res_no]);
        $res_data = $stmt->fetch();
    }



?>

<?php 
    $browserTitle = "View";
    $pageTitle = "CALENDARIO";
    require('../views/layout/admin_header.php'); 
?>


<?php require('../views/admin/calendar.php'); ?>

<?php require('../views/layout/admin_footer.php'); ?>