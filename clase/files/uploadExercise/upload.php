<?php
//Página que permite subir fotos al servidor

//Para solo acceder si hay sesión iniciada
session_start();
if (!$_SESSION['auth']) {
    header('Location:index.php');
}

//3 capas de seguridad para la subida: tamaño, extensión y formato

//Creamos una constante con el tamaño máximo 
//de los archivos que podemos cargar
define("MAXSIZE",20000000);

//Array que contiene las extensiones permitidas de imágenes
$allowedExts = array ("gif", "jpeg", "jpg", "png");

////Array que contiene los formatos permitidos de imágenes
$allowedFormat = array ("image/gif", "image/jpeg", "image/jpg", "image/x-png", "image/png");

//img es la carpeta que tengo que crear para que se guarde la imagen
define("DIRUPLOAD", "img/");

//Necesitamos separa el nombre de los archivos de su extensión
//para comprobar que la extensión es válida

//método explode(elementoSeparacion, loQueSepara)
//[name] está dentro de [file]. Nombre completo de la foto
$nameNoExtension =  explode(".", $_FILES['file']['name']);

//end(array) devuelve último elemento del array
$extensionName = end($nameNoExtension);

//Si se cumplen las 3 condiciones de seguridad
if (( $_FILES["file"]["size"] < MAXSIZE) && 
in_array($_FILES["file"]["type"],$allowedFormat)  && 
in_array($extensionName, $allowedExts)) {

    //Si hay error, que es > 0, muestra un mensaje
    if ($_FILES["file"]["error"] > 0)    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
   }
   else {
    //Creamos una variable con el nombre del archivo
    $filename = $_FILES["file"]["name"];
    
    //Añadimos un id único para identificar el archivo
    $filename = uniqid().'.'.pathinfo($filename,PATHINFO_EXTENSION);

    //Imprimimos la información del archivo/foto
    echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
    echo "Type: " . $_FILES["file"]["type"] . "<br/>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . "kB <br/>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";
    
    //Comprobamos si existe una foto en la carpeta que hemos creado
    //con el mismo nombre. Si existe, te avisa con un mensaje.
    if (file_exists(DIRUPLOAD .$filename)) {
        echo $_FILES["file"]["name"] . " already exists. ";
     } //En caso contrario, la guarda en la carpeta
    else {  
        move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
        echo "Stored in: " . DIRUPLOAD . $filename;
     }
    echo "<br/>";
    //Para volver a la página anterior en el historial
    echo '<a href="javascript:history.back()">Volver</a>'; 
   }
} else {
    echo "Invalid file.";
}
?>