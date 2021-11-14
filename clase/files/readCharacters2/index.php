<?php
//Abrir fichero
$file = fopen("poema.txt", "r") or exit ("Unable to open file");
//Lee mientras no hayamos llegado al final del fichero
while (!feof($file)) {
    //Para meter el salto de línea
    $caracter = fgetc($file);
    //Echo da error con el ternario
    $caracter == "\n" ? print ("</br>") : print ($caracter);
}
//Cerramos fichero
fclose($file);
?>
