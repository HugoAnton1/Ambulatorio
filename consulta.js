// Aquí necesitarás implementar funciones JavaScript para manejar la lógica de la página
function agregarMedicacion() {
  // Obtener el valor del medicamento desde un campo de entrada (puedes ajustar esto según tu HTML)
  var nuevoMedicamento = document.getElementById('inputMedicamento').value;

  // Verificar si el campo de entrada no está vacío
  if (nuevoMedicamento.trim() !== '') {
    // Crear un nuevo elemento de lista
    var nuevoElementoLista = document.createElement('li');

    // Asignar el valor del medicamento al elemento de lista
    nuevoElementoLista.textContent = nuevoMedicamento;

    // Obtener la lista existente donde deseas agregar el nuevo medicamento (ajusta esto según tu HTML)
    var listaMedicacion = document.getElementById('listaMedicacion');

    // Agregar el nuevo elemento de lista a la lista existente
    listaMedicacion.appendChild(nuevoElementoLista);

    // Limpiar el campo de entrada después de agregar el medicamento
    document.getElementById('inputMedicamento').value = '';
  } else {
    // Muestra un mensaje de error si el campo de entrada está vacío
    alert('Por favor, ingresa un nombre de medicamento válido.');
  }
}

function registrarConsulta() {
  // Obtener los valores del formulario (ajusta los IDs según tu HTML)
  var nombrePaciente = document.getElementById('nombrePaciente').value;
  var motivoConsulta = document.getElementById('motivoConsulta').value;
  // Otros campos...

  // Validar los datos (puedes agregar más validaciones según tus requisitos)
  if (nombrePaciente.trim() === '' || motivoConsulta.trim() === '') {
    alert('Por favor, completa todos los campos.');
    return;
  }

  // Crear un objeto con los datos de la consulta
  var datosConsulta = {
    nombrePaciente: nombrePaciente,
    motivoConsulta: motivoConsulta,
    // Otros campos...
  };

  // Realizar la solicitud AJAX (usando el objeto XMLHttpRequest o Fetch API)
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'tu_endpoint_del_servidor', true);
  xhr.setRequestHeader('Content-Type', 'application/json');

  // Convertir el objeto a JSON y enviarlo en el cuerpo de la solicitud
  var datosJSON = JSON.stringify(datosConsulta);
  xhr.send(datosJSON);

  // Manejar la respuesta del servidor (puedes agregar más lógica aquí según tus necesidades)
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (xhr.status == 200) {
        // La solicitud fue exitosa, puedes realizar acciones adicionales si es necesario
        alert('Consulta registrada exitosamente.');
      } else {
        // La solicitud falló, manejar el error
        alert('Error al registrar la consulta. Por favor, inténtalo nuevamente.');
      }
    }
  };
}

function redirigirAInicio() {
  window.location.href = 'index.html';
}