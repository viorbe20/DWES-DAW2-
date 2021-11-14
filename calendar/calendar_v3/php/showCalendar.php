<?php

function drawDayColor($color, $numberOnCalendar){
    echo ("<td bgcolor=\"$color\" align=\"center\" height=\"50\" width=\"50\"><a href=\"php/date.php?fecha=".$numberOnCalendar.'/'.$GLOBALS['month'].'/'.$GLOBALS['year']."\">$numberOnCalendar</a></td>");
};
/**
     * Función que muestra el calendario con los colores correspondientes
     */
    function showCalendar($currentYear, $currentDay, $currentMonthNumber)
    {

        //Cargamos con estos valores iniciales. Luego se les asignan los valores escogidos por el usuario
        $GLOBALS['year'] = $currentYear;
        $GLOBALS['month'] = $currentMonthNumber;

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
                    drawDayColor("green", $numberOnCalendar);
                } else if (($easterMonth == $currentMonthNumber) && (($numberOnCalendar == $holyThursday) || ($numberOnCalendar == $holyFriday))) {
                    drawDayColor("pink", $numberOnCalendar);
                } else if ($i % 7 == 0) {
                    drawDayColor("red", $numberOnCalendar);
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
                                drawDayColor($color, $numberOnCalendar);
                                $regularDay = false;
                            }
                        }
                    }
                    if ($regularDay) {
                       drawDayColor("white", $numberOnCalendar);
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