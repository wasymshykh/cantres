<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

// DB contants

define('DB_HOST', 'localhost');
define('DB_NAME', 'cantres');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');

try {
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Image Constants

define('IMG_EXT', ["jpeg","jpg","png"]);
define('IMG_MAX_SIZE', 1000000);


// Other constants

define('URL', 'http://localhost/cantres');


?>