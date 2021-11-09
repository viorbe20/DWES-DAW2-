<?php

$covid = array("Cordoba" => 50,
"Sevilla" => 100,
"Huelva" => 30,
"Jaen" => 150,
"Malaga" => 20,
"Almeria" => 10,
"Cadiz" => 60,
"Granada" => 80);

foreach ($covid as $cases) {
    echo($cases);
    echo("<br>");
}

echo("<br>");
foreach ($covid as $city => $cases) {
    echo($city." ".$cases);
    echo("<br>");
}

?>