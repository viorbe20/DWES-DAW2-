<?php

/**
 * Función que dibuja el calendario
 */
function drawCalendar($month, $year)
{
    //Convierte número de mes en nombre
    $dateObj   = DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F'); // March

    echo ("<table>");
    echo ("<tr>");
    echo ("<td colspan=\"7\">" . $monthName . " " . $year . "</td>");
    echo ("</tr>");
};
