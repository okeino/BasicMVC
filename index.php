<?php
//Start Session
session_start();

// Include Config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Messages.php');
require('classes/Images.php');

require('controllers/home.php');
require('controllers/admin.php');
require('controllers/errors.php');

require('models/home.php');
require('models/admin.php');
require('models/errors.php');


$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if($controller){
    $controller->executeAction();
}


?>