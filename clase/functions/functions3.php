<?php
/**
 * Función anónima
 * @author Virginia Ordoño Bernier
 */

$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

$squareNum = array_map (function ($num) {
return $num*$num;
},$numbers);

echo($squareNum);
?>