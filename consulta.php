<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Consulta Médica</title>
</head>

<body>

    <h1>Consulta Médica</h1>

    <!-- Información de la consulta (no editable) -->
    <div class="section">
        <h2>Información de la Consulta</h2>
        <!-- Aquí mostrar información como médico, paciente, fecha -->
    </div>

    <!-- Información editable de la consulta -->
    <div class="section">
        <h2>Información Editable</h2>

        <!-- Sintomatología -->
        <div class="subsection">
            <label for="sintomas">Sintomatología:</label>
            <textarea id="sintomas" class="textarea"></textarea>
        </div>

        <!-- Diagnóstico -->
        <div class="subsection">
            <label for="diagnostico">Diagnóstico:</label>
            <textarea id="diagnostico" class="textarea"></textarea>
        </div>

        <!-- Medicación -->
        <div class="subsection">
            <h3>Medicación</h3>
            <select id="medicamento">
                <!-- Aquí cargar dinámicamente la lista de medicamentos desde la base de datos -->
                <option value="medicamento1">Medicamento 1</option>
                <option value="medicamento2">Medicamento 2</option>
                <!-- ... -->
            </select>

            <input type="text" id="cantidad" placeholder="Cantidad">
            <input type="text" id="frecuencia" placeholder="Frecuencia">
            <input type="text" id="dias" placeholder="Número de días">
            <input type="checkbox" id="esCronica"> Medicación crónica

            <button class="button" onclick="agregarMedicacion()">Añadir Medicación</button>

            <!-- Lista de medicación -->
            <div class="medication-list">
                <h4>Medicación Actual</h4>
                <div id="medicationItems"></div>
            </div>
        </div>

        <!-- Adjuntar PDF -->
        <div class="subsection">
            <h3>Adjuntar PDF</h3>
            <!-- Aquí puedes implementar la funcionalidad para subir archivos -->
            <!-- Añadir un input type="file" y manejar la subida del archivo en el servidor -->
        </div>

        <!-- Derivar a especialista -->
        <div class="subsection">
            <h3>Derivar a Especialista</h3>
            <!-- Aquí puedes implementar la sección para derivar a un especialista -->
        </div>
    </div>

    <!-- Botón de Registrar -->
    <div class="section">
        <button class="button" onclick="registrarConsulta()">Registrar</button>
    </div>

    <script src="consulta.js"></script>

</body>

</html>