<?php
//Abrir fichero
$file = fopen("poema.txt", "r") or exit ("Unable to open file");

//version dani
//Creamos buffer donde metemos los bites leidos
//según el tamaño del fichero
$buffer = fread($file, filesize("poema.txt"));
$lista = explode("\n", $buffer);
foreach ($lista as $linea) {
    echo $linea."</br>";
}

fclose($file);
?>
