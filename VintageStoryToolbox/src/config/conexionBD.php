<?php
class Database {
	public static function conectar() {
		$host = $_ENV['DB_HOST'] ?? 'db';
		$db   = $_ENV['DB_NAME'] ?? 'Vintage_Story_Toolbox';
		$user = $_ENV['DB_USER'] ?? 'root';
		$pass = $_ENV['DB_PASSWORD'] ?? 'admin';
		$port = $_ENV['DB_PORT'] ?? '3306';

		try {
			$pdo = new PDO(
				"mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
				$user,
				$pass,
				[
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				]
			);
			return $pdo;
		} catch (PDOException $e) {
			die("Error de conexión: " . $e->getMessage());
		}
	}
}
?>