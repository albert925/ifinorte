$(document).on("ready",inicio_imagesslid);
function inicio_imagesslid () {
	$("#nvigal").on("click",nuevo_imagen);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function es_imagen (tipederf) {
	switch(tipederf.toLowerCase()){
		case 'jpg':
			return true;
			break;
		case 'gif':
			return true;
			break;
		case 'png':
			return true;
			break;
		case 'jpeg':
			return true;
			break;
		default:
			return false;
			break;
	}
}
function nuevo_imagen () {
	var titig=$("#ttsig").val();
	var igl=$("#igsig")[0].files[0];
	var nameigl=igl.name;
	var exteigl=nameigl.substring(nameigl.lastIndexOf('.')+1);
	var tamigl=igl.size;
	var tipoigl=igl.type;
	if (titig=="") {
		$("#txA").css(mal).text("Ingrese el titulo");
		return false;
	}
	else{
		if (!es_imagen(exteigl)) {
			$("#txA").css(mal).text("Tipo de imagen no permitido");
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			var formu=new FormData($("#nvG")[0]);
			$.ajax({
				url: '../../../nuevoimggalery.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:reulimg,
				error:function () {
					$("#txA").css(mal).text("Ocurrió un error");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function reulimg (dtst) {
	if (dtst=="2") {
		$("#txA").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
		$("#txA").fadeIn();$("#txA").fadeOut(3000);
		return false;
	}
	else{
		if (dtst=="3") {
			$("#txA").css(mal).text("Tamaño no permitido");
			$("#txA").fadeIn();$("#txA").fadeOut(3000);
			return false;
		}
		else{
			if (dtst=="4") {
				$("#txA").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txA").fadeIn();$("#txA").fadeOut(3000);
				return false;
			}
			else{
				if (dtst=="5") {
					$("#txA").css(bien).text("Imagen subida");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txA").css(mal).html(dtst);
					$("#txA").fadeIn();
					return false;
				}
			}
		}
	}
}