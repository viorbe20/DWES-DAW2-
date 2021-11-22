<?php
/**
 * @author Virginia Ordoño Bernier
 * @since November 2021st
 * //http://192.168.10.10/ud4/ud4_cookies/ej3/index.php
 * 
 * Ud4. Ejercicio 3
 * Crea un formulario de login que permita al usuario recordar los datos introducidos. 
 * Incluye una opción para borrar la información almacenada.
 * Planteamiento
 * -------------
 * 
 * Variables y funciones
 * ---------------------
 * => Variables datos de usuario
 * => Variables de posible errorç
 * => Flags validación de datos
 * => Función limpieza de datos
 * 
 * Validación datos
 * ---------------
 * Se comprueban tras dar al botón enviar (todo en el mismo if)
 * 1. Datos de los campos:
 * a) Campos vacíos => mostrar mensaje de error, flag de error a true y
 * mostrar nuevamente el formulario.
 * b) Todo correcto => bandera error a false =procesamos datos => bandera procesar datos a true
 * 
 * 2. Comprobación cookies
 * Comprobación general de error flag
 * Posibilidades:
 * 2.1. Volver a empezar
 * 2.2. Se comprueban usuario y contraseña. 
 * Si no son correctos aparece un mensaje y otra vez el formulario
 * 2.3. Se comprueban usuario y contraseña. 
 * Si son correctos se hace login y se guarda sus datos en caso de que
 * el usuario lo haya indicado
 **/


//Creamos variable para los dos campos que va a tener el formulario
$user = "";
$password = "";

//Variables de error para esos campos
$err_user = "";
$err_password = "";

//Flags para la validación de datos
$f_processForm = true;
$f_error = false;

//Función que limpia los datos del alumno.
function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};

//Comprobación borrar datos
if (isset($_POST['deleteData'])) {
    echo ("<h2>Tus datos han sido borrados</h2>");
    setcookie('user&password', '', time() -36000);
}

//TRAS PULSAR ENVIAR, COMPROBAMOS DATOS Y COOKIES

//1. Comprobación datos
if (isset($_POST['submit'])) {

    //Comprobar campo usuario vacío
    if (!isset($_POST['user'])) {
        $err_user = "El usuario es obligatorio.";
        $f_error = true;
    } else {
        //En caso contrario asignamos el valor a la variable
        //pasándolo antes por la limpieza de datos
        $user = clearData($_POST['user']);
        var_dump($user);
    }

    //Comprobar campo contraseña vacío
    if (!isset($_POST['password'])) {
        $err_password = "La contraseña es obligatoria.";
        $f_error = true;
    } else {
        //En caso contrario asignamos el valor a la variable
        //pasándolo antes por la limpieza de datos
        $password = clearData($_POST['password']);
        var_dump($password);
    }

    //2. Comprobación cookies
    //Si las cookies están cargadas, 
    //metemos el valor en sus variable correspondientes

    if (isset($_COOKIE['user&password'])) {
        $a_twoParts = explode("/", $_COOKIE['user&password']);
        $user = $a_twoParts[0];
        $password = $a_twoParts[1];
    }

    //COMPROBACIÓN GENERAL DE ERROR FLAG 
    //Si f_error es true, se vuelve a mostrar el formulario
    if ($f_error) {
        $f_processForm = true; //Se muestra formulario, primera pantalla
    } else {
        //Si los datos están correctos, comprobamos que el usuario y la contraseña
        //existen y son correctos
        if ($user == "virginia" && $password == '1234') {
            //Bloqueamos formulario
            $f_processForm = false;
            echo ("<a href=\"index.php\">Salir</a>");

            echo ("<h2>Hola Virginia</h2>");
            echo ("<h2>Te has logueado correctamente.</h2>");
            //<!--Botón reset para borrar cookies-->
            echo("<form action='' method='post'>");
            echo ("<input type='submit' name='deleteData' value='Borrar Datos'>");
            echo("</form>");

            //Comprobación casilla guardar contraseña (on)
            if (isset($_POST['savePassword']) == 'on') {
                $savedLogin = $user . "/" . $password;
                //echo $savedLogin;

                //Si la cookie está vacía, la cargamos con los datos
                if (!isset($_COOKIE['user&password'])) {
                    //nombre, valor, expiración
                    setcookie('user&password', $savedLogin, time() + 36000);
                }
            } else {
                //Si no quiere guardarla, la destruimos con expiración en negativo
                if (isset($_COOKIE['user&password'])) {
                    setcookie('user&password', "", time() - 36000);
                }
            }
            
        } else {
            //Si no se loguea correctamente aparece este mensaje
            //y se sigue mostrando el formulario
            echo ("<h1>Usuario no encontrado</h1>");
        }
    }
}


//El formulario se muestra mientras la bandera 
//de procesar formulario esté a true, comienza así

if ($f_processForm) {
?>

    <!--VISTA-->

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name='Author' content='Virginia Ordoño'>
        <link rel='stylesheet' href='css/estilos.css'>
        <title>Ud4. Ejercicio 3</title>
    </head>

    <body>
        <form action="" method="post">
            <h1>Validación de usuario</h1>
            <label>
                Usuario
                <input type="text" name="user" value='<?php echo $user ?>'>
            </label>
            <!--Span para mostrar mensaje de error-->
            <span class='error'><?php echo $err_user ?></span>

            <br><br>
            <label>
                Contraseña
                <input type="password" name="password" value='<?php echo $password ?>'>
            </label>
            <!--Span para mostrar mensaje de error-->
            <span class='error'><?php echo $err_password ?></span>

            <!--Casilla verificación para confirmar que quiere guardar la contraseña-->
            <br><br>
            <label>
                Guardar contraseña
                <input type='checkbox' name='savePassword'>
            </label>

            <!--Botón submit para confirmar proceso-->
            <br><br>
            <input type='submit' name='submit' value='Enviar'>

        </form>

    </body>

    </html>
<?php
}
