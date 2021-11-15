<?php
//http://192.168.10.10/clase/files/uploadExercise/publicSession.php

//Inicio de sesión en caso que el usuario decida loguearse estando en estado público
session_start();
if (!isset($_SESSION['auth'])) {
    $_SESSION['auth']=false;
}

//Validación de datos con el botón enviar
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
    Navegación: Página pública
    </h1>
    <nav>
        <a href="index.php">Inicio</a>
        <?php
        if ($_SESSION['auth']) {
            echo "<a href=\"privateSession.php\">Privado</a>";
            echo "<a href=\"closure.php\">Salir</a>";
        }
        ?>
    </nav>
    <div>
        <?php
        if ($_SESSION['auth']) {
            function showFiles($path){
                // Abrimos la carpeta y la guardamos en una variable 
                $dir = opendir($path);
                // Mientras haya archivos, los lee
                while ($element = readdir($dir)){
                    //Imprimimos los archivos mientras no lea puntos
                    if( $element != "." && $element != ".."){
                        echo "<img src='img/$element'/ width = 20% height = 30%><br/>";
                    }
                }
            }
            showFiles("./img/");
        } else {
            function showFiles($path){
                // Abrimos la carpeta y la guardamos en una variable 
                $dir = opendir($path);
                // Mientras haya archivos, los lee
                while ($element = readdir($dir)){
                    //Imprimimos los archivos mientras no lea puntos
                    if( $element != "." && $element != ".."){
                        echo "<img src='img/$element'/ width = 50% height = 70%><br/>";
                    }
                }
            }
            showFiles("./img/");

            include "form.view.html";
        }
        ?>
    </div>
</body>

</html>