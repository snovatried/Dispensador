<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}
?>

<h1>Dashboard Administrador</h1>

<ul>
    <li><a href="../medicamentos/listar.php">Gestionar medicamentos</a></li>
    <li><a href="../programacion/crear.php">Programar dispensos</a></li>
    <li><a href="../historial/ver.php">Ver historial</a></li>
    <li><a href="../auth/logout.php">Cerrar sesion</a></li>
</ul>
