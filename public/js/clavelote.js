function procesar() {
    var guion = '-';
    var manzana = document.getElementById('Manzana').value;
    var numlote = document.getElementById('NumLote').value;
    var clavecolonia= document.getElementById('colonias_id').value;

    var clave = clavecolonia.concat(guion);
    var clave = clave.concat(manzana);
    var clave = clave.concat(numlote);

    document.getElementById('clavelote').value = clave;
}