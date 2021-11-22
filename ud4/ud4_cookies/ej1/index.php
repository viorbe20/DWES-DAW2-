<?php
/**
 * @author Virginia Ordoño Bernier
 * @since November 2021st
 * //http://192.168.10.10/ud4/ud4_cookies/ej1/index.php
 * 
 * Enunciado
 * ----------
 * Escriba una página que permita crear una cookie de duración limitada, 
 * comprobar el estado de la cookie y destruirla.
 * Al principio da error de carga porque no está creada.
 * 
 **/

 //Creamos cookie (nombre, valor, tiempo expiración)
setcookie('user', 'Virginia Ordoño', time()+3600);

//Comprobamos si existe o no, y mostramos o no con mensaje. Para mostrar todas print_r($_COOKIE);
if (isset($_COOKIE['user'])) { 
    echo $_COOKIE['user'] . ' - La cookie se ha creado correctamente'; 
} else { echo ' Error de cookie'; }

//Eliminamos cookie. Para ello se crea otra cookie con un tiempo de expiración anterior.
//setcookie('user', '', time()-3600); 
?>