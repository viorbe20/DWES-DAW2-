<?php

$families = array (
"Griffin"=>array ("Peter", "Lois", "Megan"),
"Quagmire"=>array("Glenn"),
"Brown"=>array("Cleveland", "Loretta", "Junior")
);

foreach ($families as $familyName => $names) {
    echo($familyName."<br>");
  
    $arrayLength = $familyName.count($names);
    for ($i=0; $i < $arrayLength; $i++) { 
        echo($names[$i]);
    }
}

?>