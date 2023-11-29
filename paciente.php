<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paciente</title>
</head>

<body>
    <h1>Ambulatorio Quintanilla del Matojo</h1>
    <?php
    require_once("conecta.php");
    $conexion = getConexion();
    $base_datos = 'ambulatorio';
    $conexion -> select_db($base_datos);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_pac = $_POST['id_pac'];
        $sql_mostrar_datos = "SELECT nombre, apellidos, genero, Fecha_nac FROM paciente WHERE id = $id_pac";
        $resultado = mysqli_query($conexion, $sql_mostrar_datos);

        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . "Nombre" . $row["nombre"] . "</td>";
            echo "<td>" . "Apellidos" . $row["apellidos"] . "</td>";
            echo "<td>" . "Genero" . $row["genero"] . "</td>";
            echo "<td>" . " Fecha de Nacimiento" . $row["Fecha_nac"] . "</td>";
            echo "</tr>";
        }
    }
    ?>
</body>

</html>