<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - <?php echo $browserTitle; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Oswald:200,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yrsa:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/admin.css">


    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/jquery-ui.theme.css">

    <script src="<?php echo URL; ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URL; ?>/assets/js/jquery-ui.min.js"></script>



</head>

<body>

    <div id="admin">
        <div class="admin-l">
            <ul>
                <li><a href="<?php echo URL; ?>/admin/reserve.php" class="isActive">Reservas</a></li>
                <li><a href="<?php echo URL; ?>/admin/apartments.php">Apartmentos</a></li>
                <li><a href="<?php echo URL; ?>/admin/calendar.php">Calendario</a></li>
                <li><a href="<?php echo URL; ?>/admin/clients.php">Clientes</a></li>
            </ul>
        </div>
        <div class="admin-r">

            <div class="admin-topbar">
                <div class="admin-title">
                    <h1><?php echo $pageTitle; ?></h1>
                </div>
            </div>

            <div class="admin-content">