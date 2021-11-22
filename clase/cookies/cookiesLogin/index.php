<?php
/**
 * @author Virginia Ordoño Bernier
 * @since November 2021st
 * //http://192.168.10.10/clase/cookies/cookiesForm/index.php
 * 
 * Planteamiento
 * -------------
 * Formulario donde el usuario debe introducir nombre correcto ("admin")y contraseña  ('admin123').
 * Tiene opción de guardar la contraseña mediante casilla de verificación
 * Con el botón 'enviar' valida sus datos
 * 
 * Variables y funciones
 * ---------------------
 * => Variables para los datos del usuario
 * => Variables de posible error para esos campos
 * => Flags para validación de datos
 * => función lipieza de datos
 * 
 * Pasos
 * -----
 * 1. Comprobamos si $_COOKIE[] contiene los datos.
 * 2. Metemos cada dato del usuario en  una variable.
 */


//Creamos variable para los dos campos que va a tener el formulario
$user = "";
$password="";


//Variables de error para esos campos
$err_user="";
$err_password="";

//Flags para la validación de datos
$f_processForm=true;
$f_error=false;

//Función que limpia los datos del alumno.
function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

//Si la cookie contiene el usuario y la contraseña, dividimos su contenido 
//y lo metemos en sus variables correspondientes

if (isset($_COOKIE['user&password'])) {
    $a_twoParts = explode("/", $_COOKIE['user&password']);
    $user = $a_twoParts[0];
    $password = $a_twoParts[1];
}

//Si se ha pulsado el botón enviar, comprobamos que todo esté correcto.
if (isset($_POST['send'])) {
   
    //Si está vacío el usuario, devuelve mensaje de error y activamos bandera
    if (empty($_POST['user'])) {
        $err_user = "El usuario es obligatorio.";
        $f_error = true;
    }else {
        //En caso contrario asignamos el valor a la variable
        //pasándolo antes por la limpieza de datos
        $user = clearData($_POST['user']);
    }

    ////Si está vacía la contraseña, devuelve mensaje de error y activamos bandera
    if (empty($_POST['password'])) {
        $err_password = "La contraseña es obligatoria";
        $f_error = true;
    }else {
        //En caso contrario asignamos el valor a la variable
        //pasándolo antes por la limpieza de datos
        $password = clearData($_POST['password']);
    }


    //En caso de que la bandera de error haya pasado a true,
    //pasamos la bandera de procesar datos a true
    if ($f_error) {
        $f_processForm = true;
    }else {
        
        //Si usuario y contraseña están correctos, 
        //tras pulsar enviar mostramos mensaje por pantalla
        if ($user == "admin" && $password == 'admin123') {
            $f_processForm = false;
            echo("<h1>Hola Admin.</h1>");
            echo("<h1>Te has logueado correctamente.</h1>");

            //Si ha pulsado la casilla de guardar contraseña (on)
            if ((isset($_POST['savePassword'])=='on')) {
                $loginParts = $user."/".$password;
                echo $loginParts;

                //Si la cookie tiene valores se establece un valor más
                if (!isset($_COOKIE['user&password'])) {
                    setcookie('user&password',$loginParts,time()+36000);
                }
            }else{
                if (isset($_COOKIE['user&password'])) {
                    setcookie('user&password',"",time()-36000);
                }            
            }
        }else {
            //Si no se loguea correctamente aparece este mensaje
            //y se sigue mostrando el formulario
            echo("<h1>Usuario no encontrado</h1>");
        }

    }
    
}

//En caso que la bandera procesar formulario sea true,
//se muestra el formulario
if ($f_processForm) {
?>

<form action="" method="post">

    <label>
        Usuario
        <input type='text' name='user' value='<?php echo $user?>'>
    </label>
    <!--Span para mostrar mensaje de error-->
    <span class='error'><?php echo $err_user?></span>

    <br><br>
    <label>
        Contraseña
        <input type='password' name='password' value='<?php echo $password?>'>
    </label>
    <!--Span para mostrar mensaje de error-->
    <span class='error'><?php echo $err_password?></span>

    <!--Casilla verificación para confirmar que queire guardar la contraseña-->
    <br><br>
    <label>
        Guardar contraseña
        <input type='checkbox' name='savePassword'> 
    </label>
    
    <!--Botón submit para confirmar proceso-->
    <br><br>
    <input type='submit' name='send' value='Enviar'>

</form>
<?php
}