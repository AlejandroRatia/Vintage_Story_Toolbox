<?php
class Database {
    public static function conectar() {
        $host = 'localhost';
        $db = 'Vintage_Story_Toolbox';
        $user = 'root'; // Cambiar según la configuración
        $pass = 'admin';     // Cambiar según la configuración

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>