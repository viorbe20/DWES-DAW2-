<?php
/*
http://192.168.10.10/clase/sessions/contactList/index.php
Formulario que pide nombre y teléfono.
Una vez introducidos se da al botón enviar para visualizar la lista de contectos
en la parte inferior de la pantalla.
Da la opción de cerrar sesión y de enviar un correo a uno de los contactos.
*/

//Iniciamos sesión
session_start();

//Si la variable SESSION no se ha generado, le asignamos un array vacío
if (!isset($_SESSION['agenda'])) {
    $_SESSION['agenda'] = array();
}

//Si se ha pulsado el botón enviar, asignamos a la variable agenda el nombre y el teléfono introducidos
//Es un array asociativo con nombre y valor
if (isset($_POST['alta'])) {
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

<!--Creamos ambos enlaces para enviar correo y cerrar sesión-->
<a href="sendEmail.php">Enviar correo</a>
<a href="closeSession.php">Cerrar sesión</a>

<form action="" method="post">
    <p>Nombre:</p>
    <input type="text" name="nombre" placeholder="Nombre"/> 
    
    <p>Teléfono:</p>
    <input type="text" name="telefono" placeholder="Teléfono"/> 
    
    <!--Botón submit-->
    <p><input type="submit" name="alta" value="Enviar"></p>
</form>

<!--Lista que se va a mostrar con los contactos-->
<h2>Listado de contactos</h2>
<?php
//Recorremos el array SESSION[agenda] donde se han ido guardando los contactos
foreach ($_SESSION['agenda'] as $key => $value) {
    echo $value['nombre'].''.$value['telefono'].'<br>';
}
?>

</body>
</html>