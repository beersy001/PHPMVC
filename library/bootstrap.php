<?php

session_start();

require_once (CONFIG . DS . 'config.php');

// ----- Set the number of page views per session ---------------------------------------------------------------
function setNumberOfViews() {
	if (isset($_SESSION['views'])) {
		$_SESSION['views'] = $_SESSION['views'] + 1;
	} else {
		$_SESSION['views'] = 1;
	}
}

// ----- check for cookies -------------------------------------------------------------------------------------
function checkForCookies() {
	print (DEVELOPMENT_ENVIRONMENT ? '<br>(bootstrap.php) - cookieMaintenance() - should be 1st' : '');

	if (isset($_COOKIE['username']) AND isset($_COOKIE['password'])) {
		print (DEVELOPMENT_ENVIRONMENT ? '<br>(bootstrap.php) - cookieMaintenance() - user returned and logged back in' : '');

		$_SESSION['username'] = $_COOKIE['username'];
		$_SESSION['authenticated'] = 'true';
	}
}

// ----- check authentication ----------------------------------------------------------------------------------
function checkAuthentication() {
	if ((isset($authenticated) AND $authenticated === true) OR (!isset($authenticated) AND $_SESSION['authenticated'] === true) OR (isset($_COOKIE['username']) AND isset($_COOKIE['password']))) {
		$_SESSION['authenticated'] = true;
	} else {
		$_SESSION['authenticated'] = false;
	}
}

// ----- Run the main bootstrap code ----------------------------------------------------------------------------
function run() {
	print (DEVELOPMENT_ENVIRONMENT ? '<br>(bootstrap.php) - run()' : '');

	$_SESSION['authenticated'] = isset($_SESSION['authenticated']) ? $_SESSION['authenticated'] : false;

	global $url;
	global $default;

	if (!isset($url)) {
		$controller = $default['controller'];
		$actionName = $default['action'];
		$queryString = array();
	} else {

		$urlArray = array();
		$urlArray = explode('/', $url);

		$controller = $urlArray[0];
		array_shift($urlArray);
		$actionName = $urlArray[0];
		array_shift($urlArray);
		$queryString = $urlArray;
	}

	$controllerName = $controller;
	$controller = ucwords($controller);
	$serviceName = $controller . 'Service';
	$modelName = $controller;
	$controller .= 'Controller';

	$dispatch = new $controller($serviceName, $controllerName, $actionName);

	call_user_func_array(array($dispatch, $actionName), $queryString);
}

// ----- auto include the required classes ----------------------------------------------------------------------
function __autoLoad($className) {

	$objectName = strtolower(substr($className, 0, strpos($className, "Service")));
	$mapperName = ucfirst($objectName) . 'Mapper';

	// -- Libary Includes
	if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . DS . '.class.php')) {
		require_once (ROOT . DS . 'library' . DS . strtolower($className) . DS . '.class.php');
	}


	// -- Controller Includes
	if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php')) {
		include_once (ROOT . DS . 'application' . DS . 'controllers' . DS . $className . '.php');
	}

	// -- Model Includes
	if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . ucfirst($objectName) . '.php')) {
		include_once (ROOT . DS . 'application' . DS . 'models' . DS . ucfirst($objectName) . '.php');
	}

	// -- Service Includes
	if (file_exists(ROOT . DS . 'application' . DS . 'services' . DS . $objectName . DS . $className . '.php')) {
		include_once (ROOT . DS . 'application' . DS . 'services' . DS . $objectName . DS . $className . '.php');
	}

	// -- Mapper Includes
	if (file_exists(ROOT . DS . 'application' . DS . 'mappers' . DS . $mapperName . '.php')) {
		include_once (ROOT . DS . 'application' . DS . 'mappers' . DS . $mapperName . '.php');
	}
}

function checkForLogOut() {

}

checkForCookies();
checkAuthentication();
setNumberOfViews();
run();
?>
