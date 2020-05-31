 $('#tabla1').DataTable( {
    rowId: 'documento',   
   select: {
            style: 'single',
             info: false
        },
    ajax: {
        url: 'datos.php',
        dataSrc: 'obras'
    },

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    columns: [
        { data: 'documento' },
        { data: 'nombre' },
        { data: 'apellido' },
    ],
    "order": [[ 2, 'desc' ]]

} );

var table = $('#tabla1').DataTable();

$('#tabla2').DataTable( {
    rowId: 'id',   
      ajax: {
        url: 'datos2.php',
        dataSrc: 'obras'
    },

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    columns: [
        { data: 'id' },
        { data: 'nombre_producto' },
        { data: 'total_producto' },
    ],
    "order": [[ 0, 'desc' ]]

} );

var table2 = $('#tabla2').DataTable();

$('#tabla4').DataTable( {
    rowId: 'id',   
  select: {
            style: 'multi',
             info: false
        },
    ajax: {
        url: 'datos2.php',
        dataSrc: 'obras'
    },

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    columns: [
        { data: 'id' },
        { data: 'nombre_producto' },
        { data: 'total_producto' },
    ],
    "order": [[ 0, 'desc' ]]

});

var table4 = $('#tabla4').DataTable();

$('#tabla3').DataTable( {
    rowId: 'numero_guia',   
    select: {
            style: 'single',
             info: false
        },
    ajax: {
        url: 'datos3.php',
        dataSrc: 'obras'
    },

        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
    columns: [
        { data: 'numero_guia' },
    ],
    "order": [[ 0, 'desc' ]]

} );

var table3 = $('#tabla3').DataTable();


$('#tabla1 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            document.getElementById('ver').disabled = true;
            document.getElementById('rechazar').disabled = true;
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
             document.getElementById('ver').disabled = false;
             document.getElementById('rechazar').disabled = false;
        }
    } );

$('#tabla3 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            document.getElementById('ver2').disabled = true;
        }
        else {
            table3.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
             document.getElementById('ver2').disabled = false;
        }
    } );


$('#ver2').click( function () {
    //en valorid guardo el id de la solicitud
    valorid=$("#tabla3 tr.selected td:first").html();

    if (typeof valorid!=='undefined'){
      document.getElementById('prueba3').innerHTML="Viendo el detalle de la solicitud nro "+valorid;
    //buscar en la table los datos de la solicitud "valorid" y devolverlos para verlos
    $.ajax({
            url: "detalle.php",
            type: "POST",
            data: {
                id: valorid,
            },
                 success : function(data) {
                document.getElementById('prueba3').innerHTML=data;
            $('#verdetalle').modal('show');
              },
        error : function(request, status, error) {
        },
        })
    }
});

$('#aprobar').click( function () {
  $('#documento').val('');
  $('#nombre').val('');
  $('#apellido').val('');
  document.getElementById('resuok').innerHTML='';
  $('#agregausuario').modal('show');
    
});


$("#dni").keydown(function(event) {
     if(event.shiftKey)
     {
          event.preventDefault();
     }
     if (event.keyCode == 46 || event.keyCode == 8)    {
     }
     else {
          if (event.keyCode < 95) {
            if (event.keyCode < 48 || event.keyCode > 57) {
                  event.preventDefault();
            }
          } 
          else {
                if (event.keyCode < 96 || event.keyCode > 105) {
                    event.preventDefault();
                }
          }
        }
     });




 $('#rechazar').click( function () {
    valorid=$("#tabla1 tr.selected td:first").html();
    if (typeof valorid!=='undefined'){
      document.getElementById('prueba2').innerHTML="¿Esta seguro de rechazar el usuario "+valorid+"?<br>Por favor complete el motivo del rechazo en el cuadro de abajo.";
      $('#quitarusuario').modal('show');
    }
 } );

$('#aguias').click( function () {
      $('#altaguia').modal('show');
});
$('#guianueva').click( function () {
 
$.ajax({
            url: "sumar.php",
            type: "POST",
            data: {
                valores: table4.rows( { selected: true } ).data().toArray(),
                },
                success : function(data) {
                  document.getElementById('contenidoguia').innerHTML=data;

                  $('#tabla3').DataTable().ajax.reload();
                },
        error : function(request, status, error) {
        },
        });
     
});

$('#finalusuario').click( function () {
event.preventDefault();
if (formausuario.reportValidity()) {
$.ajax({
            url: "destino.php",
            type: "POST",
            data: {
                id:  $('#documento').val(),
                nombre:  $('#nombre').val(),
                apellido:  $('#apellido').val(),
                valor1: "1",
                },
                success : function(data) {
                  document.getElementById('resuok').innerHTML=data;

                  $('#tabla1').DataTable().ajax.reload();
                },
        error : function(request, status, error) {
        },
        });
};
});




$('#botonrechazar').click( function () {

 valorid=$("#tabla1 tr.selected td:first").html();

$.ajax({
            url: "destino.php",
            type: "POST",
            data: {
                id: valorid,
                valor1: "2",
                motivo: $('#cat6').val(),
                  },
                success : function(data) {
                  $('#tabla1').DataTable().ajax.reload();
            },
        error : function(request, status, error) {

        },
        })

              document.getElementById('ver').disabled = true;
            document.getElementById('aprobar').disabled = false;
            document.getElementById('rechazar').disabled = true;
                        $("#cat6").val(""); 
});


