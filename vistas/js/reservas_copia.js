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
if($(".infoReservas").html() != undefined){

  var idCabana = $(".infoReservas").attr("idCabana");
  console.log("idCabana", idCabana);

  var fechaIngreso = $(".infoReservas").attr("fechaIngreso");
  console.log("fechaIngreso", fechaIngreso);

  var fechaSalida = $(".infoReservas").attr("fechaSalida");
  console.log("fechaSalida", fechaSalida);

  var datos = new FormData();
  datos.append("idCabana", idCabana);

  var totalEventos = [];

  var opcion1 = [];
  var validarDisponibilidad = [];

  $.ajax({

    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
     success:function(respuesta){

        if(respuesta.length == 0){

          $('#calendar').fullCalendar({
            defaultDate:fechaIngreso,
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: [
              {
                start: fechaIngreso,
                end: fechaSalida,
                rendering: 'background',
                color: '#FFCC29'
              }
            ]

          });

        }else{

          for(var i = 0; i < respuesta.length; i++){

            totalEventos.push(
              {
                "start": fechaIngreso,
                "end": fechaSalida,
                "rendering": 'background',
                "color": '#FFCC29'
              },
              {
                "start": respuesta[i]["fecha_ingreso"],
                "end": respuesta[i]["fecha_salida"],
                "rendering": 'background',
                "color": '#847059'
              }
            )
      
          }

          $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events:totalEventos

          });

        }


    }

  })

}
