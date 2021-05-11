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
            document.getElementById('civil').value = "SOLTERA";
        }
        if(edocivil == "2")
        {
            document.getElementById('civil').value = "CASADA";
        }
        if(edocivil == "3")
        {
            document.getElementById('civil').value = "VIUDA";
        }
        if(edocivil == "4")
        {
            document.getElementById('civil').value = "DIVORCIADA";
        }
    }

    if(sexo == 'H' || sexo == 'h')
    {
        if(edocivil == "1")
        {
            document.getElementById('civil').value = "SOLTERO";
        }
        if(edocivil == "2")
        {
            document.getElementById('civil').value = "CASADO";
        }
        if(edocivil == "3")
        {
            document.getElementById('civil').value = "VIUDO";
        }
        if(edocivil == "4")
        {
            document.getElementById('civil').value = "DIVORCIADO";
        }
    }
}