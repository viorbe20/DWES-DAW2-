<?php
/**
 * Unidad 3. Actividades de clase.
 * Ejercicio 5. Realiza un test de verbos irregulares en inglés 
 * teniendo el cuenta la dificultad y el número de verbos que aparecerán.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 * http://192.168.10.10/ud3/ud3_act_form/ej5/
 */

 //Estilo
 echo <<<EOD
 <style type='text/css'>
 </style>
 EOD;

 //Enunciado
 echo <<<EOD
 <h1>Test Verbos Irregulares en Inglés</h1>
 EOD;

// //Archivo que contiene array con los verbos irregulares
require __DIR__ . "/php/getIrregularVerbs.php";

$difficultyLevel = 2;
$verbsAmountInput = 6;
$a_indexes = array();


 /**
  * Función que genera y muestra 20 números para que el usuario elija cantidad de verbos
  */
function randomNumbers() {
   echo ("<label for='verbsSelection'>Elige la cantidad de verbos </label>");
   echo ("<select name='verbsSelection' id='verbsSelection'>");
   
   //Generamos el número máximo de verbos que se pueden mostrar
   for ($i = 1; $i <= 20; $i++) {
      echo ("<option value='numberSelected'" . $i . "'>" . $i . "</option>");
   }
   echo ("</select><br>");
};

 /**
  * Función que muestra el nivel de dificulta del test
  */
  function difficultyLevel() {
   echo('<br>');
   echo ("<label for='level'>Elige el nivel según dificultad </label>");
   echo ("<select name='level' id='level'>");
   
   //Mostramos niveles de dificultad
      echo ("<option value='level1'>1. Completar un hueco</option>");
      echo ("<option value='level2'>2. Completar dos huecos</option>");
      echo ("<option value='level3'>3. Completar tres huecos</option>");
      echo ("<option value='level4'>4. Completar todos los huecos</option>");
      echo ("</select><br>");
};

// /**
//  * Función que envía el formulario inicial
//  */
// function submitSelection(){
//    echo("<br><input type='submit' value='Enviar' id='submit'>");
// };

// /**
//  * Función que invoca las funciones necesarias para mostrar el primer formulario por pantalla
//  */
// function showFirstForm(){
//    randomNumbers();
//    difficultyLevel();
//    submitSelection();
// };

// //Salida por pantalla
// showFirstForm();



/**
 * Genera números aleatorios entre 0 y el número máximo de verbos de la lista.
 * Genera tantos números como cantidad de verbos que quiera completar el usuario.
 * Devuelve esos números en un array.
 */
function createRandomNumbersArray($verbsAmountInput){
   $a_randomNumbers = array();
   $cont = 0;
   do {
      $randomNumber = rand(0, count(getIrregularVerbs())-1);

      if (in_array($randomNumber, $a_randomNumbers)==false) {
         array_push($a_randomNumbers, $randomNumber);
         $cont++;
      } 

   } while ($cont < $verbsAmountInput );
   return $a_randomNumbers;
};


/**
 * Genera números aleatorios entre 0 y 3 sin repetir y los introduce en un arrays.
 * Genera la cantidad indicada por el usuario (1 a 4) y devuelve esos arrays.
 * @param {num} Nivel de dificultad y por tanto huecos que van a aparecer en cada verbo. 
 */
function createVerbsGasps($difficultyLevel){
   
   $cont = $difficultyLevel;
   $a_gasps = array();
   
   do {
      $randomNumber = rand(0, 3);
      if (in_array($randomNumber, $a_gasps)==false) {
         array_push($a_gasps, $randomNumber);
         $cont--;
      } 
      
   } while ($cont > 0);
   return $a_gasps;

};

/**
 * Función que completa el array de índices.
 */
function fillIndexArray($verbsAmountInput, $difficultyLevel){
   //Array que le asignamos la función que genera array con números aleatorios.
   $a_randomNumbers = createRandomNumbersArray($verbsAmountInput);

   for ($i=0; $i < count($a_randomNumbers); $i++) {
      $indexNumber = $a_randomNumbers[$i];
   $a_indexes[$indexNumber] = createVerbsGasps($difficultyLevel);
   }
   return $a_indexes;
};

echo(var_dump(fillIndexArray($verbsAmountInput, $difficultyLevel)));
?>