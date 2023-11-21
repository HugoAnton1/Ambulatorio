<?php
//Conexión a la base de datos
require_once("conecta.php");
$conexion = getConexion();
$base_datos = 'biblioteca';
$conexion->select_db($base_datos);
//Creación de las tablas 
$sql_consulta = "CREATE TABLE IF NOT EXISTS consulta (
    id_consulta INT AUTO_INCREMENT PRIMARY KEY,
    id_medico INT NOT NULL,
    CONSTRAINT fk_medico FOREIGN KEY (id_medico) REFERENCES medico(id),
    id_paciente INT NOT NULL,
    CONSTRAINT fk_paciente FOREIGN KEY (id_paciente) REFERENCES paciente(id),
    Fecha_consulta DATE NOT NULL,
    Diagnosticos VARCHAR(255) NOT NULL,
    Sintomatologia VARCHAR(255) NOT NULL
)";

$sql_medicamento = "CREATE TABLE IF NOT EXISTS medicamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicamento VARCHAR(255) NOT NULL,
)";

$sql_receta = "CREATE TABLE IF NOT EXISTS receta (
    id_medicamento INT NOT NULL,
    id_consulta INT NOT NULL,
    CONSTRAINT fk_medicamento FOREIGN KEY (id_medicamento) REFERENCES lectores(id),
    CONSTRAINT fk_consulta FOREIGN KEY (id_consulta) REFERENCES libros(id_consulta),
    Posologia VARCHAR(255) NOT NULL,
    Fecha_fin DATE NOT NULL
)";

$sql_medico = "CREATE TABLE IF NOT EXISTS medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    especialidad VARCHAR(255) NOT NULL
)";

$sql_paciente = "CREATE TABLE IF NOT EXISTS paciente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    DNI VARCHAR(9) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    genero CHAR(1) CHECK (genero IN ('M', 'F', 'O')),
    Fecha_nac DATE NOT NULL,
    id_med VARCHAR(255)
    )";
