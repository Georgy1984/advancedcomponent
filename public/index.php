<?php
//phpinfo(); exit;

error_reporting(E_ALL);
ini_set('display_errors', 1);



require __DIR__.'/../vendor/autoload.php';


if ($_SERVER['REQUEST_URI'] == '/home') {

    require '../app/controllers/Homepage.php';


}

exit;








