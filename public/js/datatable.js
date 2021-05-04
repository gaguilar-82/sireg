$(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            {
                 extend: 'print',
                 text: 'Imprimir',
                 customize: function ( win ) {
                     $(win.document.body)
                     .css( 'font-size', '10pt' )
                     .prepend(
                         '<img src="http://sireg.test/images/sireg.png" align="right" width="200"/>'
                         );
                     
                     $(win.document.body).find( 'table' )
                     .addClass( 'compact' )
                     .css( 'font-size', 'inherit' );
                    }
            }
        ],
        responsive: true,
        autoWidth: false,

        "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Ningún resultado encontrado - disculpa",
        "info": "Mostrando la página _PAGE_ de _PAGES_",
        "infoEmpty": "No records available",
        "infoFiltered": "(filtrado de _MAX_ registros totales)",
        "search": "Buscar:",
        "Print": "Imprimir",
        "paginate": {
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
    } );
} );


/* $('#datatable').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Ningún resultado encontrado - disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        }); */