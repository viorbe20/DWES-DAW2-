<?php
session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth']=false;
}

if(isset($_POST['enviar'])){
    if (($_POST['usuario']=='usuario') and ($_POST['psw']=='1234')) {
        $_SESSION['auth']=true;
    }
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
        <?php
        if ($_SESSION['auth']) {
            echo "<a href=\"privado.php\">Privado</a>";
            echo "<a href=\"salir.php\">Salir</a>";
        }
        ?>
    </nav>
    <div>
        <?php
        if ($_SESSION['auth']) {
            echo "Información de cuenta.";
        } else {
            include "/view/form.view.html";
        }
        ?>
    </div>
    <h2>
        Página pública.
    </h2>
</body>

</html>