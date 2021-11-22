<?php
//http://192.168.10.10/clase/exceptions/excepExercise1/index.php
//Cargamos el archivo
$filename = 'poema.txt';

try {
    if(!file_exists($filename)){
    throw new Exception("Fichero no encontrado.");
    }

} catch (Exception $e) {
    echo $e->getMessage();
    die();//die() no es lo habitual. Mejor redireccionar
}
?>
