<?php
echo ('<a href="closeSession.php">Salir</a> <br>');

session_start();
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array ();
}

DEFINE("BOARDLENGTH", 10);

function crearboard(){
    for ($i=0; $i < BOARDLENGTH; $i++) { 
        for ($j=0; $j < BOARDLENGTH; $j++) { 
            $_SESSION['board'][$i][$j] = 0;
        }
    }
    
};

function showBoard(){
    for ($i=0; $i < BOARDLENGTH; $i++) { 
        echo('<br>');
        for ($j=0; $j < BOARDLENGTH; $j++) {
            echo $_SESSION['board'][$i][$j] = 0;
        }
    }
    
};

showBoard();

//Creación aleatoria de números para colocar las minas
$rowNumber;
$columnNumber;
define('BOMBNUMBER', 10);
$cont = BOMBNUMBER;

do {
    $rowNumber = rand(0,9);
    $columnNumber = rand(0,9);
    
    //SI no está, vuelve al bucle
    if ($_SESSION['board'][$rowNumber][$columnNumber] == !9) {
        $_SESSION['board'][$rowNumber][$columnNumber] = 9;
        $cont--;
    }
} while ($cont > 0);


/**
 * Muestra tablero con bombas
 */
function showBoardBombas(){
    for ($i=0; $i < BOARDLENGTH; $i++) { 
        echo('<br>');
        for ($j=0; $j < BOARDLENGTH; $j++) {
            echo $_SESSION['board'][$i][$j];
        }
    }
    
};
echo('<br>');

/**
 * Se activa tras hacer clic en una casilla
 * Se pulsa sobre un enlace, se envía por la url la fila y la columna y
 * se hace una llamada recursvia para ir destapando casillas
 * 
 */
function clicCell($row, $column){
//Si la casilla está tapada, la destapamos
if ($_SESSION['visible'][$row][$column]==0) {
    $_SESSION['visible'][$row][$column]==1;
    //Comprobamos mina. break recursivodad
    if ($_SESSION['visible'][$row][$column]==9) {
        return 0;
    }
} else {
    //Comprobamos ganador
    if (checkWinner()) {
        //Destapadas todas las casillas. Break recursividad
        return 1;
    } else {
        //Si no hay minas cercanas
        if ($_SESSION['board'][$row][$column]==0) {
            //Recorre las casillas cercana y las ejecuta
            for ($i=0; $i < ; $i++) { 
                # code...
            }
        }
    }
}
};


showBoardBombas();


?>

