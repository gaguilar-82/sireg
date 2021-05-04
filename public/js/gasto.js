function CalcularGasto(){
    var alimentacion = document.getElementById("GastoAlimentacion").value;
    var salud = document.getElementById("GastoSalud").value;
    var educacion = document.getElementById("GastoEducacion").value;
    var otros = document.getElementById("GastoOtros").value;

    var total = parseFloat(alimentacion) + parseFloat(salud) + parseFloat (educacion) + parseFloat(otros);

    document.getElementById("GastoTotal").value = total;
}