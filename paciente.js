// Lógica para validar la fecha y enviar la solicitud de cita
// Puedes implementar esta lógica utilizando JavaScript y/o enviar datos a un servidor.
var selectedDate = document.getElementById("fecha").value;
var currentDate = new Date().toISOString().split("T")[0];

if (selectedDate < currentDate) {
  document.getElementById("fecha-error").innerText = "Fecha no válida.";
} else {
  // Lógica para enviar la solicitud de cita al servidor
  alert("Solicitud de cita enviada con éxito.");
}
function redirigirAInicio() {
  window.location.href = "index.html";
}