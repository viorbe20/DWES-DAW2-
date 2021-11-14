<?php
//Abrir fichero
$file = fopen("poema.txt", "r") or exit ("Unable to open file");
//Lee mientras no hayamos llegado al final del fichero
while (!feof($file)) {
    //Para meter el salto de línea (con código asci)
    $caracter = fgetc($file);
    if ($caracter == ord(10)) {
        echo "</br>";
    } else {
        echo $caracter;
    }
}
//Cerramos fichero
fclose($file);
?>
