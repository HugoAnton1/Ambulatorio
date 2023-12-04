function abrirPestanaConsulta(idConsulta) {
  // Abre una nueva pestaña o ventana para la consulta específica
  window.open("consulta.php?id_consulta=" + idConsulta, "_blank");
}
function redirigirAInicio() {
  window.location.href = "index.html";
}
