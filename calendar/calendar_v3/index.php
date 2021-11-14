<?php

/** 
 *Unidad 3. Actividades Formularios.
 *Ejercicio 1. 
 *1. Modifica el ejercicio del calendario para que el mes y el año se lean en un formulario. 
 *Añade las siguientes especificaciones:
 *a. Por defecto se carga el mes y año actual.
 *b. Definición de días festivos en un array.
 *c. Utilizar colores para diferenciar festivos nacionales, de comunidad y locales.
 *d. Cada día será un enlace a una página que mostrará la fecha seleccionda.
 *@author: Virginia Ordoño Bernier
 *@date: octubre 2021
 *http://192.168.10.10/calendar/calendar_v3/index.php
 */

//Iniciamos sesión
session_start();

//Archivo que contiene array de días festivos
include __DIR__ . "/php/getHolidays.php";

//Archivo que contiene array con los meses
include __DIR__ . "/php/getMonths.php";

//Archivo que dibuja el calendario
include __DIR__ . "/php/drawCalendar.php";

//Archivo que dibuja el calendario
include __DIR__ . "/php/showDays.php";

//Archivo que muestra el calendario
include __DIR__ . "/php/showCalendar.php";

//Archivo que muestra los días de Semana santa
include __DIR__ . "/php/getEasters.php";


///////////////////// DISEÑO CALENDARIO//////////////////////

//Fecha actual
$currentDay = date("j");
$currentMonthNumber = date("n");
$currentYear = date("Y");

//Array con los días de la semana
$a_daysNames = array("L", "M", "X", "J", "V", "S", "D");



///////////////////// GESTIÓN Y VALIDACIÓN DATOS//////////////////////

/**
 * Función que limpia los datos introducidos
 */
function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

$year = "";
$yearErr = "";
$selectedMonth = [];
//Array que contiene los meses
$a_months = getMonths();

$f_error = false;
$f_processForm = false;

//Cargamos con estos valores iniciales. Luego se les asignan los valores escogidos por el usuario
$GLOBALS['year'] = $currentYear;
$GLOBALS['month'] = $currentMonthNumber;

//Comprueba los datos introducidos por el usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_processForm = true;

    if (empty($_POST['year'])) {
        $yearErr = "El año es obligatorio";
        $f_error = true;
    } else {
        $year = clearData($_POST['year']);
        $GLOBALS['year'] = $year;
    }

    if (isset($_POST['combo'])) {
        $selectedMonth = $_POST['combo'];
        $GLOBALS['month'] = $selectedMonth[0];

    }
};

if ($f_error) {
    $f_processForm = false;
}


?>
<!--VISTAS-->
<!DOCTYPE HTML>
<html lang="es">
    
<head>
    <title>Calendario V3</title>
    <link rel='stylesheet' type='text/css' href="/calendar/calendar_v3/css/style.css"/>
</head>

<body>

    <?php
    //En caso que no se procesen los datos
    if (!$f_processForm) { ?>
        <h1>Calendario Mensual</h1>
        <p><span class="error">* Campos requeridos...</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <!--Enviamos los datos/////////////////////////////////////////////////////////-->
        

            Introduce un año <input type="number" name="year" value="<?php echo $year; ?>">
            <span class="error">*<?php echo $yearErr; ?></span><br /><br />

            Elige un mes:
            <select name="combo">
                <?php
                foreach ($a_months as $value) {
                    $selected = ($selectedMonth == $value['value']) ? 'selected' : '';
                    echo "<option value = \"" . $value['value'] . "\" $selected >" . $value['literal'] . "</option>";
                }
                ?>
            </select><br /><br />

            <input type="submit" name="submit" value="Mostrar"><br /><br />
        </form>
</body>

</html>
<?php

    drawCalendar($currentMonthNumber, $currentYear);
    showDays($a_daysNames);
    showCalendar($currentYear, $currentDay, $currentMonthNumber);
    } // Procesa Formulario
    else {
?>
    <h1>Calendario Mensual</h1>
    <p><span class="error">* Campos requeridos...</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    
        Introduce un año <input type="number" name="year" value="<?php echo $year; ?>">
        <span class="error">*<?php echo $yearErr; ?></span><br /><br />

        Elige un mes:
        <select name="combo">
            <?php
            foreach ($a_months as $value) {
                $selected = ($selectedMonth == $value['value']) ? 'selected' : '';
                echo "<option value = \"" . $value['value'] . "\" $selected >" . $value['literal'] . "</option>";
            }
            ?>
        </select><br /><br />

        <input type="submit" name="submit" value="Mostrar"><br /><br />
    </form>
<?php
    drawCalendar($selectedMonth, $year);
    showDays($a_daysNames);
    showCalendar($year, $currentDay, $selectedMonth);
    }

?>