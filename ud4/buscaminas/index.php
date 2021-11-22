<?php
echo ('<a href="closeSession.php">Salir</a> <br>');

DEFINE("TABLEROLENGTH", 10);

session_start();
if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array ();
    $_SESSION['visible'] = array ();
    crearTablero();
}


/**
 * Crear dos tableros: el interno y el jugable
 */
function crearTablero(){
    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        for ($j=0; $j < TABLEROLENGTH; $j++) { 
            $_SESSION['tablero'][$i][$j] = 0;
        }
    }

    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        for ($j=0; $j < TABLEROLENGTH; $j++) { 
            $_SESSION['visible'][$i][$j] = 0;
        }
    }
    addMines();
    
};

function mostrarTablero(){
    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        echo('<br>');
        for ($j=0; $j < TABLEROLENGTH; $j++) {
            echo $_SESSION['tablero'][$i][$j];
        }
    }
};

/**
 * Tablero inicialmente lleno de 0.
 */
function mostrarTableroVisible(){    
    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        echo('<br>');
        for ($j=0; $j < TABLEROLENGTH; $j++) {
            echo $_SESSION['visible'][$i][$j];
        }
    }
};

mostrarTablero();
echo('<br><br>');
mostrarTableroVisible();

//Creación aleatoria de números para colocar las minas
$rowNumber;
$columnNumber;
define('BOMBNUMBER', 10);


function addMines(){
    $cont = 10;
    do {
        $rowNumber = rand(0,9);
        $columnNumber = rand(0,9);
        
        //SI no está, vuelve al bucle
        if ($_SESSION['tablero'][$rowNumber][$columnNumber] !=9) {
            $_SESSION['tablero'][$rowNumber][$columnNumber] = 9;
            
            //Incrementamos en 1 todas las casillas que haya alrededor de la bomba
            for ($y = max(($rowNumber-1), 0); $y <= min(($rowNumber+1), TABLEROLENGTH-1) ; $y++) { 
                //Igual con las columnas
                for ($x= max(($columnNumber-1), 0); $x <= min(($columnNumber+1), TABLEROLENGTH-1); $x++) { 
                    if ($_SESSION['tablero'][$y][$x] !=9) {
                        $_SESSION['tablero'][$y][$x]++;
                    }
                }
            }
            
            $cont--;
        }
    } while ($cont > 0);
};





function winner(){

    //Contamos casillas destapadas
    $cont = 0;

    //Recorremos para ver las que están destapadas
    for ($i=0; $i < TABLEROLENGTH; $i++) { 
        for ($j=0; $j < TABLEROLENGTH; $j++) { 
            if ($_SESSION['visible'][$i][$j]==1) {
                $cont++;
            }
        }
    }

    //Gana si todas las casillas menos las minas es igual a las casillas visibles (en este caso el contador)
    if (((TABLEROLENGTH*TABLEROLENGTH) - (BOMBNUMBER)) == $cont) {
        header('Location: winner.php');
    }
};
echo('<br>');
?>

