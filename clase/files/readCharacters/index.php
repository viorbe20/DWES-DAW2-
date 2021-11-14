<?php
//Abrir fichero
$file = fopen("poema.txt", "r") or exit ("Unable to open file");
//Lee mientras no hayamos llegado al final del fichero
while (!feof($file)) {
    //Nos devuelve carácter a carácter (una línea)
    echo fgetc($file);

    if (fgetc($file) == " ") {
        echo "</br>";
    }
}
//Cerramos fichero
fclose($file);
?>
