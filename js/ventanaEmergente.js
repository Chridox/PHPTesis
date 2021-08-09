const $btnVentana= document.querySelector("#btnEstadisticas");

$btnVentana.addEventListener("click", function() {
    miVentanaEmergente = window.open("http://dominio/pagina", "elNombreDeMiventana", "width=640, height=480");
      miVentanaEmergente.resizeTo(640,480);
    
});
     
  