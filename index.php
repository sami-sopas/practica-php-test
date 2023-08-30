<!DOCTYPE html>
<?php require('conexion.php'); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Formulario</h1>
    <form action="store.php" method="POST">
        <label for="nombre">Nombre</label><br>
        <input type="text" name="nombre" required><br>
        <label for="correo">Correo</label><br>
        <input type="text" name="correo"><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
        $sql = "SELECT * FROM usuarios";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Configura los resultados como un arreglo asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        echo "<ul>";
        while($row = $stmt->fetch()) {
            echo "<li>"  . $row['nombre'] . " " . $row['correo'] . "</li>";
        }
        echo "</ul>";
    ?>
</body>
</html>