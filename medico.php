<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medico</title>
</head>

<body>
    <h1>Ambulatorio Quintanilla del Matojo</h1>
    <h2>Introduzca su ID</h2>
    <form id="formulario" name="formulario" method="post">
        <input type="text" placeholder="ID del medico" name="id_mec" required><br />
        <input type="submit" value="Enviar">
    </form>
    <?php
    require_once("conecta.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener y validar el ID del médico
        $id_mec = isset($_POST['id_mec']) ? intval($_POST['id_mec']) : 0;

        if ($id_mec > 0) {
            // Utilizar sentencias preparadas para prevenir inyecciones SQL
            $sql_mostrar_datos = "SELECT nombre, apellido, especialidad FROM medico WHERE id = id_mec";
            $resultado = $conexion->prepare($sql_mostrar_datos);

            if ($resultado) {
                // Asociar parámetros e ejecutar la consulta
                $resultado->bind_param("i", $id_mec);
                $resultado->execute();

                // Obtener resultados
                $resultado->bind_result($nombre, $apellido, $especialidad);

                // Mostrar resultados
                if ($resultado->fetch()) {
                    echo "<tr>";
                    echo "<td>" . "Nombre: " . $nombre . "</td>";
                    echo "<td>" . "Apellidos: " . $apellido . "</td>";
                    echo "<td>" . "Especialidad: " . $especialidad . "</td>";
                    echo "</tr>";
                } else {
                    echo "No se encontraron resultados para el ID de médico proporcionado.";
                }

                // Cerrar el statement
                $resultado->close();
            } else {
                echo "Error en la preparación de la consulta: " . $conexion->error;
            }
        } else {
            echo "ID de médico no válido.";
        }
    }
    ?>
</body>

</html>