<?php
//Abrir fichero
$file = fopen("poema.txt", "r") or exit ("Unable to open file");
//Lee mientras no hayamos llegado al final del fichero
while (!feof($file)) {
    //Nos devuelve la cadena (una línea)
    echo fgets($file)."<br>";
}
//Cerramos fichero
fclose($file);
?>
