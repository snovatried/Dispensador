<?php
session_start();
if ($_SESSION['rol'] !== 'paciente') {
    header("Location: ../index.php");
    exit;
}
?>

<h1>Dashboard Paciente</h1>

<ul>
    <li><a href="../historial/ver.php">Ver mis dispensos</a></li>
    <li><a href="../auth/logout.php">Cerrar sesion</a></li>
</ul>
