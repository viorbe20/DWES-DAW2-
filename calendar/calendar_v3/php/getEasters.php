<?php
    /**
     * Función que obtiene los días de la semana santa
     */
    function getEasters($year)
    {
        $easterDay = (date(("j"), easter_date($year)));
        $easterMonth = (date(("n"), easter_date($year)));

        $fecha1 = new DateTime($year . "-" . $easterMonth . "-" . $easterDay);
        $fecha1->sub(new DateInterval('P2D'));
        $holyFriday = $fecha1->format('j');

        $fecha2 = new DateTime($year . "-" . $easterMonth . "-" . $easterDay);
        $fecha2->sub(new DateInterval('P3D'));
        $holyThursday = $fecha2->format('j');
        return [$holyFriday, $holyThursday, $easterMonth];
    }
