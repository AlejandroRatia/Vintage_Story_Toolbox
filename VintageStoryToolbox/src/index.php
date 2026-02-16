<?php

// index.php?controlador=controller_name&accion=NomMetodo
$controller_name = isset($_GET['controller']) ? $_GET['controller'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Lógica de carga del controlador
switch($controller_name) {
    case 'route':
        require_once 'controllers/routeController.php';
        $controller = new routeController();
        break;
    case 'alloy':
        require_once 'controllers/alloyController.php';
        $controller = new alloyController();
        break;
}

// Ejecuta la acción
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    die("Acción no válida");
}

?>
