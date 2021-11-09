<?php
//AL prinicio da un fallo porque al crearla la cookie no exite. 
//Necesitamos recargarla para que se cree

//Detectamos si la cookie está creada con isset
if(isset($_COOKIE['contador'])){
    //Si existe, establecemos un valor más
    setcookie('contador', $_COOKIE['contador']+1, time()+36000);
}else{
//Si no existe la creamos
setcookie('contador', 1, time()+36000);
}
echo $_COOKIE['contador'];
