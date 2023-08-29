/*============================================
FECHAS RESERVAS
============================================*/

$('.datepicker.entrada').datepicker({
	startDate: '0d',
	format: 'dd-mm-yyyy',
	todayHighlight:true,
	weekStart: 1,
})

$('.datepicker.entrada').change(function(){

	var fechaEntrada = $(this).val();

	$('.datepicker.salida').datepicker({
		startDate: fechaEntrada,
		datesDisabled: fechaEntrada,
		format: 'dd-mm-yyyy',
		weekStart: 1
	});
})

/*============================================
BOTON RESERVAS
============================================*/

$(".mostrarBloqueReservas").click(function(){

	$(".formReservas").slideToggle("fast");
	$(".menu").slideUp('fast');

	if($(".mostrarBloqueReservas").attr("modo") == "abajo"){

		$(".mostrarBloqueReservas").attr("modo", "arriba");
		$(".flechaReserva").removeClass("fa-caret-up");
		$(".flechaReserva").addClass("fa-caret-down");

	}else{

		$(".mostrarBloqueReservas").attr("modo", "abajo");
		$(".flechaReserva").removeClass("fa-caret-down");
		$(".flechaReserva").addClass("fa-caret-up");
	}
})

/*============================================
ANIMACION SCROLL
============================================*/

$(window).scroll(function(){

	var posY = window.pageYOffset;

	if(window.matchMedia("(min-width:769px)").matches){

		if(posY > 50){

			$(".formReservas").slideUp("fast");
			$(".mostrarBloqueReservas").attr("modo", "arriba");
			$(".flechaReserva").removeClass("fa-caret-up");
			$(".flechaReserva").addClass("fa-caret-down");
		}else{
			$(".formReservas").slideDown("fast");
			$(".mostrarBloqueReservas").attr("modo", "abajo");
			$(".flechaReserva").removeClass("fa-caret-down");
			$(".flechaReserva").addClass("fa-caret-up");
		}

	}

})


/*============================================
SCROLL UP
============================================*/



/*============================================
ANIMACION BANNER
============================================*/

$('.fade-slider').jdSlider({

	isSliding: false,
	isAuto: true,
	isLoop: true,
	isDrag: false,
	interval: 7000,
	isCursor: false,
	speed: 3000

})

$(".banner .fade-slider").css({"margin-top":$("header").height()})

/*============================================
ANIMACION PLANES
============================================*/

$(".planes .grid-item").mouseover(function(){

	$(this).children("figure").css({"height":"25%", "transition":".5s all"})

	$(".tituloPlan").html($(this).children("figure").children("h1").html());
	$(".descripcionPlan").html($(this).children("figure").children("h1").attr("descripcion"));
})

$(".planes .grid-item").mouseout(function(){

	$(this).children("figure").css({"height":"100%", "transition":".5s all"})
	$(".tituloPlan").html($(".tituloPlan").attr("tituloPlan"));
	$(".descripcionPlan").html($(".descripcionPlan").attr("descripcionPlan"));
})

/*============================================
ANIMACION PLANES MOVIL
============================================*/

$(".planesMovil").jdSlider({
	wrap: '.slide-inner',
	slideShow: 3,
	slideToScroll: 3,
	isLoop: false
})

$(".planesMovil li").click(function(){

	$(".modal-title").html($(this).children("a").children("h6").html());
	$(".modal-body img").attr("src", $(this).children("a").children("img").attr("src"));
	$(".modal-body p").html($(this).children("a").attr("descripcion"));
})

$(".planes .grid-item").click(function(){

	$(".modal-title").html($(this).children("figure").children("h1").html());
	$(".modal-body img").attr("src", $(this).children("img").attr("src"));
	$(".modal-body p").html($(this).children("figure").children("h1").attr("descripcion"));
})

/*============================================
ANIMACION ATRACCIONES
============================================*/

$('.slideAtracciones').jdSlider();

/*=============================================
SLIDE CABANAS
=============================================*/

$('.slideCabanas').jdSlider( {

 	isSliding: true,
    isAuto: true,
    isLoop: true,
    isDrag: true,
    interval: 3000,
    isCursor: false,
    margin:0,
    timingFunction: 'ease',
    easing: 'swing'


});

/*=============================================
VISUALIZAR MULTIMEDIA CABANAS
=============================================*/

$(".colIzqCabanas button").click(function(){

	var vista = $(this).attr("vista");

	if(vista == "fotos"){

		$(".slideCabanas").removeClass("d-none");
		$(".slideCabanas").addClass("d-block");

		$(".videoCabanas").addClass("d-none");
		$(".videoCabanas").removeClass("d-block");

		$(".360Cabanas").addClass("d-none");
		$(".360Cabanas").removeClass("d-block");
	}

	if(vista == "video"){

		$(".videoCabanas").removeClass("d-none");
		$(".videoCabanas").addClass("d-block");

		$(".slideCabanas").addClass("d-none");
		$(".slideCabanas").removeClass("d-block");

		$(".360Cabanas").addClass("d-none");
		$(".360Cabanas").removeClass("d-block");
	}

	if(vista == "360"){

		$(".360Cabanas").removeClass("d-none");
		$(".360Cabanas").addClass("d-block");

		$(".slideCabanas").addClass("d-none");
		$(".slideCabanas").removeClass("d-block");

		$(".videoCabanas").addClass("d-none");
		$(".videoCabanas").removeClass("d-block");
	}

})


/*=============================================
POSICION BLOQUE RESERVAS
=============================================*/

function posicionBloqueReservas(){

	if(window.matchMedia("(min-width:769px)").matches){

		if($(".mostrarBloqueReservas").attr("modo") == "abajo"){

			$(".colDerCabanas").css({"margin-top":"100px"})
			$(".colDerReservas").css({"margin-top":"100px"})
			$(".colDerPerfil").css({"margin-top":"100px"})

		}

		if($(".mostrarBloqueReservas").attr("modo") == "arriba"){

			$(".colDerCabanas").css({"margin-top":"20px"})
			$(".colDerReservas").css({"margin-top":"20px"})
			$(".colDerPerfil").css({"margin-top":"20px"})

		}

	}else{

		$(".colDerCabanas").css({"margin-top":"20px"})
		$(".colDerReservas").css({"margin-top":"20px"})
		$(".colDerPerfil").css({"margin-top":"20px"})

	}

}

posicionBloqueReservas();

if(window.matchMedia("(max-width:768px)").matches){

	$(".infoCabana .colIzqCabanas").css({"margin-top":$("header").height()})
	$(".infoReservas .colIzqReservas").css({"margin-top":$("header").height()})
	$(".infoPerfil .colIzqPerfil").css({"margin-top":($("header").height()+100)+"px"})

}