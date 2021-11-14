<?php
//Abrir fichero
$file = fopen("poema.txt", "r") or exit ("Unable to open file");

//version jesús
//Creamos buffer donde metemos los bites leidos
//según el tamaño del fichero
$buffer = fread($file, filesize("poema.txt"));
$buffer = str_replace("\n","</br>", $buffer);
//Cerramos fichero
echo $buffer;

fclose($file);
?>
