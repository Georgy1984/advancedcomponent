<?php
//phpinfo(); exit;

error_reporting(E_ALL);
ini_set('display_errors', 1);

//use App\controllers\Homepage;

require __DIR__.'/../vendor/autoload.php';
//require '../vendor/autoload.php';





if ($_SERVER['REQUEST_URI'] == '/homepage') {

    require '../app/controllers/Homepage.php';


}

exit;








