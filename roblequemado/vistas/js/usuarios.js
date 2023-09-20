/*=============================================
LIMPIAR FORMULARIOS DE REGISTRO E INGRESO
=============================================*/

$('.modal.formulario').on('hidden.bs.modal', function(){

	 $(this).find('form')[0].reset();

})


/*=============================================
FORMATEAR LOS INPUT
=============================================*/

$('input[name="registroEmail"]').change(function(){

	$(".alert").remove();

})


/*=============================================
VALIDAR EMAIL REPETIDO
=============================================*/

/* VALIDAR EMAIL REPETIDO */
$('input[name="registroEmail"]').change(function() {
    var email = $(this).val();
    console.log("email", email);
    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({
        url: urlPrincipal + "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log("respuesta", respuesta);
       
        	if(respuesta){

				var modo = respuesta["modo"];

				if(modo == "directo"){

					modo = "esta página";

				}

				$("input[name='registroEmail']").val("");

				$("input[name='registroEmail']").after(`

				<div class="alert alert-warning">
					<strong>ERROR:</strong>
					El correo electrónico ya existe en la base de datos, por favor ingrese otro correo o ingrese a su cuenta.
				</div>

				`);

				return;

			}
		}	
    });
});

