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
    $_SESSION['tasksList'][]=array('task'=>$_POST['task'],
                                'status'=>$_POST['status']);
}
?>

<!--VISTA-->
<html lang="es">
<head>
    <meta charset="utf-8">
</head>

<body>
<h1>Lista de tareas</h1>

<!--Creamos ambos enlaces para enviar correo y cerrar sesión-->
<a href="../index.php">Volver al calendario</a>
<a href="closeSession.php">Cerrar sesión</a>

<form action="" method="post">
    <p>Tarea:</p>
    <input type="text" name="task" placeholder="Tarea"/> 
    
    <p>Estado:</p>
    <input type="text" name="status" placeholder="Estado"/> 
    
    <!--Botón submit-->
    <p><input type="submit" name="alta" value="Agregar"></p>
</form>

<!--Lista que se va a mostrar con las tareas-->
<h2>Listado de tareas</h2>
<?php
//Recorremos el array SESSION[tasksList] donde se han ido guardando las tareas
foreach ($_SESSION['tasksList'] as $key => $value) {
    echo $value['task'].' '.$value['status'].'<br>';
}
?>

</body>
</html>