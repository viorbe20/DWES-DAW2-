<?php
/**
 * Unidad 3. Actividades de clase.
 * Ejercicio 5. Realiza un test de verbos irregulares en inglés 
 * teniendo el cuenta la dificultad y el número de verbos que aparecerán.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 * http://192.168.10.10/ud3/ud3_act_clase/ej5/index.php
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


 //Array que contiene los verbos
 $irregularVerbs = array (
   array(
      "infinitive" => "Arise",
      "simplePast" => "Arose",
      "pastParticiple" => "Arisen",
      "spanish" => "Surgir",
      "audio"=> "arise.mp3"
   ),
     array(
        "infinitive" => "Awake",
        "simplePast" => "Awoke",
        "pastParticiple" => "Awoken",
        "spanish" => "Despertarse",
        "audio"=> "awake.mp3"
     ),
     array(
        "infinitive" => "Be",
        "simplePast" => "Were",
        "pastParticiple" => "Been",
        "spanish" => "Ser",
        "audio"=> "be.mp3",
     ),
     array(
      "infinitive" => "Bear",
      "simplePast" => "Bore",
      "pastParticiple" => "Born",
      "spanish" => "Soportar",
      "audio"=> "bear.mp3",
   ),
   array(
      "infinitive" => "Beat",
      "simplePast" => "Beat",
      "pastParticiple" => "Beaten",
      "spanish" => "Golpear",
      "audio"=> "Beat.mp3",
   ),
   array(
      "infinitive" => "Become",
      "simplePast" => "Became",
      "pastParticiple" => "Become",
      "spanish" => "Llegar a ser",
      "audio"=> "become.mp3",
   ),
   array(
      "infinitive" => "Begin",
      "simplePast" => "Began",
      "pastParticiple" => "Begun",
      "spanish" => "Empezar",
      "audio"=> "begin.mp3",
   ),
   array(
      "infinitive" => "Bend",
      "simplePast" => "Bent",
      "pastParticiple" => "Bent",
      "spanish" => "Doblar",
      "audio"=> "bend.mp3",
   ),
   array(
      "infinitive" => "Bet",
      "simplePast" => "Bet",
      "pastParticiple" => "Bet",
      "spanish" => "Apostar",
      "audio"=> "bet.mp3",
   ),
   array(
      "infinitive" => "Bind",
      "simplePast" => "Bound",
      "pastParticiple" => "Bound",
      "spanish" => "Atajar",
      "audio"=> "bind.mp3",
   ),
   array(
      "infinitive" => "Bid",
      "simplePast" => "Bid",
      "pastParticiple" => "Bid",
      "spanish" => "Pujar",
      "audio"=> "bid.mp3",
   ),
   array(
      "infinitive" => "Bite",
      "simplePast" => "Bit",
      "pastParticiple" => "Bitten",
      "spanish" => "Morder",
      "audio"=> "bite.mp3",
   ),
    
 );

 
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

/**
 * Función que envía el formulario inicial
 */
function submitSelection(){
   echo("<br><input type='submit' value='Enviar' id='submitButton'>");
};

/**
 * Función que invoca las funciones necesarias para mostrar el primer formulario por pantalla
 */
function showFirstForm(){
   randomNumbers();
   difficultyLevel();
   submitSelection();
};

//Salida por pantalla
showFirstForm();



?>