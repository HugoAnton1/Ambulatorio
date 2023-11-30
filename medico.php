<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #3498db;
        }

        .section {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        .button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        .textarea-extracto {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
        }
    </style>
</head>

<body>

    <h1>Perfil del Médico</h1>

    <!-- Información del médico -->
    <div class="section">
        <h2>Información del Médico</h2>
        <?php
        require_once("conecta.php");

        // Supongamos que el ID del médico se pasa a través de un formulario POST
        if (isset($_POST['id_medico'])) {
            $id_medico = $_POST['id_medico'];

            // Realizar la consulta SQL para obtener la información del médico
            $sql_mostrar_medico = "SELECT nombre, especialidad FROM medico WHERE id = $id_medico";
            $resultado_medico = mysqli_query($conexion, $sql_mostrar_medico);

            // Comprobar si la consulta fue exitosa
            if ($resultado_medico) {
                // Mostrar la información del médico
                while ($row_medico = mysqli_fetch_assoc($resultado_medico)) {
                    echo "<p>Nombre: " . $row_medico['nombre'] . "</p>";
                    echo "<p>Especialidad: " . $row_medico['especialidad'] . "</p>";
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
        } else {
            echo "ID del médico no proporcionado.";
        }
        ?>
    </div>

    <!-- Número de consultas en los próximos 7 días -->
    <div class="section">
        <h2>Próximas Consultas (Próximos 7 días)</h2>
        <?php
        // Supongamos que tienes una tabla de citas con campos como 'id_cita', 'id_paciente', 'fecha', 'sintomatologia'
        // Realiza una consulta SQL para contar el número de consultas en los próximos 7 días
        $fecha_actual = date('Y-m-d');
        $fecha_siete_dias = date('Y-m-d', strtotime($fecha_actual . ' + 7 days'));

        $sql_num_consultas = "SELECT COUNT(*) as num_consultas FROM cita WHERE id_medico = $id_medico AND fecha BETWEEN '$fecha_actual' AND '$fecha_siete_dias'";
        $resultado_num_consultas = mysqli_query($conexion, $sql_num_consultas);

        // Comprobar si la consulta fue exitosa
        if ($resultado_num_consultas) {
            $row_num_consultas = mysqli_fetch_assoc($resultado_num_consultas);
            echo "<p>Número de consultas en los próximos 7 días: " . $row_num_consultas['num_consultas'] . "</p>";
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion);
        }
        ?>
    </div>

    <!-- Consultas de hoy -->
    <div class="section">
        <h2>Consultas de Hoy</h2>
        <table>
            <tr>
                <th>ID de Cita</th>
                <th>Paciente</th>
                <th>Extracto de Sintomatología</th>
                <th>Acciones</th>
            </tr>
            <?php
            // Supongamos que tienes una tabla de citas con campos como 'id_cita', 'id_paciente', 'fecha', 'sintomatologia'
            // Realiza una consulta SQL para obtener las consultas de hoy
            $sql_consultas_hoy = "SELECT id_cita, id_paciente, sintomatologia FROM cita WHERE id_medico = $id_medico AND fecha = '$fecha_actual'";
            $resultado_consultas_hoy = mysqli_query($conexion, $sql_consultas_hoy);

            // Comprobar si la consulta fue exitosa
            if ($resultado_consultas_hoy) {
                while ($row_consulta_hoy = mysqli_fetch_assoc($resultado_consultas_hoy)) {
                    echo "<tr>";
                    echo "<td>" . $row_consulta_hoy['id_cita'] . "</td>";
                    echo "<td>" . $obtenerNombrePaciente($row_consulta_hoy['id_paciente'], $conexion) . "</td>";
                    echo "<td>" . substr($row_consulta_hoy['sintomatologia'], 0, 100) . "</td>";
                    echo "<td><button onclick='abrirPestanaConsulta(" . $row_consulta_hoy['id_cita'] . ")'>PASAR CONSULTA</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
            ?>
        </table>
    </div>

    <script src="medico.js"></script>

</body>

</html>