<?php
/**
 * Unidad 3. Act 3.
 * Ejercicio 1. Indexación de los ejercicios mediante un array. 
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 * http://192.168.10.10/indexExercises/indexExercises.php
 */

//Estilo
echo <<<EOD
<link href="indexExercises.css" type="text/css" rel="stylesheet">
EOD;

//Array de ejercicios
$exercisesDWES = array(
    
    $unit2 = array(
        "unitDescription" => "Ud2 / Scripts.",
        "exercises" => array (
            array(
                "exerciseNumber" => "Ejercicio 1",
                "exerciseDescription" => "Script que muestre el mensaje Hola Mundo entrecomillado.",
                "url" => "../../ud2/ej1/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 2",
                "exerciseDescription" => "Ficha personal con los datos cargados en variables. El resultado debe mostrar una foto personal.",
                "url" => "../../ud2/ej2/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 3",
                "exerciseDescription" => "Área del círculo y la longitud de la circunferencia.",
                "url" => "../../ud2/ej3/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 4",
                "exerciseDescription" => "¿Cuál es la salida del siguiente script?",
                "url" => "../../ud2/ej4/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 5",
                "exerciseDescription" => "Resultado de la suma de dos números almacenados",
                "url" => "../../ud2/ej5/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 6",
                "exerciseDescription" => "Script que cargue las siguientes variables.",
                "url" => "../../ud2/ej6/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 7",
                "exerciseDescription" => "Escribir un script que declare una variable y muestre la siguiente información.",
                "url" => "../../ud2/ej7/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 8",
                "exerciseDescription" => "Conocer el contenido de una variable.",
                "url" => "../../ud2/ej8/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 9",
                "exerciseDescription" => "Obtene resultados con variables.",
                "url" => "../../ud2/ej9/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 10",
                "exerciseDescription" => "Ejemplo de heredoc",
                "url" => "../../ud2/ej10/index.php"
            )

        ),
    ),
    $unit3_act1 = array(
        "unitDescription" => "Ud3_act1 / Estructuras de Control.",
        "exercises" => array (
            array(
                "exerciseNumber" => "Ejercicio 1",
                "exerciseDescription" => "Almacena tres números en variables y escribirlos en pantalla de manera ordenada.",
                "url" => "../../ud3/ud3_act1/ej1/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 2",
                "exerciseDescription" => "Carga en variables mes y año e indica el número de días del mes.",
                "url" => "../../ud3/ud3_act1/ej2/index.php"
            ),    
            array(
                "exerciseNumber" => "Ejercicio 3",
                "exerciseDescription" => "Carga fecha de nacimiento en variables y calcula la edad.",
                "url" => "../../ud3/ud3_act1/ej3/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 4",
                "exerciseDescription" => "Modifica la página inicial realizada, incluyendo una imagen de cabecera 
                en función de la estación del año en la que nos encontremos y un color de fondo en función de la hora del día.",
                "url" => "../../ud3/ud3_act1/ej4/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 5",
                "exerciseDescription" => "Script que muestre una lista de enlaces en función del perfil de usuario.",
                "url" => "../../ud3/ud3_act1/ej5/index.php"
            )
        ),
    ),
    $unit3_act2 = array(
        "unitDescription" => "Ud3_act2 / Tablas y números.",
        "exercises" => array (
            array(
                "exerciseNumber" => "Ejercicio 1",
                "exerciseDescription" => "Escribir los números 1 al 10.",
                "url" => "../../ud3/ud3_act2/ej1/index.php"
            ),
            array(
                "exerciseNumber" => "Ejercicio 2",
                "exerciseDescription" => "Sumar los 3 primeros números pares.",
                "url" => "../../ud3/ud3_act2/ej2/index.php"
            ), 
            array(
                "exerciseNumber" => "Ejercicio 3",
                "exerciseDescription" => "Tablas de multiplicar del 1 al 10.",
                "url" => "../../ud3/ud3_act2/ej3/index.php"
            ), 
            array(
                "exerciseNumber" => "Ejercicio 4",
                "exerciseDescription" => "Mostrar paleta de colores.",
                "url" => "../../ud3/ud3_act2/ej4/index.php"
            ), 
            array(
                "exerciseNumber" => "Ejercicio 5",
                "exerciseDescription" => "Calendario mensual I.",
                "url" => "../../ud3/ud3_act2/ej5/index.php"
            )   
        ),
    ),
    $unit3_act3 = array(
        "unitDescription" => "Ud3_act3 / Arrays.",
        "exercises" => array (
            array(
                "exerciseNumber" => "Ejercicio 1",
                "exerciseDescription" => "Indexación de los ejercicios mediante un array.",
                "url" => "../../ud3/ud3_act3/ej1/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 2",
                "exerciseDescription" => "Crear un array con los alumnos de clase y permitir la selección aleatoria de uno de ellos.",
                "url" => "../../ud3/ud3_act3/ej2/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 3",
                "exerciseDescription" => "Array multidimensional con diferentes datos.",
                "url" => "../../ud3/ud3_act3/ej3/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 4",
                "exerciseDescription" => "Menú de restaurante aleatorio.",
                "url" => "../../ud3/ud3_act3/ej4/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 5",
                "exerciseDescription" => "Calendario mensual(II).",
                "url" => "../../ud3/ud3_act3/ej5/index.php"
            )
        ),
      
    ),
    $unit3_act_comp = array(
        "unitDescription" => "Ud3_act_comp / Generar números.",
        "exercises" => array (
            array(
                "exerciseNumber" => "Ejercicio 1",
                "exerciseDescription" => "20 números aleatorios",
                "url" => "../../../ud3/ud3_act_comp/ej1/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 2",
                "exerciseDescription" => "Número aleatorio de 4 cifras con colores.",
                "url" => "../../../ud3/ud3_act_comp/ej2/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 3",
                "exerciseDescription" => "Números aleatorios fecha nacimiento.",
                "url" => "../../../ud3/ud3_act_comp/ej3/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 4",
                "exerciseDescription" => "Muestra un número por cifras.",
                "url" => "../../../ud3/ud3_act_comp/ej4/index.php"
            )
        ),
      
    ),
    $unit3_act_form = array(
        "unitDescription" => "Ud3_act_form / Formularios",
        "exercises" => array (
            array(
                "exerciseNumber" => "Ejercicio 1",
                "exerciseDescription" => "Calendario III",
                "url" => "../../../ud3/ud3_act_form/ej1/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 2",
                "exerciseDescription" => "Formulario CV.",
                "url" => "../../../ud3/ud3_act_form/ej2/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 3",
                "exerciseDescription" => "Formulario países.",
                "url" => "../../../ud3/ud3_act_form/ej3/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 4",
                "exerciseDescription" => "Formulario suma números.",
                "url" => "../../../ud3/ud3_act_form/ej4/index.php"
            ),
            array (
                "exerciseNumber" => "Ejercicio 5",
                "exerciseDescription" => "Formulario verbos irregulares.",
                "url" => "../../../ud3/ud3_act_form/ej5/index.php"
            )
        ),
      
    ),
);

