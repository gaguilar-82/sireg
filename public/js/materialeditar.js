function materialeditar() {
    var materialvivienda = document.getElementById('MaterialVivienda').value;
    document.getElementById('MaterialPiso').disabled = false;
    document.getElementById('MaterialTecho').disabled = false;
    document.getElementById('MaterialMuros').disabled = false;
    
    if(materialvivienda != 0)
    {
        switch (materialvivienda) {
            case 'SIMPLE': 
                            var techo = ["LÁMINA DE CARTÓN","PALMA"];
                            var muro = ["MADERA","LÁMINA DE CARTÓN","BAJAREQUE","ADOBE"];
                            var piso = ["TIERRA"];

                            num_techo = techo.length;
                            document.f1.MaterialTecho.length = num_techo;

                            num_muro = muro.length;
                            document.f1.MaterialMuros.length = num_muro;

                            num_piso = piso.length;
                            document.f1.MaterialPiso.length = num_piso;


                            for(i=0;i<num_techo;i++){
                                document.f1.MaterialTecho.options[i].value=techo[i];
                                document.f1.MaterialTecho.options[i].text=techo[i];
                            }

                            for(i=0;i<num_muro;i++){
                                document.f1.MaterialMuros.options[i].value=muro[i];
                                document.f1.MaterialMuros.options[i].text=muro[i];
                            }

                            for(i=0;i<num_piso;i++){
                                document.f1.MaterialPiso.options[i].value=piso[i];
                                document.f1.MaterialPiso.options[i].text=piso[i];
                            }
            break;
            
            case 'MIXTO':
                            var techo = ["LÁMINA GALVANIZADA","LÁMINA DE CARTÓN","TEJA","PALMA"];
                            var muro = ["TABIQUE","MADERA","LÁMINA DE CARTÓN","BAJAREQUE","ADOBE"];
                            var piso = ["CEMENTO","TIERRA"];

                            num_techo = techo.length;
                            document.f1.MaterialTecho.length = num_techo;

                            num_muro = muro.length;
                            document.f1.MaterialMuros.length = num_muro;

                            num_piso = piso.length;
                            document.f1.MaterialPiso.length = num_piso;


                            for(i=0;i<num_techo;i++){
                                document.f1.MaterialTecho.options[i].value=techo[i];
                                document.f1.MaterialTecho.options[i].text=techo[i];
                            }

                            for(i=0;i<num_muro;i++){
                                document.f1.MaterialMuros.options[i].value=muro[i];
                                document.f1.MaterialMuros.options[i].text=muro[i];
                            }

                            for(i=0;i<num_piso;i++){
                                document.f1.MaterialPiso.options[i].value=piso[i];
                                document.f1.MaterialPiso.options[i].text=piso[i];
                            }
            break;
            
            case 'FIRME':
                            var techo = ["CONCRETO","LÁMINA GALVANIZADA"];
                            var muro = ["TABIQUE"];
                            var piso = ["CEMENTO"];

                            num_techo = techo.length;
                            document.f1.MaterialTecho.length = num_techo;

                            num_muro = muro.length;
                            document.f1.MaterialMuros.length = num_muro;

                            num_piso = piso.length;
                            document.f1.MaterialPiso.length = num_piso;


                            for(i=0;i<num_techo;i++){
                                document.f1.MaterialTecho.options[i].value=techo[i];
                                document.f1.MaterialTecho.options[i].text=techo[i];
                            }

                            for(i=0;i<num_muro;i++){
                                document.f1.MaterialMuros.options[i].value=muro[i];
                                document.f1.MaterialMuros.options[i].text=muro[i];
                            }

                            for(i=0;i<num_piso;i++){
                                document.f1.MaterialPiso.options[i].value=piso[i];
                                document.f1.MaterialPiso.options[i].text=piso[i];
                            }
            break;
        }
    }
    else{
        document.f1.MaterialTecho.options[0].text="--Seleccione el material--";
        document.f1.MaterialMuros.options[0].text="--Seleccione el material--";
        document.f1.MaterialPiso.options[0].text="--Seleccione el material--";
    }
}