<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paciente</title>
    <link rel="icon" href="/images/ambulatorio.ico" type="image/x-icon">
</head>

<body>
    <h1>Ambulatorio Quintanilla del Montijo</h1>
    <img src="/images/ambulatorio.ico" alt="Logo del ambulatorio">
    <?php
    require_once("conecta.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_pac = $_POST['id_pac'];
        $sql_mostrar_datos = "SELECT nombre, apellidos, genero, Fecha_nac FROM paciente WHERE id = $id_pac";
        $resultado = $conexion->query($sql_mostrar_datos);

        while ($row = $result->fetch_assoc()) {
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