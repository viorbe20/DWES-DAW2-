<?php

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
