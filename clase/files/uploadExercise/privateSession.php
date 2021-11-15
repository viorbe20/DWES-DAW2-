<?php
//http://192.168.10.10/clase/files/uploadExercise/privateSession.php

//Cuando hay sesión iniciada
session_start();
if (!$_SESSION['auth']) {
    header('Location:index.php');
}
?>

<!--VISTA-->
<html lang="es">

<head>
    <meta charset="utf-8" />
</head>

<body>
<h1>
    Navegación: Página Privada
    </h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="publicSession.php">Público (Ver fotos)</a>
        <a href="closure.php">Salir</a>;
    </nav>
    <div>
        <?php
         echo "Esta es una cuenta privada. Puedes subir fotos y verlas desde aquí.";
        ?>
    </div>

    <h1>Subida de archivos.</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="file">Nombre del archivo:</label>
            <input type="file" name="file" id="file"><br/>
            <input type="submit" name="submit" value="Enviar">
        </form>
</body>

</html>