function material() {
    var materialvivienda = document.getElementById('MaterialVivienda').value;
    
    if(materialvivienda != 0)
    {
        switch (materialvivienda) {
            case 'Simple': 
                            var techo = ["Lámina de cartón","Teja","Palma"];
                            var muro = ["Madera","Lámina de cartón","Bajareque","Adobe"];
                            var piso = ["Tierra"];

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
            
            case 'Mixto':
                            var techo = ["Lámina Galvanizada","Lámina de cartón","Teja","Palma"];
                            var muro = ["Tabique","Madera","Lámina de cartón","Bajareque","Adobe"];
                            var piso = ["Cemento","Tierra"];

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
            
            case 'Firme':
                            var techo = ["Concreto","Lámina Galvanizada"];
                            var muro = ["Tabique"];
                            var piso = ["Cemento"];

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