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
  var opcion2 = [];
  var opcion3 = [];
  var validarDisponibilidad = false;

  $.ajax({

    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
     success:function(respuesta){

      console.log("respuesta", respuesta);

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

          colDerReservas();

        }else{

          for(var i = 0; i < respuesta.length; i++){

            /*VALIDAR CRUCE DE FECHAS */


            /*Si la fecha de ingreso que selecciona el cliente es igual a la fecha de ingreso 
            de una reserva ya realizada (respuesta = bdd)*/

            if(fechaIngreso == respuesta[i]["fecha_ingreso"]){

              opcion1[i] = false;

            }else{

              opcion1[i] = true;

            }

            /*VALIDAR CRUCE DE FECHAS */


            /*Si la fecha de ingreso que selecciona el cliente es mayor a la fecha de ingreso 
            de una reserva ya realizada y menor a la fecha de termino (respuesta = bdd)*/

            if(fechaIngreso > respuesta[i]["fecha_ingreso"] && fechaIngreso < respuesta[i]["fecha_salida"]){

              opcion2[i] = false;

            }else{

              opcion2[i] = true;

            }

            /*VALIDAR CRUCE DE FECHAS */


            /*Si la fecha de ingreso que selecciona el cliente es anterior a la fecha de ingreso 
            de una reserva ya realizada y la salida es despues a la fecha de ingreso de una reserva realizada (respuesta = bdd)*/

            if(fechaIngreso < respuesta[i]["fecha_ingreso"] && fechaSalida > respuesta[i]["fecha_ingreso"]){

              opcion3[i] = false;

            }else{

              opcion3[i] = true;

            }

            //console.log("opcion1[i]", opcion1[i]);
            //console.log("opcion2[i]", opcion2[i]);
            //console.log("opcion3[i]", opcion3[i]);

            /*VALIDAR DISPONIBILIDAD */

            if(opcion1[i] == false || opcion2[i] == false || opcion3[i] == false){

              validarDisponibilidad = false;

            }else{

              validarDisponibilidad = true;
            }

            //console.log("validarDisponibilidad", validarDisponibilidad);

            if(!validarDisponibilidad){

              totalEventos.push(
                {
                  "start": respuesta[i]["fecha_ingreso"],
                  "end": respuesta[i]["fecha_salida"],
                  "rendering": 'background',
                  "color": '#222222'
                }
              )
              $(".infoDisponibilidad").html('<h5 class="pb-5 float left">¡Lo sentimos, no hay disponibilidad para esa fecha! :( Selecciona una nueva fecha.</h5>');

              break;

            }else{

              totalEventos.push(
                {
                  "start": respuesta[i]["fecha_ingreso"],
                  "end": respuesta[i]["fecha_salida"],
                  "rendering": 'background',
                  "color": '#222222'
                }
              )
              $(".infoDisponibilidad").html('<h1 class="pb-5">¡Está Disponible!</h1>');

              colDerReservas();
            }

          }
          //FIN CICLO FOR

          if(validarDisponibilidad){
            totalEventos.push(
              {
                "start": fechaIngreso,
                "end": fechaSalida,
                "rendering": 'background',
                "color": 'blue'
              }
            )
          }
          

          $('#calendar').fullCalendar({
            defaultDate: fechaIngreso,
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
         $(".pagarReserva").attr("codigoReserva",codigoReserva );

       }else{

          $(".codigoReserva").html(codigoReserva+codigoAleatorio(chars, 2));
          $(".pagarReserva").attr("codigoReserva",codigoReserva+codigoAleatorio(chars, 2));

       }

      /*=============================================
      FUNCION COLUMNA DERECHA
      =============================================*/

      $(".horasTinaja").change(function() {

        // Separa los valores en precio total y horas adicionales
        var valores = $(this).val().split(",");
        var precioTotal = parseFloat(valores[0]);

        // Calcula el nuevo precio total sumando el precio base y las horas adicionales
        var nuevoPrecioTotal = precioTotal + parseFloat(valores[1]);

        var horasString = valores[2];

        var precioTotalFormateado = nuevoPrecioTotal.toFixed(0); // Ajusta el formato decimal si es necesario
        $(".precioTotal span").text(precioTotalFormateado);

        // Actualiza el valor del atributo "pagoReserva" en la clase "pagarReserva" como cadena de texto
        $(".pagarReserva").attr("pagoReserva", precioTotalFormateado);

        // Actualiza el valor del atributo "horasTinaja" en la clase "pagarReserva" con el string de horas
        $(".pagarReserva").attr("horasTinaja", horasString);
    });

    }
  })
};

  
  

  

/*=============================================
GENERAR COOKIES
=============================================*/

function crearCookie(nombre, valor, diasExpiracion){

  var hoy = new Date();

  hoy.setTime(hoy.getTime() + (diasExpiracion*24*60*60*1000));

  var fechaExpiracion = "expires=" + hoy.toUTCString();

  document.cookie = nombre + " = " + valor + "; " + fechaExpiracion;
}




/*=============================================
DATOS RESERVA
=============================================*/

$(".pagarReserva").click(function(){

  var idCabana = $(this).attr("idCabana");
  console.log("idCabana", idCabana);
  var imgCabana = $(this).attr("imgCabana"); 
  console.log("imgCabana", imgCabana);
  var infoCabana = $(this).attr("infoCabana")+" - "+$(this).attr("horasTinaja")+" "+"Tinaja";
  console.log("infoCabana", infoCabana);
  var pagoReserva = $(this).attr("pagoReserva");
  console.log("pagoReserva", pagoReserva);
  var codigoReserva = $(this).attr("codigoReserva");
  console.log("codigoReserva", codigoReserva);
  var fechaIngreso = $(this).attr("fechaIngreso");
  console.log("fechaIngreso", fechaIngreso);
  var fechaSalida = $(this).attr("fechaSalida");
  console.log("fechaSalida", fechaSalida);
  var horasTinaja=$(this).attr("horasTinaja");
  console.log("horasTinaja", horasTinaja);

  crearCookie("idCabana", idCabana, 1);
  crearCookie("imgCabana", imgCabana, 1);
  crearCookie("infoCabana", infoCabana, 1);
  crearCookie("pagoReserva", pagoReserva, 1);
  crearCookie("codigoReserva", codigoReserva, 1);
  crearCookie("fechaIngreso", fechaIngreso, 1);
  crearCookie("fechaSalida", fechaSalida, 1);
  crearCookie("horasTinaja", horasTinaja, 1);  

})
