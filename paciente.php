<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Perfil del Paciente</title>
</head>

<body>
    <?php
    require_once("conecta.php");
    ?>

    <h1>Perfil del Paciente</h1>
        <?php


        // Verifica si se ha enviado el ID del paciente
        if (isset($_POST['DNI_paciente'])) {
            $DNI_paciente = $_POST['DNI_paciente'];

            // Realiza la consulta SQL para obtener la información del paciente
            $sql_mostrar_paciente = "SELECT nombre, apellidos, genero, Fecha_nac FROM paciente WHERE DNI = '$DNI_paciente'";
            $resultado_paciente = mysqli_query($conexion, $sql_mostrar_paciente);

            // Comprueba si la consulta fue exitosa
            if ($resultado_paciente) {
                // Muestra la información del paciente
                while ($row_paciente = mysqli_fetch_assoc($resultado_paciente)) {
                    echo "<div class='section'>";
                    echo "<h2>Información del Paciente</h2>";
                    echo "<p>Nombre: " . $row_paciente['nombre'] . "</p>";
                    echo "<p>Apellidos: " . $row_paciente['apellidos'] . "</p>";
                    echo "<p>Genero: " . $row_paciente['genero'] . "</p>";
                    echo "<p>Fecha de Nacimiento: " . $row_paciente['Fecha_nac'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
        } else {
            echo " DNI del paciente no proporcionado.";
        }
        ?>
    </div>

    <!-- Próximas citas -->
    <div class="section">
        <?php
        // Consulta SQL para seleccionar citas con fechas mayores o iguales a la fecha actual
        $sql_mostrar_cita = "SELECT id_consulta, id_medico, Fecha_consulta FROM consulta WHERE Fecha_consulta >= CURDATE()";

        // Ejecutar la consulta
        $resultado_cita = mysqli_query($conexion, $sql_mostrar_cita);

        // Verificar si la consulta fue exitosa
        if ($resultado_cita) {
            echo "<h2>Próximas Citas</h2>";
            echo "<table>";
            echo "<tr>
                <th>ID de Consulta</th>
                <th>Médico</th>
                <th>Fecha</th>
              </tr>";

            // Iterar sobre los resultados y mostrar cada cita en una fila de la tabla
            while ($fila = mysqli_fetch_assoc($resultado_cita)) {
                echo "<tr>
                    <td>" . $fila['id_consulta'] . "</td>
                    <td>" . $fila['id_medico'] . "</td>
                    <td>" . $fila['Fecha_consulta'] . "</td>
                  </tr>";
            }

            echo "</table>";
        } else {
            // Manejar el caso en que la consulta falla
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }
        ?>
    </div>

    <!-- Medicación actual -->
    <div class="section">
        <h2>Medicación Actual</h2>
        <?php
        $sql_medicamento = "SELECT id_medicamento FROM receta WHERE Fecha_fin >= CURDATE()";
        $resultado_medicamento = mysqli_query($conexion, $sql_medicamento);
        echo $id_medicamento;
        ?>
    </div>

    <!-- Consultas Pasadas -->
    <div class="section">
        <?php
        // Suponiendo que ya tienes una conexión a la base de datos llamada $conexion

        // Consulta SQL para seleccionar consultas con fechas anteriores a la fecha actual
        $sql_mostrar_cita_pasada = "SELECT id_consulta, Fecha_consulta FROM consulta WHERE Fecha_consulta < CURDATE()";

        // Ejecutar la consulta
        $resultado_cita_pasada = mysqli_query($conexion, $sql_mostrar_cita_pasada);

        // Verificar si la consulta fue exitosa
        if ($resultado_cita_pasada) {
            echo "<h2>Consultas Pasadas</h2>";
            echo "<table>";
            echo "<tr>
                <th>ID de Consulta</th>
                <th>Fecha</th>
              </tr>";

            // Iterar sobre los resultados y mostrar cada consulta pasada en una fila de la tabla
            while ($fila = mysqli_fetch_assoc($resultado_cita_pasada)) {
                echo "<tr>
                    <td>" . $fila['id_consulta'] . "</td>
                    <td>" . $fila['Fecha_consulta'] . "</td>
                  </tr>";
            }

            echo "</table>";
        } else {
            // Manejar el caso en que la consulta falla
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }
        ?>
    </div>
    <!-- Sección de Pedir Cita -->
    <div class="section">
        <h2>Pedir Cita</h2>
        <div class="subsection">
            <label for="medico">Seleccione un médico:</label>
            <select id="medico">
                <!-- Aquí se mostraría la lista de médicos -->
                <option value="cabecera" selected>Dermatologo</option>
                <option value="cabecera" selected>Médico de Cabecera</option>
                <option value="cabecera" selected>Neurologo</option>
                <option value="cabecera" selected>Pediatra</option>
            </select>
        </div>
        <div class="subsection">
            <label for="fecha">Seleccione una fecha:</label>
            <input type="date" id="fecha" min="<?php echo date('Y-m-d'); ?>">
            <span id="fecha-error" style="color: red;"></span>
        </div>
        <div class="subsection">
            <label for="sintomas">Sintomatología (opcional):</label>
            <textarea id="sintomas" class="textarea" placeholder="Ingrese sus síntomas"></textarea>
        </div>
        <button class="button" onclick="pedirCita()">Pedir Cita</button>
    </div>
    <div>
        <button class="button" onclick="redirigirAInicio()">Volver a inicio</button>
    </div>

    <script src="paciente.js"></script>

</body>

</html>
<?php
mysqli_close($conexion)
?>