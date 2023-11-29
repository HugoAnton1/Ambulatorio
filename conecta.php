<?php
//Creación de la función
function getConexion()
{
    //servidor, usuario y contraseña con los que nos vamos a conectar a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    //Realizamos la conexion
    $conexion = mysqli_connect($servername, $username, $password);
    //Comprobación para ver si la conexion con la BD fallo
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    //Comprobación de la existencia de la BD
    $query = "SHOW DATABASES LIKE 'Ambulatorio'";
    $resultado = $conexion->query($query);
    if ($resultado->num_rows > 0) {
        echo "La base de datos ya existe";
    }
    //Creación de la BD
    else {
        //Creamos la BD
        $sql = "CREATE DATABASE IF NOT EXISTS Ambulatorio";
        if (mysqli_query($conexion, $sql)) { // Lanzar BD contra el servidor
            echo "Base de datos creada con éxito";

            // Seleccionar la base de datos
            $base_datos = 'Ambulatorio';
            $conexion->select_db($base_datos);

            require "crear_tablas.php";
            // No cerrar la conexión aquí
            return $conexion;
        } else {
            echo "Error al crear la base de datos";
            mysqli_error($conexion); //Muestra el código de error
        }
    }
}
//Creacion de las clases que se solicitan
class medico
{
};
class paciente
{
};
class consulta
{
};
$conexion = getConexion();