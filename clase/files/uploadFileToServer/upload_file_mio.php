<?php
//http://192.168.10.10/clase/files/uploadFileToServer/upload_file.php
//Definimos los 3 niveles de seguridad<: tamaño, tipo y extensióm

//Tamaño con constante
define("MAXSIZE", 20000000);

//Extensiones
$allowedExtensions = array("gif", "jpg", "jpeg", "png");

//Tipo de imagen, no directorio
$allowedFormat = array("image/gif", "image/jpg", "image/jpeg", "image/x-png", "image/png");

//Definimos como constante el directorio donde vamos a guadar las imágenes
define("DIRUPLOAD", "upload/");

//Cuando subo un fichero, la información de los archivos subidos se almaacena en $_FILES
//Comprobamos lo que tiene
//var_dump($_FILES);

//Obtener la extensión del fichero
$aNombre = explode(".",$_FILES['file']['name']);
//Coge el último elemento del array
//pahtinfo(); devuelve información de la extensión. También se podría usar
$ext = end($aNombre);

//COmporbamos que las condiciones sean las adecuadas
if (($_FILES['file']['size'] < MAXSIZE) && 
in_array($ext, $allowedExtensions) &&
in_array($_FILES['file']['type'], $allowedFormat))
{
    echo 'ok';
} else {
    echo 'error';
}

//cambimos el nombre de la imagen en a subida para no sobreescribir imagenes ocn el mismonomre. 
//i.e. fecha de subida, id único .

?>


