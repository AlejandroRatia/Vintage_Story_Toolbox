<?php
// Cargar .env
if (file_exists(__DIR__ . '/.env')) {
	$content = file_get_contents(__DIR__ . '/.env');
	$lines = preg_split('/\r\n|\r|\n/', $content);
	foreach ($lines as $line) {
		$line = trim($line);
		if (empty($line) || strpos($line, '#') === 0) continue;
		if (strpos($line, '=') !== false) {
			[$key, $value] = explode('=', $line, 2);
			$_ENV[trim($key)] = trim($value);
		}
	}
}
//var_dump($_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER']);
//die();

$controller_name = isset($_GET['controller']) ? $_GET['controller'] : 'route';
$action = isset($_GET['action']) ? $_GET['action'] : 'selector';

switch($controller_name) {
	case 'route':
		require_once 'src/controllers/routeController.php';
		$controller = new routeController();
		break;
	case 'alloy':
		require_once 'src/controllers/alloyController.php';
		$controller = new alloyController();
		break;
	case 'crafting':
    require_once 'src/controllers/craftingController.php';
    $controller = new craftingController();
    break;
	default:
		require_once 'src/controllers/routeController.php';
		$controller = new routeController();
		break;
}

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    die("Acción no válida");
}
?>