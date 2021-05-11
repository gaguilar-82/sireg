function SelPosesionario() {
    var idPosesionario = document.getElementById("Pos1").innerText;
    parseInt(idPosesionario);
    var nombre = document.getElementById("Pos2").innerHTML;
    document.getElementById("posesionario_id").value = idPosesionario;
    document.getElementById("Nombre").value = nombre;          
}

function SelLote() {
    var idLote = document.getElementById("Lote1").innerText;
    parseInt(idLote);
    var claveColonia = document.getElementById("Lote2").innerText;
    var nombreColonia = document.getElementById("Lote3").innerText;
    var manzana =  document.getElementById("Lote5").innerText;
    var numLote = document.getElementById("Lote6").innerText;
    var superficie = document.getElementById("Lote7").innerText;
    var valor = document.getElementById("Lote8").innerText;

    var nombrelote = nombreColonia.concat(" MANZANA ");
    nombrelote = nombrelote.concat(manzana);
    nombrelote = nombrelote.concat(" LOTE ");
    nombrelote = nombrelote.concat(numLote);

    var claveContrato = claveColonia.concat('-');
    var claveContrato = claveContrato.concat(manzana);
    var claveContrato = claveContrato.concat(numLote);

    var costolote = parseFloat(superficie) * parseFloat(valor);

    document.getElementById("lote_id").value = idLote;
    
    document.getElementById("NombreLote").value = nombrelote;
    
    document.getElementById("CostoLote").value = costolote;
    
    document.getElementById("ClaveContrato").value = claveContrato;
}