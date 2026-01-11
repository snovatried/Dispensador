<?php
session_start();
require "../config/conexion.php";

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../index.php");
    exit;
}

$sql = "
SELECT 
    h.fecha,
    h.hora,
    m.nombre AS medicamento,
    h.resultado,
    h.observaciones
FROM historial_dispenso h
JOIN programacion p ON h.id_programacion = p.id_programacion
JOIN medicamentos m ON p.id_medicamento = m.id_medicamento
ORDER BY h.fecha DESC, h.hora DESC
";

$stmt = $conexion->prepare($sql);
$stmt->execute();
$historial = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Historial de dispensos</h2>

<table border="1">
    <tr>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Medicamento</th>
        <th>Resultado</th>
        <th>Observaciones</th>
    </tr>

    <?php foreach ($historial as $h): ?>
    <tr>
        <td><?= $h['fecha'] ?></td>
        <td><?= $h['hora'] ?></td>
        <td><?= $h['medicamento'] ?></td>
        <td><?= $h['resultado'] ?></td>
        <td><?= $h['observaciones'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
