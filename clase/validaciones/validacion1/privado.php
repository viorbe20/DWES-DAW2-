<?php
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
        Ejemplo Auth. Básico
    </h1>
    <nav>
        <a href="index.php">Inicio</a>
        <a href="publico.php">Público</a>
        <a href="privado.php">Privado</a>;
        <a href="salir.php">Salir</a>;
    </nav>
    <div>
        <?php
         echo "Información de cuenta.";
        ?>
    </div>
    <h2>
        Página privada.
    </h2>
</body>

</html>