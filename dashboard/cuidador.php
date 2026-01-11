<?php
session_start();
if ($_SESSION['rol'] !== 'cuidador') {
    header("Location: ../index.php");
    exit;
}
?>

<h1>Dashboard Cuidador</h1>

<ul>
    <li><a href="../programacion/crear.php">Programar medicamentos</a></li>
    <li><a href="../historial/ver.php">Ver historial</a></li>
    <li><a href="../auth/logout.php">Cerrar sesion</a></li>
</ul>
