<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="guardar.php" method="POST">
    <select name="id_medicamento">
        <!-- medicamentos desde BD -->
    </select>

    <input type="time" name="hora_dispenso">
    <input type="text" name="frecuencia">
    <input type="number" name="cantidad">

    <button>Programar</button>
</form>
</body>
</html>