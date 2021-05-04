function ec(){
    var CURP = document.getElementById("CURP").value;
    
    var sexo = CURP.substring(10,11);
    
    document.getElementById("sexo").value = sexo;

    var edocivil = document.getElementById("EstadoCivil").selectedIndex;

    document.getElementById("civil").value = edocivil;

           
    if(sexo == 'M' || sexo == 'm')
    {
        if(edocivil == "1")
        {
            document.getElementById('civil').value = "soltera";
        }
        if(edocivil == "2")
        {
            document.getElementById('civil').value = "casada";
        }
        if(edocivil == "3")
        {
            document.getElementById('civil').value = "viuda";
        }
        if(edocivil == "4")
        {
            document.getElementById('civil').value = "divorciada";
        }
    }

    if(sexo == 'H' || sexo == 'h')
    {
        if(edocivil == "1")
        {
            document.getElementById('civil').value = "soltero";
        }
        if(edocivil == "2")
        {
            document.getElementById('civil').value = "casado";
        }
        if(edocivil == "3")
        {
            document.getElementById('civil').value = "viudo";
        }
        if(edocivil == "4")
        {
            document.getElementById('civil').value = "divorciado";
        }
    }
}