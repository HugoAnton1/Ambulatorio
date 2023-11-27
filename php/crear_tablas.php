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
    Diagnosticos TEXT,
    Sintomatologia TEXT
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
    genero CHAR(1),
    Fecha_nac DATE NOT NULL,
    id_med VARCHAR(255)
    )";

//INSERT INTO medicamento
mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Paracetamol')");
mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Naproxeno')");
mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Sintrom')");
mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Orfidal')");

//INSERT INTO medico
mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Asier', 'Lopez', 'dematología')");
mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Iker', 'Gimenez', 'neurología')");
mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Ibai', 'Llanos', 'pediatría')");
mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Ander', 'Cortes', 'medico de familia')");

//INSERT INTO paciente
mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('12345678S', 'Eric', 'Ruiz', 'M', '15/01/2002')");
mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('87654321L', 'Ruben', 'Martin', 'M', '03/04/1982')");
mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('67834512M', 'Esperanza', 'Borrás', 'F', '04/04/2003')");
mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('32165487A', 'Samira', 'Rivera', 'F', '10/11/2017')");

//INSERT INTO consulta
mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta) VALUES ('20/11/2023')");
mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta) VALUES ('7/10/2023')");
mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta) VALUES ('28/12/2022')");
mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta) VALUES ('5/2/2023')");

//INSERT INTO receta
mysqli_query($conexion, "INSERT INTO receta (Posología, Fecha_fin) VALUES ('1cap/8h-15d', '15/12/2023')");
mysqli_query($conexion, "INSERT INTO receta (Posología, Fecha_fin) VALUES ('2cap/día-3m', '7/1/2024')");
mysqli_query($conexion, "INSERT INTO receta (Posología, Fecha_fin) VALUES ('1cap/día-1A', '28/12/2023')");
mysqli_query($conexion, "INSERT INTO receta (Posología, Fecha_fin) VALUES ('1cap/8h-1M', '5/3/2023')");