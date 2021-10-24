<?php

/** 
 *Unidad 3. Actividades Formularios.
 *Ejercicio 2. 
 *Formulario para crear un currículum que incluya: 
 *Campos de texto, grupo de botones de opción, casilla de verificación, lista de selección única, 
 *lista de selección múltiple, botón de validación, botón de imagen, botón de reset, etc.
 *@author: Virginia Ordoño Bernier
 *@date: octubre 2021
 *http://192.168.10.10/ud3/ud3_act_form/ej2/index.php
 */

//Variables para inputs de texto
$name = $email = $workExperience = $education = "";

//Variables para mensaje de error en inputs de texto
$nameErr = $emailErr = $workExperienceErr = $educationErr = "";

//Botón verificación. Checkbox
$a_languages = array('Español', 'Inglés', 'Francés', 'Italiano', 'Otros');
$a_selectedLanguages = [];

//Lista de selección múltiple
$a_employmentSituation = array('Trabajador', 'Desempleado', 'Estudiante', 'Autónomo');
$a_selectedEmploymentSituation = [];

//Botones de opción: lista única
$a_city = array(
    array(
        "value" => 1,
        "literal" => "Jaén"
    ),
    array(
        "value" => 2,
        "literal" => "Córdoba"
    ),
    array(
        "value" => 3,
        "literal" => "Sevilla"
    ),
    array(
        "value" => 4,
        "literal" => "Huelva"
    ),
    array(
        "value" => 5,
        "literal" => "Cádiz"
    ),
    array(
        "value" => 6,
        "literal" => "Málaga"
    ),
    array(
        "value" => 7,
        "literal" => "Granada"
    ),
    array(
        "value" => 8,
        "literal" => "Almería"
    )
);
$a_selectedCity = [];


//VALIDACIÓN DE DATOS

//Flag que pasará a true cuando los datos se puedan procesar.
$f_processForm = false;
//Flag que pasará a true mientras los datos no sean correctos.
$f_error = false;

/**
 * Función que limpia los datos introducidos
 */
function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Se comprueban todos los datos introducidos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_processForm = true;
    
    //Validación nombre
    if (empty($_POST['name'])) {
        $nameErr = "El nombre es obligatorio";
        $f_error = true;
    } else {
        $name = clearData($_POST['name']);
    }

    //Validación idiomas
    if (isset($_POST['languages'])) {
        $a_selectedLanguages = $_POST['languages'];
    }

    //Validación estado laboral
    if (isset($_POST['employmentSituation'])) {
        $a_selectedEmploymentSituation = $_POST['employmentSituation'];
    }

    //Validación provincias
    if (isset($_POST['city'])) {
        $a_selectedCity = $_POST['city'];
    }

};
if ($f_error) {
    $f_processForm = false;
}

;

?>

<!--HTML inicial y con datos procesados-->
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
    <h1>Formulario CV</h1>
    <p><span class="error">* Campos requeridos...</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        
    Nombre <input type="text" name="name" value="<?php echo $name; ?>">
    <span class="error">*<?php echo $nameErr; ?></span><br /><br />

    Idiomas <br/>
        <?php
        foreach ($a_languages as $value) {
            $selected = (in_array($value, $a_selectedLanguages)) ? 'checked' : '';
            echo "<input type =\"checkbox\" name=\"languages[]\" value = \"" . $value . "\" $selected >" . $value;
        }
        ?>
        <br/><br/>

    Estado laboral (múltiple):<br/><br/>
    <select multiple name="employmentSituation[]">
        <?php
        foreach ($a_employmentSituation as $value) {
            $selected = (in_array($value, $a_selectedEmploymentSituation)) ? 'selected' : '';
            echo "<option value = \"" . $value . "\" $selected >" . $value . "</option>";
        }
        ?>
    </select><br/><br/>

    Selecciona tu provincia:
        <select name="city">
            <?php
            foreach ($a_city as $value) {
                $selected = ($a_selectedCity == $value['value']) ? 'selected' : '';
                echo "<option value = \"" . $value['value'] . "\" $selected >" . $value['literal'] . "</option>";
            }
            ?>
        </select><br/><br/>
  
        </select><br /><br />
        <input type="submit" name="submit" value="Submit"><br /><br />
    </form>
<?php
} // Procesa Formulario
else {
    echo "<h1>Your Input:</h1>";
    echo $name;
    echo "<br/>";
   
    //Salida de botón verificación - checkbox   
    foreach ($a_selectedLanguages as $element) {
        echo $element . "<br/>";
    }

    //Salida de la lista de selección múltiple.
    foreach ($a_selectedEmploymentSituation as $element) {
        echo $element . "<br/>";
    }

    //Salida de la provincia

        foreach ($a_city[$a_selectedCity-1] as $key => $value) {
            if ($key == "literal") {
                echo($value . "<br>");
            }
        }
    echo "<br/>";

}
?>
</body>
</html>


