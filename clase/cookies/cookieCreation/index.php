<?php
//AL prinicio da un fallo porque al crearla la cookie no existe. 
//Necesitamos recargarla para que se cree
//http://192.168.10.10/clase/cookies/cookieCreation/index.php

//Detectamos si la cookie está creada con isset
if(isset($_COOKIE['contador'])){
    //Si existe, establecemos un valor más
    setcookie('contador', $_COOKIE['contador']+1, time()+36000);
}else{
//Si no existe la creamos
setcookie('contador', 1, time()+36000);
}
echo $_COOKIE['contador'];
