$(document).ready(function(){
	//Funcion para registra codigo
	$('#formCodeRegister').submit(function(event){
		event.preventDefault();
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data){
				//Validar respuesta
				data = $.trim(data);
				switch (data) {
					case "emptydata":
						//Validacion dato vacio
						$("#validationAlert").removeClass("occult");
						$("#validationAlert").addClass("manifest");
						$("#validationAlert").text("Ups... Debes ingresar tu link");
						break;
					case "mydomain":
						//Validacion dato igual a mi dominio
						$("#validationAlert").removeClass("occult");
						$("#validationAlert").addClass("manifest");
						$("#validationAlert").text("Ups... El dominio no es permitido");
					  	break;
					default:
						//Dato correcto
						$("#urlshort").removeClass("occult");
						$("#urlshort").addClass("manifest");
						$("#btnurlsubmit").addClass("occult");
						$("#btnurlcopie").removeClass("occult");
						$("#btnurlcopie").addClass("manifest");
						$("#btnformreset").removeClass("occult");
						$("#btnformreset").addClass("manifest");
						$("#validationAlert").removeClass("manifest");
						$("#validationAlert").addClass("occult");
						document.getElementById("urlshort").value = data;
					  break;
				  }                
			},
			error: function(data){
				//Error en el sistema
                document.getElementById("code").value = "Ups.. Ocurrio un error comuniquese con el administrador";
			}
		})
	})
});

	//Funcion para copiar
	function copy()
	{
		 document.getElementById("urlshort").select();
		 document.execCommand("copy");
		 $("#validationAlert").removeClass("occult");
		 $("#validationAlert").addClass("manifest");
		 $("#validationAlert").text("¡Ajua!.. El link fue copiado");
	}

	//Funcion para nuevo
	function newUrl()
	{
		$("#urlshort").removeClass("manifest");
		$("#urlshort").addClass("occult");
		$("#btnurlsubmit").removeClass("occult");
		$("#btnurlsubmit").addClass("manifest");
		$("#btnurlcopie").removeClass("manifest");
		$("#btnurlcopie").addClass("occult");
		$("#btnformreset").removeClass("manifest");
		$("#btnformreset").addClass("occult");
		$("#validationAlert").removeClass("manifest");
		$("#validationAlert").addClass("occult");
		document.getElementById("formCodeRegister").reset();
	}