<?php
//http://192.168.10.10/clase/exceptions/excepExercise3/index.php
//Cargamos el archivo
$divisor = 0;
$n = 100;

try {
    echo $n%$divisor;
} catch (ArithmeticError $e) {
    echo $e->getMessage();
    die();
}
?>
