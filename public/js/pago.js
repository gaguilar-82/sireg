function SelAsignado() {
    var idAsignado = document.getElementById("Asig1").innerText;
    parseInt(idAsignado);
    var nombre = document.getElementById("Asig6").innerHTML;
    var contrato = document.getElementById("Asig5").innerHTML;

    document.getElementById("asignados_id").value = idAsignado;
    document.getElementById("Nombre").value = nombre;
    document.getElementById("ClaveContrato").value = contrato;           
}