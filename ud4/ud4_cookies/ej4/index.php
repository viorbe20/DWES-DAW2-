<?php
/**
 * Ud4. Ejercicio 4.
 * Incluir en vuestro servidor un contador que indique al usuario el número de veces que ha visitado el sitio.
 * Al prinicio da un fallo porque al crearla la cookie no existe. 
 * Necesitamos recargarla para que se cree
 * http://192.168.10.10/ud4/ud4_cookies/ej4/index.php
 */


//Detectamos si la cookie está creada con isset
if(isset($_COOKIE['contador'])){
    //nombre, valor, tiemo expiración
    //Si existe, establecemos un valor más
    setcookie('contador', $_COOKIE['contador']+1, time()+36000);
}else{
//Si no existe la creamos
setcookie('contador', 1, time()+36000);
}
//echo $_COOKIE['contador'];
?>

<!--VISTA-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='Author' content='Virginia Ordoño'>
    <title>Contador de </title>
</head>
<body>
    <h2>Veces que te has conectado</h2>
    <h1><?php echo $_COOKIE['contador']?></h1>
</body>
</html>

