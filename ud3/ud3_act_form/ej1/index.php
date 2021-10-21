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
 *http://192.168.10.10/ud3/ud3_act_form/ej1/indexV2.php
 */
require __DIR__ . "/functions/getHolidays.php";
///////////////////// DISEÑO CALENDARIO//////////////////////

//Fecha actual
$currentDay = date("j");
$currentMonthNumber = date("n");
//$currentMonthString = $a_daysNames[$currentMonthNumber-1];
$currentYear = date("Y");

//Devuelve el primer día dado un mes en número de la semana de 0 a 7.
//DATOS ACTUALES DE HOY. CAMBIAR EN FORMULARIO VALIDADO
///////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////


//Array con los días de la semana
$a_daysNames = array("L", "M", "X", "J", "V", "S", "D");

/**
 * Función que dibuja el calendario
 */
function drawCalendar($month, $year)
{

    echo ("<table border=1>");
    echo ("<tr align=\"center\">");
    echo ("<td colspan=\"7\">" . date("M") . " " . $year . "</td>");
    echo ("</tr>");
};

/**
 * Función que pinta los días de la semana en el calendario
 */
function showDays($a_daysNames)
{
    echo ("<tr>");
    $arrayLength = count($a_daysNames);
    for ($i = 0; $i < $arrayLength; $i++) {
        echo ("<th>" . $a_daysNames[$i] . "</th>");
    }
    echo ("</tr>");
};



///////////////////// GESTIÓN Y VALIDACIÓN DATOS//////////////////////

$year = "";
$yearErr = "";
$selectedMonth = [];
//Array que contiene los meses
$a_months = array(
    array(
        "value" => 1,
        "literal" => "Enero"
    ),
    array(
        "value" => 2,
        "literal" => "Febrero"
    ),
    array(
        "value" => 3,
        "literal" => "Marzo"
    ),
    array(
        "value" => 4,
        "literal" => "Abril"
    ),
    array(
        "value" => 5,
        "literal" => "Mayo"
    ),
    array(
        "value" => 6,
        "literal" => "Junio"
    ),
    array(
        "value" => 7,
        "literal" => "Julio"
    ),
    array(
        "value" => 8,
        "literal" => "Agosto"
    ),
    array(
        "value" => 9,
        "literal" => "Septiembre"
    ),
    array(
        "value" => 10,
        "literal" => "Octubre"
    ),
    array(
        "value" => 11,
        "literal" => "Noviembre"
    ),
    array(
        "value" => 12,
        "literal" => "Diciembre"
    )
);

$f_error = false;
$f_processForm = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $f_processForm = true;

    if (empty($_POST['year'])) {
        $yearErr = "El año es obligatorio";
        $f_error = true;
    } else {
        $year = clearData($_POST['year']);
    }

    if (isset($_POST['combo'])) {
        $selectedMonth = $_POST['combo'];
    }
};
if ($f_error) {
    $f_processForm = false;
}


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



    function clearData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    };


    function showCalendar($currentYear, $currentDay, $currentMonthNumber)
    {
        $holiday = getHolidays();
        [$holyFriday, $holyThursday, $easterMonth] = getEasters($currentYear);

        $completeDate = strtotime($currentYear . "-" . $currentMonthNumber);
        $firstDayOfMonth = date("N", $completeDate);
        $daysPerMonth = date("t", $completeDate);

        //Muestra calendario
        $numberOnCalendar = 1;
        $boxesNumber = 35;
        for ($i = 1; $i <= $boxesNumber; $i++) {
            //Si el mes ocupa 6 semanas ampliamos una fila
            if ($daysPerMonth >= 30 && $firstDayOfMonth == 6 || $firstDayOfMonth == 7) {
                $boxesNumber = 42;
            }

            if ($i < $firstDayOfMonth) {
                echo ("<td align=\"center\" height=\"50\" width=\"50\"></td>");
            } else if ($numberOnCalendar <= $daysPerMonth) {
                $regularDay = true;
                //Colorea verde día actual y rojo domingos

                if ($numberOnCalendar == $currentDay) {
                    echo ("<td bgcolor=\"green\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                } else if (($easterMonth == $currentMonthNumber) && (($numberOnCalendar == $holyThursday) || ($numberOnCalendar == $holyFriday))) {
                    echo ("<td bgcolor=\"pink\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                } else if ($i % 7 == 0) {
                    echo ("<td bgcolor=\"red\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                } else {
                    foreach ($holiday[$currentMonthNumber - 1] as $key => $value) {
                        if ($key == "estatal") {
                            $color = "purple";
                        } else if ($key == "autonomico") {
                            $color = "orange";
                        } else {
                            $color = "yellow";
                        }
                        for ($l = 0; $l < count($value); $l++) {
                            if ($numberOnCalendar == $value[$l]["numero"]) {
                                echo ("<td bgcolor=\"$color\" align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                                $regularDay = false;
                            }
                        }
                    }

                    if ($regularDay) {
                        echo ("<td align=\"center\" height=\"50\" width=\"50\">$numberOnCalendar</td>");
                    }
                }
                $numberOnCalendar++;
            }
            //Crea una nueva fila cuando llega al domingo
            if ($i % 7 == 0) {
                echo ("</tr><tr>");
            }
        }

        echo ("</tr>");
        echo ("</table>");
    };

    function getEasters($currentYear)
    {
        //Semana santa
        //DATOS ACTUALES DE HOY. CAMBIAR EN FORMULARIO VALIDADO
        ///////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////
        $easterDay = (date(("j"), easter_date($currentYear)));
        $easterMonth = (date(("n"), easter_date($currentYear)));

        $fecha1 = new DateTime($currentYear . "-" . $easterMonth . "-" . $easterDay);
        $fecha1->sub(new DateInterval('P2D'));
        $holyFriday = $fecha1->format('j');

        $fecha2 = new DateTime($currentYear . "-" . $easterMonth . "-" . $easterDay);
        $fecha2->sub(new DateInterval('P3D'));
        $holyThursday = $fecha2->format('j');
        return [$holyFriday, $holyThursday, $easterMonth];
    }
?>