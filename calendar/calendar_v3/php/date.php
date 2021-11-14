<?php
//Iniciamos sesión
session_start();

//Si la variable SESSION no se ha generado, le asignamos un array vacío
if (!isset($_SESSION['tasksList'])) {
    $_SESSION['tasksList'] = array();
}

//Si se ha pulsado el botón enviar, asignamos a la variable tasksList el nombre 
//de la tarea y el estado introducido
//Es un array asociativo con nombre y valor
if (isset($_POST['alta'])) {
    $_SESSION['tasksList'][$_GET['fecha']][]=array(
                                'task'=>$_POST['task'],
                                'startTime'=>$_POST['startTime'],
                                'endTime'=>$_POST['endTime'],
                                'comments'=>$_POST['comments']);
}
//var_dump ($_SESSION['tasksList']);
?>

<!--VISTA-->
<html lang="es">
<head>
    <meta charset="utf-8">
</head>

<body>
<h1>Lista de tareas <?php
echo $_GET['fecha'];
?></h1>

<!--Creamos ambos enlaces para enviar correo y cerrar sesión-->
<a href="../index.php">Volver al calendario</a>
<a href="closeSession.php">Cerrar sesión</a>

<form action="" method="post">
    <p>Tarea:</p>
    <input type="text" name="task" placeholder="Tarea"/> 

    <p>Hora de inicio:</p>
    <input type="time" name="startTime"/> 
    
    <p>Hora de finalización:</p>
    <input type="time" name="endTime"/> 

    <p>Comentario:</p>
    <input type="text" name="comments" placeholder="Comentario"/> 
    
    <!--Botón submit-->
    <p><input type="submit" name="alta" value="Agregar"></p>
</form>

<!--Lista que se va a mostrar con las tareas-->
<h2>Listado de tareas</h2>
<?php
//Recorremos el array SESSION[tasksList] donde se han ido guardando las tareas
foreach ($_SESSION['tasksList'][$_GET['fecha']] as $key => $value) {
    echo $value['task'].' '.$value['startTime'].' '.$value['endTime'].' '.$value['comments'].'<br>';
}
?>

</body>
</html>