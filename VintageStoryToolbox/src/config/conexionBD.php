<?php
class Database {
    public static function conectar() {
        // 1. Detectamos el entorno actual (por defecto 'LOCAL' si no está definido)
        $entorno = isset($_ENV['APP_ENV']) ? strtoupper($_ENV['APP_ENV']) : 'LOCAL';

        // 2. Construimos las variables dinámicamente usando el prefijo (LOCAL_ o PROD_)
        // Usamos tus valores por defecto en caso de que no existan en el .env
        $host = $_ENV[$entorno . '_DB_HOST'] ?? (($entorno === 'LOCAL') ? 'db' : '127.0.0.1');
        $db   = $_ENV[$entorno . '_DB_NAME'] ?? 'Vintage_Story_Toolbox';
        $user = $_ENV[$entorno . '_DB_USER'] ?? 'root';
        $pass = $_ENV[$entorno . '_DB_PASS'] ?? ''; // Asegúrate de usar _DB_PASS en ambos bloques del .env
        $port = $_ENV[$entorno . '_DB_PORT'] ?? '3306';

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            // 3. La conexión se genera exactamente igual que antes, pero con los datos del entorno activo
            $pdo = new PDO(
                "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
                $user, $pass, $options
            );
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>