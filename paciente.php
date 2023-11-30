<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Perfil del Paciente</title>
</head>

<body>

    <h1>Perfil del Paciente</h1>

    <!-- Información del paciente -->
    <div class="section">
        <h2>Información del Paciente</h2>
        <h2>Introduzca su ID:</h2>
        <form id="formulario" name="formulario" method="post">
            <input type="text" placeholder="ID de Paciente" name="id_paciente" required><br />
            <input type="submit" value="Enviar">
        </form>
        <?php
        require_once("conecta.php");

        // Verifica si se ha enviado el ID del paciente
        if (isset($_POST['id_paciente'])) {
            $id_paciente = $_POST['id_paciente'];

            // Realiza la consulta SQL para obtener la información del paciente
            $sql_mostrar_paciente = "SELECT nombre, apellidos, genero, Fecha_nac FROM paciente WHERE id = $id_paciente";
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
            echo "ID del paciente no proporcionado.";
        }
        ?>
    </div>

    <!-- Próximas citas -->
    <div class="section">
        <h2>Próximas Citas</h2>
        <table>
            <tr>
                <th>ID de Cita</th>
                <th>Médico</th>
                <th>Fecha</th>
            </tr>
            <!-- Aquí se mostrarían las próximas citas -->
        </table>
    </div>

    <!-- Medicación actual -->
    <div class="section">
        <h2>Medicación Actual</h2>
        <!-- Aquí se mostraría la medicación actual -->
    </div>

    <!-- Consultas Pasadas -->
    <div class="section">
        <h2>Consultas Pasadas</h2>
        <table>
            <tr>
                <th>ID de Consulta</th>
                <th>Fecha</th>
            </tr>
            <!-- Aquí se mostrarían las consultas pasadas -->
        </table>
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
        <button class="button" onclick="redirigirAInicio()">Salir</button>
    </div>

    <script src="paciente.js"></script>

</body>

</html>