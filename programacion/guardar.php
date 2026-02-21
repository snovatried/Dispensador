<?php
session_start();
require '../config/conexion.php';

if (!isset($_SESSION['id_usuario']) || !in_array($_SESSION['rol'] ?? '', ['admin', 'cuidador'], true)) {
    header('Location: ../index.php');
    exit;
}

$checkColumn = $pdo->prepare('SELECT 1 FROM information_schema.columns WHERE table_schema = ? AND table_name = ? AND column_name = ? LIMIT 1');
$checkColumn->execute(['public', 'programacion', 'id_paciente']);
$hasIdPaciente = (bool) $checkColumn->fetchColumn();

if ($hasIdPaciente) {
    $idPaciente = $_POST['id_paciente'] ?? null;
    if (!$idPaciente) {
        header('Location: crear.php');
        exit;
    }

    $sql = 'INSERT INTO programacion (id_usuario, id_paciente, id_medicamento, hora_dispenso, frecuencia, cantidad) VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_SESSION['id_usuario'],
        $idPaciente,
        $_POST['id_medicamento'],
        $_POST['hora_dispenso'],
        $_POST['frecuencia'],
        $_POST['cantidad'],
    ]);
} else {
    $sql = 'INSERT INTO programacion (id_usuario, id_medicamento, hora_dispenso, frecuencia, cantidad) VALUES (?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_SESSION['id_usuario'],
        $_POST['id_medicamento'],
        $_POST['hora_dispenso'],
        $_POST['frecuencia'],
        $_POST['cantidad'],
    ]);
}

header('Location: crear.php?ok=1');
exit;
