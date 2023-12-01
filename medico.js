function abrirPestanaConsulta(idCita) {
  // Abre una nueva pestaña o ventana para la consulta específica
  window.open("consulta.php?id_cita=" + idCita, "_blank");
}
function redirigirAInicio() {
  window.location.href = "index.html";
}
