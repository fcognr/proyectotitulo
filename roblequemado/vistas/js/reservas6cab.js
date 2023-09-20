/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
	startDate: '0d',
	format: 'yyyy-mm-dd',
	todayHighlight:true
});

$('.datepicker.entrada').change(function(){

  $('.datepicker.salida').attr("readonly", false);

  var fechaEntrada = $(this).val();

	$('.datepicker.salida').datepicker({
		startDate: fechaEntrada,
		datesDisabled: fechaEntrada,
		format: 'yyyy-mm-dd',
	});

})

/*=============================================
SELECTS ANIDADOS
=============================================*/

$(".selectTipoCabana").change(function(){

  var ruta = $(this).val();

  var datos = new FormData();
  datos.append("ruta", ruta);

  $.ajax({

    url:urlPrincipal+"ajax/cabanas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

      $("input[name='ruta']").val(respuesta[0]["ruta"]);
      
      for(var i = 0; i < respuesta.length; i++){

        $("select[name='id-cabana']").append('<option value="'+respuesta[i]["id"]+'">'+respuesta[i]["tipo"]+'</option>');

      }

    }

  })

})



/*=============================================
CALENDARIO
=============================================*/

$(".selectTipoCabana").change(function(){

  var ruta = $(this).val();

  var datos = new FormData();
  datos.append("ruta", ruta);

  $.ajax({

    url:urlPrincipal+"ajax/cabanas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

      console.log("respuesta", respuesta);
      

    }

  })

})

/*=============================================
CALENDARIO
=============================================*/
if ($(".infoReservas").html() != undefined) {
  var idCabana = $(".infoReservas").attr("idCabana");
  console.log("idCabana", idCabana);

  var fechaIngreso = $(".infoReservas").attr("fechaIngreso");
  console.log("fechaIngreso", fechaIngreso);

  var fechaSalida = $(".infoReservas").attr("fechaSalida");
  console.log("fechaSalida", fechaSalida);

  var datos = new FormData();
  datos.append("idCabana", idCabana);

  var totalEventos = [];

  var opcionesPorCabana = [];

  for (var i = 0; i < 6; i++) {
    opcionesPorCabana[i] = {
      opcion1: [],
      opcion2: [],
      opcion3: [],
      validarDisponibilidad: false,
    };
  }

  $.ajax({
    url: urlPrincipal + "ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta.length == 0) {
        // Código para cuando no hay reservas previas
      } else {
        for (var i = 0; i < respuesta.length; i++) {
          for (var j = 0; j < 6; j++) {
            // Validar cruces de fechas para cada cabaña
            opcionesPorCabana[j].opcion1[i] =
              fechaIngreso == respuesta[i]["fecha_ingreso"] && idCabana == j;

            opcionesPorCabana[j].opcion2[i] =
              fechaIngreso > respuesta[i]["fecha_ingreso"] &&
              fechaIngreso < respuesta[i]["fecha_salida"] &&
              idCabana == j;

            opcionesPorCabana[j].opcion3[i] =
              fechaIngreso < respuesta[i]["fecha_ingreso"] &&
              fechaSalida > respuesta[i]["fecha_ingreso"] &&
              idCabana == j;

            // Validar disponibilidad para cada cabaña
            opcionesPorCabana[j].validarDisponibilidad =
              opcionesPorCabana[j].opcion1[i] ||
              opcionesPorCabana[j].opcion2[i] ||
              opcionesPorCabana[j].opcion3[i]
                ? false
                : true;
          }
        }

        var todasLasCabaniasDisponibles = opcionesPorCabana.every(
          function (cabana) {
            return cabana.validarDisponibilidad;
          }
        );

        if (todasLasCabaniasDisponibles) {
          totalEventos.push(
            {
              start: fechaIngreso,
              end: fechaSalida,
              rendering: "background",
              color: "blue",
            }
          );
        } else {
          for (var j = 0; j < 6; j++) {
            if (!opcionesPorCabana[j].validarDisponibilidad) {
              totalEventos.push(
                {
                  start: respuesta[j]["fecha_ingreso"],
                  end: respuesta[j]["fecha_salida"],
                  rendering: "background",
                  color: "#222222",
                }
              );
              $(".infoDisponibilidad").html(
                '<h5 class="pb-5 float left">¡Lo sentimos, no hay disponibilidad para esa fecha en la cabaña ' +
                  j +
                  '! :( Selecciona una nueva fecha.</h5>'
              );

              colDerReservas();

              break;
            }
          }
        }

        $('#calendar').fullCalendar({
          header: {
            left: "prev",
            center: "title",
            right: "next",
          },
          events: totalEventos,
        });
      }
    },
  });
}

/*=============================================
FUNCION CREAR CODIGO RESERVA
=============================================*/

var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

function codigoAleatorio(chars, length){

  codigo = "";

  for(var i = 0; i < length; i++){

    rand = Math.floor(Math.random()*chars.length);
    codigo += chars.substr(rand, 1);
  }

  return codigo;

}



/*=============================================
FUNCION COLUMNA DERECHA
=============================================*/

function colDerReservas(){

  $(".colDerReservas").show();

  var codigoReserva = codigoAleatorio(chars, 9);

  var datos = new FormData();
  datos.append("codigoReserva", codigoReserva);

  $.ajax({
    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

      if(!respuesta){

        $(".codigoReserva").html(codigoReserva);

      }else{

        $(".codigoReserva").html(codigoReserva+codigoAleatorio(chars, 3));
      }
    }






  })
  




  }