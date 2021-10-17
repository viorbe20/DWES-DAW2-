<?php

/**
 * 192.168.10.10/ud3/ud3_clase/formulario_array.php
 */
$datosPersonales = array(
    "nombre" => array(
        "defaultType" => "text",
        "defaultValue" => "Daniel",
    ),
    "apellidos" => array(
        "defaultType" => "text",
        "defaultValue" => "Ayala Cantador",
    ),
    "direccion" => array(
        "defaultType" => "text",
        "defaultValue" => "Fidiana",
    ),
    "curso" => array(
        "defaultType" => "radiobutton",
        "options" => array(
            "1º ASIR",
            "2º ASIR",
            "1º DAW",
            "2º DAW"
        )
    )
);

echo ("<form action=\"\" method=\"post\">");
echo ("<label>Datos personales<br><br>");

foreach ($datosPersonales as $key => $value) {

    if ($key == "nombre") {
        echo ("<input type='text' name='name' id='data1' placeholder='nombre'></label><br><br>");
    } else if ($key == "apellidos") {
        echo ("<input type='text' name='surname' id='data2' placeholder='apellidos'></label><br><br>");
    } else if ($key == "direccion") {
        echo ("<input type='text' name='address' id='data3' placeholder='dirección'></label><br><br>");
    } else { //$key =="curso"
        foreach ($value as $key1 => $value1) {
            if ($key1 == "options") {
                $arrayLength = count($value1);
                for ($i = 0; $i < $arrayLength; $i++) {
                    echo ($value1[$i]);
                    echo ("<input type='radio' name='course' id='data4' value='dawoasir'><br>");
                }
            }
        }
    }
}
echo ("<br><input type=\"submit\" value=\"Enviar\">");
echo ("</label>");
echo ("</form>");
?>