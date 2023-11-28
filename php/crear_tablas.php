<?php
//Creación de las tablas 
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

$sql_medicamento = "CREATE TABLE IF NOT EXISTS medicamento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medicamento VARCHAR(255) NOT NULL
)";

$sql_consulta = "CREATE TABLE IF NOT EXISTS consulta (
    id_consulta INT AUTO_INCREMENT PRIMARY KEY, 
    id_medico INT NOT NULL,
    id_paciente INT NOT NULL,
    Fecha_consulta DATE NOT NULL,
    Diagnosticos TEXT,
    Sintomatologia TEXT,
    CONSTRAINT fk_medico FOREIGN KEY (id_medico) REFERENCES medico(id),
    CONSTRAINT fk_paciente FOREIGN KEY (id_paciente) REFERENCES paciente(id)
)";

$sql_receta = "CREATE TABLE IF NOT EXISTS receta (
    id_medicamento INT NOT NULL,
    id_consulta INT NOT NULL,
    Posologia VARCHAR(255) NOT NULL,
    Fecha_fin DATE NOT NULL,
    CONSTRAINT fk_medicamento FOREIGN KEY (id_medicamento) REFERENCES medicamento(id),
    CONSTRAINT fk_consulta FOREIGN KEY (id_consulta) REFERENCES consulta(id_consulta)
)";

mysqli_query($conexion, $sql_medico);
mysqli_query($conexion, $sql_paciente);
mysqli_query($conexion, $sql_medicamento);
mysqli_query($conexion, $sql_consulta);
mysqli_query($conexion, $sql_receta);

$sql = "SELECT nombre FROM paciente";
$resultado = mysqli_query($conexion, $sql) or die("Error al comprobar los datos");

if (mysqli_num_rows($resultado) == 0) {

    //INSERT INTO medicamento
    mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Paracetamol')");
    mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Naproxeno')");
    mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Sintrom')");
    mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Peroxiben')");
    mysqli_query($conexion, "INSERT INTO medicamento (medicamento) VALUES ('Dalsy')");

    //INSERT INTO medico
    mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Jordi', 'Carrillo', 'dematología')");
    mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Antonio', 'Yuste', 'medico de familia')");
    mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Ibai', 'Llanos', 'neurología')");
    mysqli_query($conexion, "INSERT INTO medico (nombre, apellido, especialidad) VALUES ('Ander', 'Cortes', 'pediatría')");

    //INSERT INTO paciente
    mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('12345678S', 'Eric', 'Ruiz', 'M', '2002/01/15')");
    mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('87654321L', 'Ruben', 'Martin', 'M', '1382/04/03')");
    mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('67834512M', 'Esperanza', 'Borrás', 'F', '2003/04/04')");
    mysqli_query($conexion, "INSERT INTO paciente (DNI, nombre, apellidos, genero, Fecha_nac) VALUES ('32165487A', 'Samira', 'Rivera', 'F', '2017/11/10')");

    //INSERT INTO consulta
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2022/11/20', '1', '1');");
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2023/10/07', '4', '4')");
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2022/12/28', '3', '2')");
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2023/02/05','2', '3')");
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2023/12/07', '2', '4')");
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2023/10/05', '3', '3')");
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2023/06/28', '2', '2')");
    mysqli_query($conexion, "INSERT INTO consulta (Fecha_consulta, id_medico, id_paciente) VALUES ('2022/12/29', '1', '1')");


    //INSERT INTO receta
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('1cap/8h-15d', '2022/12/5', '3', '1')");
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('2cap/día-3m', '2024/01/07', '4', '2')");
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('1cap/día-6m', '2023/06/28', '2', '3')");
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('1cap/8h-1m', '2023/03/05', '1', '4')");
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('Nada', '2023/12/07', '5', '5')");
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('1cap/día-6m', '2024/04/05', '2', '6')");
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('Nada', '2023/06/28', '5', '7')");
    mysqli_query($conexion, "INSERT INTO receta (Posologia, Fecha_fin, id_medicamento, id_consulta) VALUES ('1cap/día-1m', '2023/01/30', '3', '8')");
}
mysqli_close($conexion);