<?php
/*
http://192.168.10.10/clase/sessions/sesion2_enviarEmail.php
Formulario que pide nombre y teléfono.
Una vez introducidos se da al botón enviar para visualizar la lista de contectos
en la parte inferior de la pantalla.
*/

//Recogemos ip de la sesión ya iniciada
session_start();

//Si no SESSION[agenda] no está establecida, mandamos al usuario a la página de inicio
if (!isset($_SESSION['agenda'])) {
    header('Location:index.php');
}

?>

<!--VISTA-->
<html lang="es">
<head>
    <meta charset="utf-8">
</head>

<body>
<h1>Agenda de Contactos</h1>

<!--Incluimos dos enlaces: enviar correo y cerrar sesión-->
<a href="index.php">Inicio</a>
<a href="closeSession.php">Cerrar sesión</a>

<h2>Seleccionar destinatarios</h2>
<?php
//Propuesta: sustituis por un chackbox de selección de destinatarios
foreach ($_SESSION['agenda'] as $key => $value) {
    echo $value['nombre'].' '.$value['telefono'].'<br>';
}
?>
</body>
</html>