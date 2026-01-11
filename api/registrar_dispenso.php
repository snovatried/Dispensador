<?php
require "../config/conexion.php";

header("Content-Type: application/json");

$id_programacion = $_POST['id_programacion'];
$resultado = $_POST['resultado']; // exitoso o error
$obs = $_POST['observaciones'] ?? null;

$sql = "INSERT INTO historial_dispenso
(id_programacion, fecha, hora, resultado, observaciones)
VALUES (?, CURDATE(), CURTIME(), ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->execute([
    $id_programacion,
    $resultado,
    $obs
]);

echo json_encode([
    "estado" => "ok",
    "mensaje" => "Dispenso registrado"
]);
