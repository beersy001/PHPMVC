<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('CONTROLLERS', ROOT . DS . 'application' . DS . 'controllers');
define('MODELS', ROOT . DS . 'application' . DS . 'models');
define('VIEWS', ROOT . DS . 'application' . DS . 'views');
define('LIBRARY', ROOT . DS . 'library');
define('CONFIG', ROOT . DS . 'config');
define('PUBLIC_DIR', ROOT . DS . 'public');
define('HOME', PUBLIC_DIR . DS . 'index.php');


$url = $_GET['url'];

require_once (LIBRARY . DS . 'bootstrap.php');
?>