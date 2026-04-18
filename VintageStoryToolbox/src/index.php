<?php

$controller_name = isset($_GET['controller']) ? $_GET['controller'] : 'route';
$action = isset($_GET['action']) ? $_GET['action'] : 'selector';

switch($controller_name) {
	case 'route':
		require_once 'controllers/routeController.php';
		$controller = new routeController();
		break;
	case 'alloy':
		require_once 'controllers/alloyController.php';
		$controller = new alloyController();
		break;
	default:
		require_once 'controllers/routeController.php';
		$controller = new routeController();
		break;
}

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    die("Acción no válida");
}

?>