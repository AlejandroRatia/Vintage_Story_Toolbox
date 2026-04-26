<?php
class routeController {
	public function selector(): void {
		require_once __DIR__ . '/../views/selector.php';
	}
	public function calculadora(): void {
		require_once __DIR__ . '/../views/calculadoraA.php';
	}
	public function generador(): void {
		require_once __DIR__ . '/../views/generadorHR.php';
	}
}
?>