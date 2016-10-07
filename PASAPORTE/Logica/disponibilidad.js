$(document).ready(function(){

	

	eUsuario();

	eCampo();

	$('#mensaje').hide();

});



function eCampo(){

	$('#TB_Documento').keyup(function(){

		$('#mensaje').fadeOut('slow', function(){

			$(this).empty();

		});

		

	});

}



function eUsuario(){

	

	$('#TB_Documento').blur(function(){

		if ($(this).val() != ''){

			

			var u = $(this).val();

			$.ajax({

				url: "Logica/usuarios.php",

				type: "POST",

				dataType: "html",

				cache: false,

				data: { TB_Documento: u}

			}).done(function( html ) {

				eMensaje(html);

			});

		}

	});

}



function eMensaje(data){

	$('#mensaje').removeClass();

	if (data == 1) {

		$('#mensaje').html('Disponible');

		$('#mensaje').addClass('disponible');

	}

	else{

		$('#mensaje').html('Ya Registrado');

		$('#mensaje').addClass('usado');

	}

	$('#mensaje').slideUp(300).delay(800).fadeIn(1000);

}