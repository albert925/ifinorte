$(document).on("ready",inicio_contenido);
function inicio_contenido () {
	$("#nvcont").on("click",valiocont);
	$("#camarch").on("click",cambiar_archivo);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function valiocont () {
	var sela=$("#slmnv").val();
	if (sela=="0" || sela=="") {
		alert('Selecione el menu');
		return false;
	}
	else{
		return true;
	}
}
function cambiar_archivo () {
	var ida=$("#idct").val();
	var arc=$("#afarch")[0].files[0];
	var namearc=arc.name;
	var extearc=namearc.substring(namearc.lastIndexOf('.')+1);
	var tamarc=arc.size;
	var tipoarc=arc.type;
	if (ida=="0" || ida=="") {
		$("#ccA").css(mal).text("id de contenido no disponible");
		return false;
	}
	else{
		if (tamarc>10000000) {alert("si");}
		$("#ccA").css(normal).text("");
		var formu=new FormData($("#cmbarch")[0]);
		$.ajax({
			url: '../../../modifcarchivo.php',
			type: 'POST',
			data: formu,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend:function () {
				$("#ccA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			},
			success:reulimg,
			error:function () {
				$("#ccA").css(mal).text("Ocurrió un error");
				$("#ccA").fadeIn();$("#ccA").fadeOut(3000);
			}
		});
		return false;
	}
}
function reulimg (dtst) {
	if (dtst=="2") {
		$("#ccA").css(mal).text("Carpeta sin permisos");
		$("#ccA").fadeIn();$("#ccA").fadeOut(3000);
		return false;
	}
	else{
		if (dtst=="3") {
			$("#ccA").css(mal).text("Tamaño no permitido");
			$("#ccA").fadeIn();$("#ccA").fadeOut(3000);
			return false;
		}
		else{
			if (dtst=="4") {
				$("#ccA").css(mal).text("Carpeta sin permisos");
				$("#ccA").fadeIn();$("#ccA").fadeOut(3000);
				return false;
			}
			else{
				if (dtst=="5") {
					$("#ccA").css(bien).text("Archivo subido y cambiado");
					$("#ccA").fadeIn();$("#ccA").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#ccA").css(mal).html(dtst);
					$("#ccA").fadeIn();
					return false;
				}
			}
		}
	}
}