/**
 * Función que muestra el Header
 */
function showHeader()
{
    echo <<<EOD
    <div class="header">
    <h2 class="header__title">Ejercicios DWES</h2>
    </div>
    EOD;
    
};

/**
 * Función que muestra las unidades
 */
function showUnit($array)
{
    echo <<<EOD
    <div class="unit">
    <h2 class="unit__title">$array<br></h2>
    </div>
    EOD;
    
};

/**
 * Función que muestra el índice
 * @param array
 */
function showIndex($array){
    showHeader();
    
    $arrayLength = count($array);
    for ($i=0; $i < $arrayLength; $i++) {
        
        foreach ($array[$i] as $key => $arrayUnit) {
            
            if ($key == "unitDescription") {
                showUnit($arrayUnit);

            } else {
                echo("<div class='cards'>");
                foreach ($arrayUnit as $key => $arrayExercises) {
                    echo("<div class='card card-3'>");
                    echo("<label class='ejNumber'><h2 class='card__title'>" . $arrayExercises["exerciseNumber"] . "</h2></label>");
                    echo("<h2 class='card__title'>" . $arrayExercises["exerciseDescription"] . "</h2>");
                    echo("<p class='card__apply'>");
                    echo("<a class='card__link' href=\"". $arrayExercises["url"] ."\">Ir al ejercicio<i class='fas fa-arrow-right'></i></a></p></div> ");
                }
            }    echo("<div>");
        }
    }
};

//Salida por pantalla
echo(showIndex($exercisesDWES));