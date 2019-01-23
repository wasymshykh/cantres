<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Can Tres - <?php echo $browserTitle; ?></title>

    <link href="https://fonts.googleapis.com/css?family=Oswald:200,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yrsa:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/previous.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/flickity.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/style.css">


    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/jquery-ui.theme.css">

    <script src="<?php echo URL; ?>/assets/js/jquery.js"></script>
    <script src="<?php echo URL; ?>/assets/js/jquery-ui.min.js"></script>



</head>

<body>

    <!-- Header -->
    <header id="masthead" class="site-header">


        <div id="container">
            <a href="<?php echo URL; ?>/" title="Can Tres">
                <img src="http://www.cantresformentera.com/wp-content/themes/can-tres/img/logo.svg" alt="Can Tres"
                    class="logo" scale="0">
            </a>

            <div class="menu-idiomas-container">
                <ul id="menu-idiomas" class="menu">
                    <li id="menu-item-wpml-ls-13-en" class="menu-item wpml-ls-slot-13 wpml-ls-item wpml-ls-item-en wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-13-en"><a
                            title="En" href="http://www.cantresformentera.com/"><span class="wpml-ls-native">En</span></a></li>
                    <li id="menu-item-wpml-ls-13-es" class="menu-item wpml-ls-slot-13 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-13-es"><a
                            title="Es" href="http://www.cantresformentera.com/es/"><span class="wpml-ls-native">Es</span></a></li>
                </ul>
            </div>
        </div>

    </header>

    <section>
        <div id="main" <?=isset($specialClass)?'class="'.$specialClass.'"':''?>>
            <div class="main-inner">
