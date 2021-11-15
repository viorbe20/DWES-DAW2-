<?php
/**
 * 1. Subida de fotos al servidor.
 * 2. Mostrar fotos (público)
 * 3. Permiso para subir fotos (privado)
 *
 *http://192.168.10.10/clase/files/uploadExercise/index.php
 * */ 

 //Iniciamos sesión
session_start();

//Si en la sesión no se ha cargado el usuario la pasamos a falso
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth']=false;
}

//Si se ha pulsado enviar y el el usuario y contraseña son correctos,
//la sesion es true
if(isset($_POST['enviar'])){
    if (($_POST['usuario']=='usuario') and ($_POST['psw']=='1234')) {
        $_SESSION['auth']=true;
    }
}
?>



<!--validar usuarios-->
<!--VISTA-->
<html lang="es">

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h1>
    Navegación: Página de inicio
    </h1>
    <nav>
        <a href="publicSession.php">Público (Ver fotos)</a>
        <?php
        //Si hacemos login, aparecen estos links (navegación privada)
        if ($_SESSION['auth']) {
            echo "<a href=\"privateSession.php\">Privado (Subir fotos)</a>";
            echo "</br>";
            echo "<a href=\"closure.php\">Salir</a>";
            echo "----";
            echo "<a href=\"index.php\">Inicio</a>";
        }
        ?>
    </nav>
    <div>
        <?php
        if ($_SESSION['auth']) {
            echo "</br>";
            echo "Has hecho login.";
            echo "</br>";
            echo "Desde aquí puedes acceder a una página privada.";
        } else {
            //Formulario cuando no estás logueado
            include "form.view.html";
        }
        ?>
    </div>
</body>

</html>