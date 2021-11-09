<?php

$frutas = array(

                "manzana" => array(
                                    "color" => "rojo",
                                    "sabor" > "dulce",
                                    "forma" => "redondeada"),
                
                "naranja" => array(
                    "color" => "naranja",
                    "sabor" => "ácido",
                    "forma" => "redondeada"),
                
                "plátano" => array(
                    "color" =>"amarillo",
                    "sabor" => "paste-y",
                    "forma" => "aplatanada")
    
    );

foreach ($frutas as $nombreFruta => $caracteristicas) {
    echo("Nombre fruta: ".$nombreFruta."<br>");
    echo("<br>");
   

    foreach ($caracteristicas as $sustantivos => $adjetivos) {
        echo("Característica: ".$sustantivos." y adjetivo: ".$adjetivos."<br>");
    }


}




?>