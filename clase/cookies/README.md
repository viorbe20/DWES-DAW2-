# Ejercicio Cookies


### 1. Creación variables
***
- Formulario que consta de nombre de usuario y contraseña. 
- Se crea una variable para cada uno con su correspondiente variable de error para la validación de datos.

```$user="";``` 

```$password="";``` 

```$err_user="";``` 

```$err_password="";```


### 2. Validación de formulario
***
- Dos banderas.

```$f_processForm="";``` 

```$f_error="";```

### 3. Función que limpia los datos introducidos por el usuario
***

```
function clearData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
};


