function procesar() {

    var guion = '-';
    var delegacion = document.getElementById('municipios_id').value;
    var tipo = document.getElementById('TipoColonia').value;
    var parcialcolonia = document.getElementById('ParcialColonia').value;

    switch (delegacion) {
        case '1': delegacion = 'DA';
        break;

        case '2': delegacion = 'DTC';
        break;

        case '3': delegacion = 'DN';
        break;

        case '4': delegacion = 'DTC';
        break;

        case '5': delegacion = 'DCG';
        break;

        case '6': delegacion = 'DCC';
        break;

        case '7': delegacion = 'DC';
        break;

        case '8': delegacion = 'DC';
        break;

        case '9': delegacion = 'DTC';
        break;

        case '10': delegacion = 'DN';
        break;

        case '11': delegacion = 'DN';
        break;

        case '12': delegacion = 'DCG';
        break;

        case '13': delegacion = 'DCC';
        break;

        case '14': delegacion = 'DTC';
        break;

        case '15': delegacion = 'DN';
        break;

        case '16': delegacion = 'DCC';
        break;

        case '17': delegacion = 'DCG';
        break;

        case '18': delegacion = 'DN';
        break;

        case '19': delegacion = 'DC';
        break;

        case '20': delegacion = 'DTC';
        break;

        case '21': delegacion = 'DM';
        break;

        case '22': delegacion = 'DCG';
        break;
    }
    
    switch (tipo) {
        case 'Patrimonio INVISUR': tipo = 'IVS';
        break;

        case 'Patrimonio CRETT': tipo = 'CRT';
        break;

        case 'Barrios Históricos': tipo = 'BH';
        break;

        case 'Donación Condicional': tipo = 'DN';
        break;

        case 'Parque Nacional El Veladero': tipo = 'PNV';
        break;
    }

    var clave = delegacion.concat(guion);
    var clave = clave.concat(tipo);
    var clave = clave.concat(parcialcolonia);

    document.getElementById('ClaveColonia').value = clave;
}