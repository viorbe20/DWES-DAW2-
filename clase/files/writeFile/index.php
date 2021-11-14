<?php
//Cargamos el archivo
$filename = 'output.txt';

//Siexiste
if (file_exists($filename))   {
    $count = file('output.txt');
    //Como el fichero existe lo cuento (es 1)
    $count[0] ++;
    $fp = fopen("output.txt", "w");
    fputs ($fp, "$count[0]");
    fclose ($fp);
    echo $count[0];
}
else {
    //Si no existe el fichero, lo creo
    $fh = fopen("output.txt", "w");
    if($fh==false) die("unable to create file");
    fputs ($fh, 1);
    fclose ($fh);
    $count = file('output.txt');
    echo $count[0];
}
?>
