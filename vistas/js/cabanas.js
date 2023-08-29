/*=============================================
COLOCAR ACTIVO EL PRIMER BOTÓN 
=============================================*/

var enlacesCabanas = $(".headerCabanas ul.nav li.nav-item a");
var tituloBtn = [];

for(var i = 0; i < enlacesCabanas.length; i++){

	$(enlacesCabanas[i]).removeClass("active");
	$(enlacesCabanas[i]).children("i").remove();
	tituloBtn[i] = $(enlacesCabanas[i]).html();
}

$(enlacesCabanas[0]).addClass("active");
$(enlacesCabanas[0]).html('<i class="fas fa-chevron-right"></i>'+ tituloBtn[0]);

$(enlacesCabanas[enlacesCabanas.length -1]).css({"border-right":0})

/*=============================================
ENLACES CABAÑAS
=============================================*/

$(".headerCabanas ul.nav li.nav-item a").click(function(e){

	e.preventDefault();

	var orden = $(this).attr("orden");
	var ruta = $(this).attr("ruta");

	for(var i = 0; i < enlacesCabanas.length; i++){

		$(enlacesCabanas[i]).removeClass("active");
		$(enlacesCabanas[i]).children("i").remove();
		tituloBtn[i] = $(enlacesCabanas[i]).html();
	}

	$(enlacesCabanas[orden]).addClass("active");
	$(enlacesCabanas[orden]).html('<i class="fas fa-chevron-right"></i>'+ tituloBtn[orden]);


})

/*=============================================
AJAX CABAÑAS
=============================================*/

var datos = new FormData();
datos.append("ruta",ruta);


console.log("urlPrincipal", urlPrincipal);

	$.ajax({

		url:urlPrincipal+"ajax/cabanas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){

			var galeria = JSON.parse(respuesta[orden]["galeria"]);
			console.log("galeria", galeria);
	
			for(var i = 0; i < galeria.length; i++){		

				$(listaSlide[0]).html('<img class="img-fluid" src="'+urlServidor+galeria[galeria.length-1]+'">')

				$(listaSlide[i+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[i]+'">')

				$(listaSlide[galeria.length+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[0]+'">')
			}


			$(".descripcionCabana h1").html(respuesta[orden]["id"]+" "+respuesta[orden]["tipo"]);

			$(".d-cabana").html(respuesta[orden]["descripcion_c"]);

			$('input[name="id-cabana"]').val(respuesta[orden]["id_c"]);

		}
	}
)