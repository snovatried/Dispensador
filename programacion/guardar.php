<?php
session_start();
require "../config/conexion.php";

$sql = "INSERT INTO programacion
(id_usuario, id_medicamento, hora_dispenso, frecuencia, cantidad)
VALUES (?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->execute([
    $_SESSION['id_usuario'],
    $_POST['id_medicamento'],
    $_POST['hora_dispenso'],
    $_POST['frecuencia'],
    $_POST['cantidad']
]);
