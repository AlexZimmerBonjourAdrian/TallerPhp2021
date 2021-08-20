<?php
 //Start Session
session_start();

// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/articulos.php');
require('controllers/users.php');
require('controllers/suscripciones.php');

require('models/home.php');
require('models/user.php');
require('models/articulo.php');
require('models/suscripcion.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}