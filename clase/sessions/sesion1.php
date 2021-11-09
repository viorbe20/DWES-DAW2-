<?php

/*
http://192.168.10.10/clase/sessions/sesion1.php
Formulario que pide nombre y teléfono.
Una vez introducidos se da al botón enviar para visualizar la lista de contectos
en la parte inferior de la pantalla.
*/

//Iniciamos sesión
session_start();

//Si la variable SESSION no se ha generado, le asignamos un array vacío
if (!isset($_SESSION['agenda'])) {
    $_SESSION['agenda'] = array();
}

//Si se ha pulsado el botón enviar, asignamos a la variable agenda el nombre y el teléfono introducidos
//Es un array asociativo con nombre y valor
if (isset($_POST['send'])) {
    $_SESSION['agenda'][]=array('nombre'=>$_POST['nombre'],
                                'telefono'=>$_POST['telefono']);
}
?>

<!--VISTA-->
<html lang="es">
<head>
    <meta charset="utf-8">
</head>

<body>
<h1>Agenda de Contactos</h1>

<form action="" method="post">
    <p>Nombre:</p>
    <input type="text" name="nombre" placeholder="Nombre"/> 
    
    <p>Teléfono:</p>
    <input type="text" name="telefono" placeholder="Teléfono"/> 
    
    <!--Botón submit-->
    <p><input type="submit" name="send" value="Enviar"/></p>
</form>

<!--Pulsado el botón submit, aparece la lista abajo de los contacto que se van agregando-->
<h2>Listado de contactos</h2>

<?php
//En el array SESSION se guardan los contactos. Los recorremos para mostrarlos.
foreach ($_SESSION['agenda'] as $key => $value) {
    echo $value['nombre'].' '.$value['telefono'].'<br>';
}
?>
</body>
</html>