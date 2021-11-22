<?php
//http://192.168.10.10/clase/exceptions/excepExercise2/index.php
//Cargamos el archivo
$divisor = 0;
$n = 100;

try {
    echo $n%$divisor;
} catch (Error $e) {
    echo $e->getMessage();
    die();
}