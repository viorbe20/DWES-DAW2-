<?php
/**
 * Unidad 3. Actividades de clase.
 * Ejercicio 5. Realiza un test de verbos irregulares en inglés 
 * teniendo el cuenta la dificultad y el número de verbos que aparecerán.
 * @author: Virginia Ordoño Bernier
 * @date: October 2021st
 * http://192.168.10.10/ud3/ud3_act_form/ej5/
 */

// //Archivo que contiene array con los verbos irregulares
require __DIR__ . "/php/getIrregularVerbs.php";

$a_indexes = array();

$a_selectedGaspsAmount;
$a_selectedVerbsAmount;

/**
 * Genera números aleatorios entre 0 y el número máximo de verbos de la lista.
 * Genera tantos números como cantidad de verbos que quiera completar el usuario.
 * Devuelve esos números en un array.
 */
function createRandomNumbersArray($a_selectedVerbsAmount){
   $a_randomNumbers = array();
   $cont = 0;
   do {
      $randomNumber = rand(0, count(getIrregularVerbs())-1);

      if (in_array($randomNumber, $a_randomNumbers)==false) {
         array_push($a_randomNumbers, $randomNumber);
         $cont++;
      } 

   } while ($cont < $a_selectedVerbsAmount );
   return $a_randomNumbers;
};

/**
 * Genera números aleatorios entre 0 y 3 sin repetir y los introduce en un arrays.
 * Genera la cantidad indicada por el usuario (1 a 4) y devuelve esos arrays.
 * @param {num} Nivel de dificultad y por tanto huecos que van a aparecer en cada verbo. 
 */
function createVerbsGasps($a_selectedGaspsAmount){
   
   $cont = $a_selectedGaspsAmount;
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
function fillIndexArray($a_selectedVerbsAmount, $a_selectedGaspsAmount){
   //Array que le asignamos la función que genera array con números aleatorios.
   $a_randomNumbers = createRandomNumbersArray($a_selectedVerbsAmount);

   for ($i=0; $i < count($a_randomNumbers); $i++) {
      $indexNumber = $a_randomNumbers[$i];
   $a_indexes[$indexNumber] = createVerbsGasps($a_selectedGaspsAmount);
   }
   return $a_indexes;
};

//echo(var_dump(fillIndexArray($a_selectedVerbsAmount, $a_selectedGaspsAmount)));


// function showVerbsTable($a_randomNumbers){
// //Cargamos la lista original de verbos
// $a_verbsList = getIrregularVerbs();
// //Lo recorremos para que nos devuelva la key
// foreach ($a_verbsList as $key => $value) {
//    //Si la key está en nuestro array de números random, lo guarda en el array de índices y lo imprime
//    if (in_array($key, $a_randomNumbers)) {
//       //echo($key);
//       //echo(var_dump($value));
//       for ($i=0; $i < count($value); $i++) { 
//          echo($value[$i]);
//       }
//    }
   
// }
// };

//VALIDACIÓN DE DATOS
//Arrays vacíos donde luego se guardarán las opciones elegidas por el usuario
$a_selectedVerbsAmount = [];
$a_selectedGaspsAmount = [];
$f_processForm = false;
$f_error = false;



//Se comprueban todos los datos introducidos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $f_processForm = true;

   if (isset($_POST['verbsAmount'])) {
   $a_selectedVerbsAmount = $_POST['verbsAmount'];
}

if (isset($_POST['level'])) {
   $a_selectedGaspsAmount = $_POST['level'];
}
};

if ($f_error) {
   $f_processForm = false;
}

//////////////////////HTML
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <style>
        .error {
            color: "red";
        }
    </style>
</head>

<body>

<?php
if (!$f_processForm) { ?>  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Test Verbos Irregulares en Inglés</h1> 
<br>

<label for='level'>Elige el nivel según dificultad </label>
<select name='level' id='level'>
<option value='1'>1. Completar un hueco</option>
<option value='2'>2. Completar dos huecos</option>
<option value='3'>3. Completar tres huecos</option>
<option value='4'>4. Completar todos los huecos</option>
</select><br><br>

<label for='verbsAmount'>Elige la cantidad de verbos </label>
<select name='verbsAmount' id='verbsAmount'>;
<?php
   for ($i = 1; $i <= 20; $i++) {
      echo ("<option value='$i'" . $i . "'>" . $i . "</option>");
   }
   echo ("</select><br>");?>

<br>
<input type='submit' value='Enviar' id='submit'>

   </form>
<?php
} // Muestra verbos
else {

   //Imprime array de índices
   echo(var_dump(fillIndexArray($a_selectedVerbsAmount, $a_selectedGaspsAmount)));

}
?>
</body>
</html>