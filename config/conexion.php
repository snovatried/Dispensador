<?php
$host = "localhost:33066";
$bd   = "dispensador_medicina";
$user = "root";
$pass = "";

try {
    $conexion = new PDO(
        "mysql:host=$host;dbname=$bd;charset=utf8",
        $user,
        $pass
    );
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexion: " . $e->getMessage();
}
