<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Escritura</title>
    <style>
        body{
            margin-left: 60px;
            margin-right: 60px;
            margin-top: 100px;
            margin-bottom: 60px;
        }
        .folio {
            text-align: right;
        }
        .contenido {
            text-align: justify;
            text-justify: inter-word;
        }
        .titulos{
            text-align: center;
        }
        table{
            table-layout: fixed;
            margin: auto;
            width: 600px;
        }
        th, td {
            width: 300px;
            height: 100px;
            text-align: center;
            word-wrap: break-word;
        }
        footer {
                position: fixed; 
                bottom: -20px; 
                left: 0px; 
                right: 0px;
                height: 50px;
                text-align: center;
        }
    </style>

</head>
<body>
    <div class="folio">
        <p><strong>TÍTULO DE PROPIEDAD No. {{$escritura->FolioEscritura}}</strong></p>
    </div>
    <div class="contenido">
        <p>
            TÍTULO DE PROPIEDAD QUE OTORGA EL INSTITUTO DE VIVIENDA Y SUELO URBANO DE GUERRERO, REPRESENTADO EN ESTE ACTO 
            POR EL <strong>LIC. {{strtoupper($escritura->directors->NombreDirector)}}  {{strtoupper($escritura->directors->ApellidoPaternoDirector)}} {{strtoupper($escritura->directors->ApellidoMaternoDirector)}}</strong>,
            EN SU CARÁCTER DE DIRECTOR GENERAL DEL INSTITUTO DE VIVIENDA Y SUELO URBANO DE GUERRERO, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ 
            <strong>“EL INVISUR”</strong>, A FAVOR DE EL (LA) <strong>C. {{strtoupper($escritura->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($escritura->asignados->posesionarios->ApellidoPaterno)}} 
            {{strtoupper($escritura->asignados->posesionarios->ApellidoMaterno)}}</strong>, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ "EL (LA) BENEFICIARIO(A)", 
            DE CONFORMIDAD CON LO QUE ESTABLECEN LOS ARTÍCULOS 1662, 1664, 2250, 2881, 2913 Y DEMÁS APLICABLES DEL CÓDIGO CIVIL VIGENTE EN EL ESTADO DE GUERRERO.
        </p>
    </div>
    <div class="titulos">
        <strong>ANTECEDENTES</strong>
    </div>
    <div class="contenido">
        <p>
            <strong>I.- TÍTULO DE PROPIEDAD.</strong><br>
            {{$escritura->asignados->lotes->colonias->TituloPropiedad}}<br>
            <strong>II.- LOTIFICACIÓN.</strong><br>
            {{$escritura->asignados->lotes->colonias->Lotificacion}}<br>
            <strong>III.-</strong>{{$escritura->asignados->lotes->colonias->SuperficieAdquirida}}
        </p>
    </div>
    <div class="titulos">
        <strong>DECLARACIONES</strong>
    </div>
    <div class="contenido">
        <p>
            <strong>I.- DECLARA  “EL  INVISUR”.</strong><br>
            <strong>I.1.-</strong>QUE ES UN ORGANISMO PÚBLICO DESCENTRALIZADO DEL GOBIERNO DEL ESTADO, CON PERSONALIDAD JURÍDICA PATRIMONIO PROPIO, QUE FUE 
            LEGALMENTE CREADO MEDIANTE DECRETO DE FECHA CUATRO DE JUNIO DE 1987, PUBLICADO EN EL PERIÓDICO OFICIAL DEL GOBIERNO DEL ESTADO DE GUERRERO, EL DÍA 
            DOCE DEL MISMO MES Y AÑO, CONSTITUIDO CONFORME A LA LEY DE VIVIENDA SOCIAL Y DE FRACCIONAMIENTO POPULARES, DESDE EL SEIS DE JUNIO DE 1989; TENIENDO 
            VIGENCIA PARA TALES EFECTOS LA LEY DE VIVIENDA SOCIAL PARA EL ESTADO DE GUERRERO NUMERO 573, VIGENTE A PARTIR DEL DÍA QUINCE DE DICIEMBRE DEL 2004.<br>
            <strong>I.2.-</strong>QUE SE ENCUENTRA DEBIDAMENTE REPRESENTADO EN ESTE ACTO POR EL <strong>LIC. {{strtoupper($escritura->directors->NombreDirector)}}  
            {{strtoupper($escritura->directors->ApellidoPaternoDirector)}} {{strtoupper($escritura->directors->ApellidoMaternoDirector)}}</strong>, EN SU CARÁCTER 
            DE DIRECTOR GENERAL DEL INSTITUTO DE VIVIENDA Y SUELO URBANO DE GUERRERO, (INVISUR), QUIEN EJERCE EN TÉRMINOS DEL ARTÍCULO 30 FRACCIÓN III, DE LA LEY 
            DE VIVIENDA SOCIAL DEL ESTADO DE GUERRERO NUMERO 573, VIGENTE EN EL ESTADO, LA REPRESENTACIÓN LEGAL DEL INSTITUTO, SE ACREDITA CON EL NOMBRAMIENTO DE 
            FECHA {{strtoupper(\Carbon\Carbon::parse($escritura->directors->FechaNombramiento)->formatLocalized('%d de %B de %Y'))}} EXPEDIDO POR EL LICENCIADO 
            {{strtoupper($escritura->directors->ExpedidoPor)}}, Y SU RESPECTIVA ACTA DE PROTESTA; PROTOCOLIZADA EN ACTA PÚBLICA {{strtoupper($escritura->directors->ActaPublica)}}, 
            ASÍ COMO DE CONFORMIDAD CON LAS FACULTADES QUE LE CONFIERE LA LEY DE VIVIENDA SOCIAL DEL ESTADO DE GUERRERO NÚMERO 573, PUBLICADA EN EL PERIÓDICO 
            OFICIAL DEL GOBIERNO DEL ESTADO NÚMERO 102, DE FECHA CATORCE DE DICIEMBRE DEL AÑO DOS MIL CUATRO.<br>
            <strong>I.3.-</strong> QUE DENTRO DE SUS FUNCIONES SE ENCUENTRA LA DE PROMOVER Y EJECUTAR LAS ACCIONES QUE EN  MATERIA DE VIVIENDA DE INTERÉS SOCIAL 
            Y FRACCIONAMIENTOS POPULARES TIENE ASIGNADAS EL GOBIERNO DEL ESTADO A TRAVÉS DE LA SECRETARÍA DE DESARROLLO URBANO Y OBRAS PÚBLICAS, DENTRO DE LOS 
            CUALES SE ENCUENTRAN LOS PLANES Y PROGRAMAS TENDIENTES A SATISFACER LA DEMANDA DE VIVIENDA Y SUELO DE USO HABITACIONAL, ASÍ COMO ENAJENAR Y ARRENDAR 
            INMUEBLES Y VIVIENDAS DE INTERÉS POPULAR Y SOCIAL QUE FORMAN PARTE DE SU PATRIMONIO Y DEL DOMINIO PRIVADO DEL ESTADO, DERIVADA DE LOS PROGRAMAS RESPECTIVOS 
            DE VIVIENDA SOCIAL Y FRACCIONAMIENTOS POPULARES, REGULAR SU MERCADO, REGULARIZAR LA TENENCIA DE LA TIERRA CON FINES HABITACIONALES, ENTRE OTROS, SEGÚN 
            LO DISPONEN LOS ARTÍCULOS 20 Y 21 FRACCIONES IX, X, XII Y XVIII DE LA LEY DE VIVIENDA SOCIAL VIGENTE EN EL ESTADO DE GUERRERO NÚMERO 573 Y, ARTÍCULOS 
            128 Y 129 DE LA LEY NUMERO 790 DE ASENTAMIENTOS HUMANOS, ORDENAMIENTO TERRITORIAL Y DESARROLLO URBANO DEL ESTADO DE GUERRERO.<br>
            <strong>I.4.-</strong>QUE ES PROPIETARIO DEL LOTE <strong>{{$escritura->asignados->lotes->NumLote}}</strong>, DE LA MANZANA <strong>{{$escritura->asignados->lotes->Manzana}}</strong>,
            DEL FRACCIONAMIENTO <strong>"{{strtoupper($escritura->asignados->lotes->colonias->NombreColonia)}}"</strong> DEL MUNICIPIO DE {{strtoupper($escritura->asignados->lotes->colonias->municipios->NombreMunicipio)}}, 
            GUERRERO, LA CUAL FORMA PARTE DEL PREDIO SEÑALADO EN EL PUNTO <strong>I.</strong> DEL CAPÍTULO DE ANTECEDENTES DEL PRESENTE INSTRUMENTO JURÍDICO, CON UNA SUPERFICIE DE 
            <strong>{{number_format($escritura->asignados->lotes->Superficie,2,'.',',')}} METROS CUADRADOS</strong>, QUE SE IDENTIFICA CON LAS MEDIDAS Y COLINDANCIAS 
            SIGUIENTES:<br>
            <strong>
                {{$escritura->asignados->lotes->Colindancia1}}<br>
                {{$escritura->asignados->lotes->Colindancia2}}<br>
                {{$escritura->asignados->lotes->Colindancia3}}<br>
                {{$escritura->asignados->lotes->Colindancia4}}<br>
            </strong>
            <strong>I.5.-</strong> QUE EL LOTE DESCRITO EN LA DECLARACIÓN QUE ANTECEDE SE ENCUENTRA LIBRE DE TODO GRAVAMEN Y LIMITACIÓN DE DOMINIO, EN VIRTUD DE 
            HABERLO ADQUIRIDO EXCLUSIVAMENTE PARA LA REGULARIZACIÓN DE LA TENENCIA DE LA TIERRA, EN CUMPLIMIENTO A SUS FINES SOCIALES.<br>
            <strong>II.- DECLARA  "EL (LA) BENEFICIARIO(A)”</strong>,<br>
            <strong>II. 1.-</strong> QUE TIENE  CAPACIDAD LEGAL PARA CONTRATAR Y OBLIGARSE EN TÉRMINOS DEL 
            PRESENTE INSTRUMENTO JURÍDICO.<br>
            <strong>II.2.-</strong> QUE ES SU VOLUNTAD ADQUIRIR A TÍTULO DE PROPIEDAD, EL LOTE <strong>{{$escritura->asignados->lotes->NumLote}}</strong> DE LA MANZANA
            <strong>{{$escritura->asignados->lotes->Manzana}}</strong>, DEL FRACCIONAMIENTO <strong>"{{strtoupper($escritura->asignados->lotes->colonias->NombreColonia)}}"</strong>
            EL CUAL YA HABITA Y HA CUBIERTO OPORTUNAMENTE SU IMPORTE A “EL INVISUR”, ASÍ COMO EL PAGO DE DERECHOS POR CONCEPTO DE ESCRITURACIÓN.<br>
            <strong>III.- OBJETO DEL PRESENTE INSTRUMENTO JURÍDICO.-</strong> OTORGAR EL TITULO QUE ACREDITA LOS DERECHOS DE PROPIEDAD A "EL (LA) BENEFICIARIO(A)”, 
            EN VIRTUD DE HABER CUMPLIDO ANTE “EL INVISUR” CON LOS REQUISITOS QUE ESTABLECE LA LEY DE VIVIENDA SOCIAL DEL ESTADO DE GUERRERO NÚMERO 573.
        </p>
    </div>
    <div class="titulos">
        <strong>CLAÚSULAS</strong>
    </div>
    <div class="contenido">
        <p>
            <strong>PRIMERA.-</strong> “EL INVISUR” OTORGA EL TÍTULO DE PROPIEDAD A "<strong>EL (LA) BENEFICIARIO(A)"</strong>, DEL LOTE <strong>{{$escritura->asignados->lotes->NumLote}}</strong>,
            MANZANA <strong>{{$escritura->asignados->lotes->Manzana}}</strong> DEL FRACCIONAMIENTO <strong>"{{strtoupper($escritura->asignados->lotes->colonias->NombreColonia)}}"</strong> 
            DEL MUNICIPIO DE {{strtoupper($escritura->asignados->lotes->colonias->municipios->NombreMunicipio)}}, GUERRERO, DESCRITO EN LA DECLARACIÓN I.4., DE ESTE INSTRUMENTO, 
            QUE SE TIENE AQUÍ POR REPRODUCIDA COMO SI A LA LETRA SE INSERTASE.<br>
            <strong>SEGUNDA.- "EL (LA) BENEFICIARIO(A)"</strong>, TIENE POR RECIBIDO EL LOTE MOTIVO DEL PRESENTE INSTRUMENTO A SU ENTERA SATISFACCIÓN DE PARTE DE “EL INVISUR”, 
            POR HABER ENTRADO EN POSESIÓN USO Y DISFRUTE CON ANTERIORIDAD A ESTE ACTO, LOS TRAMITES Y GASTOS POR CONCEPTO DE REGISTRO EN CATASTRO SERÁN POR CUENTA EXCLUSIVA DE 
            <strong>“EL (LA) BENEFICIARIO (A)”</strong>, LA INSCRIPCIÓN EN EL REGISTRO PUBLICO DE LA PROPIEDAD, SERÁ A CARGO DE <strong>“EL INVISUR”</strong>.<br>
            <strong>TERCERA.- EL “(LA) BENEFICIARIO(A)” </strong>, SE OBLIGA A SUJETARSE A LAS RESTRICCIONES DE CONSTRUCCIÓN DE LOS PROYECTOS DE DESARROLLO DE LA ZONA QUE INCIDAN 
            SEGÚN EL PLAN REGULADOR O LOS PROYECTOS QUE SE REALICEN PARA BENEFICIO DE LA COMUNIDAD.<br>
            <strong>CUARTA.-</strong> LAS PARTES CONVIENEN, QUE <strong>"EL (LA) BENEFICIARIO (A)" </strong> DEBERÁ CONSTITUIR EL PRESENTE BIEN INMUEBLE COMO PATRIMONIO FAMILIAR 
            CON TODAS LAS PRERROGATIVAS Y LIMITACIONES PROPIAS DE ESA INSTITUCIÓN JURÍDICA, COMO LO DISPONEN LOS ARTÍCULOS 96 DE LA LEY DE VIVIENDA SOCIAL DEL ESTADO DE GUERRERO 
            NÚMERO 573; Y 641 Y 643 DEL CÓDIGO CIVIL VIGENTE EN EL ESTADO.<br>
            <strong>QUINTA.-</strong> LAS PARTES CONVIENEN QUE EN EL CASO DE QUE EL BENEFICIARIO, DESEE ENAJENAR O CEDER LOS DERECHOS DEL INMUEBLE OBJETO DE ESTE INSTRUMENTO, 
            "EL INVISUR" GOZARA DEL DERECHO DEL TANTO, DE CONFORMIDAD CON LO DISPUESTO POR EL ARTICULO 94 DE LA LEY DE VIVIENDA SOCIAL DEL ESTADO DE GUERRERO NUMERO 573, ESTANDO 
            SUJETOS A LAS MODALIDADES EN QUE FUE ADQUIRIDO.<br>
            <strong>SEXTA.-</strong> LAS PARTES MANIFIESTAN QUE EN EL PRESENTE INSTRUMENTO NO EXISTE ERROR, DOLO, COACCIÓN, MALA FE O CUALQUIER OTRO VICIO DEL CONSENTIMIENTO QUE 
            PUDIERA INVALIDARLO Y QUE EN ESTE ACTO SE TRANSMITE LA PROPIEDAD DEL TERRENO,  EN VIRTUD DE QUE EL BENEFICIARIO CON ANTERIORIDAD DETENTA LA POSESIÓN DEL MISMO.---<br>
            <strong>SÉPTIMA.-</strong> LAS PARTES SE SOMETEN PARA LA INTERPRETACIÓN Y CUMPLIMIENTO DE ESTE INSTRUMENTO A LAS LEYES Y TRIBUNALES DEL ESTADO DE GUERRERO, RENUNCIANDO 
            A CUALQUIER OTRO QUE PUDIERA CORRESPONDERLES POR RAZÓN DE SU DOMICILIO PRESENTE O FUTURO.<br>           
        </p>
    </div>
    <div class="titulos">
        <strong>GENERALES</strong>
    </div>
    <div class="contenido">
        <p>
            EL <strong>LIC. {{strtoupper($escritura->directors->NombreDirector)}}  {{strtoupper($escritura->directors->ApellidoPaternoDirector)}} {{strtoupper($escritura->directors->ApellidoMaternoDirector)}}</strong>
            ES ORIGINARIO DE <strong>{{strtoupper($escritura->directors->LugarNacimientoDirector)}}</strong>, DONDE NACIÓ EL <strong>DÍA {{strtoupper(\Carbon\Carbon::parse($escritura->directors->FechaNacimientoDirector)->formatLocalized('%d de %B de %Y'))}}</strong>,
            ESTADO CIVIL  <strong>{{strtoupper($escritura->directors->EstadoCivilDirector)}}</strong>, CON INSTRUCCIÓN PROFESIONAL Y DE OCUPACIÓN <strong>SERVIDOR PÚBLICO</strong>, CON DOMICILIO OFICIAL EN <strong>CARRETERA NACIONAL MÉXICO-ACAPULCO KM. 272.5 DE LA 
            CIUDAD DE CHILPANCINGO, GUERRERO</strong>, MISMO QUE SEÑALA PARA LOS EFECTOS DE OÍR Y RECIBIR NOTIFICACIONES, Y SE IDENTIFICA CON CREDENCIAL DE ELECTOR EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL CON FOLIO {{$escritura->directors->FolioINE}} Y AL CORRIENTE EN EL PAGO DE SUS IMPUESTOS SIN ACREDITARLO.<br>
            EL (LA) <strong>C. {{strtoupper($escritura->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($escritura->asignados->posesionarios->ApellidoPaterno)}} {{strtoupper($escritura->asignados->posesionarios->ApellidoMaterno)}}</strong>
            ES ORIGINARIO (A) DE <strong>{{strtoupper($escritura->asignados->posesionarios->LugarNacimiento)}}, MÉXICO,</strong> DONDE NACIÓ EL DIA {{strtoupper(\Carbon\Carbon::parse($escritura->asignados->posesionarios->FechaNacimiento)->formatLocalized('%d de %B de %Y'))}}</strong>,
            CON DOMICILIO EN <strong>{{$escritura->asignados->posesionarios->Domicilio}}</strong>, ESTADO CIVIL <strong>{{strtoupper($escritura->asignados->posesionarios->EstadoCivil)}}</strong>,
            OCUPACION <strong>{{strtoupper($escritura->asignados->posesionarios->Ocupacion)}}</strong>, Y SE IDENTIFICA CON CREDENCIAL DE ELECTOR EXPEDIDA POR EL INSTITUTO NACIONAL ELECTORAL CON FOLIO {{$escritura->asignados->posesionarios->FolioIdentificacion}}, MANIFESTANDO ENCONTRARSE AL CORRIENTE DE SUS IMPUESTOS SIN ACREDITARLO.<br>
        </p>
        <p>
            LEÍDO QUE FUE EL PRESENTE INSTRUMENTO POR  LAS PARTES QUE INTERVIENEN  Y ENTERADAS DE SU CONTENIDO Y ALCANCE LEGAL, LO FIRMAN DE CONFORMIDAD, EN LA CIUDAD DE <strong>{{strtoupper($escritura->asignados->lotes->colonias->municipios->NombreMunicipio)}}, GUERRERO</strong>, 
            EL DÍA {{strtoupper(\Carbon\Carbon::parse($escritura->FechaEscritura)->formatLocalized('%d de %B de %Y'))}}.
        </p>
    </div>
    <div>
        <table class="firmas">
            <thead>
                <tr>
                    <th><strong>POR EL INVISUR</strong></th>
                    <th><strong>POR “EL (LA) BENEFICIARIO(A)”</strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>LIC. {{strtoupper($escritura->directors->NombreDirector)}}  {{strtoupper($escritura->directors->ApellidoPaternoDirector)}} {{strtoupper($escritura->directors->ApellidoMaternoDirector)}}</strong></td>
                    <td><strong>C. {{strtoupper($escritura->asignados->posesionarios->NombrePosesionario)}} {{strtoupper($escritura->asignados->posesionarios->ApellidoPaterno)}} {{strtoupper($escritura->asignados->posesionarios->ApellidoMaterno)}}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer>
        <img src="data:image/svg;base64, {{base64_encode(QrCode::format('svg')->size(50)->encoding('UTF-8')->errorCorrection('H')->generate($escritura->FolioEscritura))}}">
    </footer>

</body>
</html>