$(document).on("ready",inicio_noticias);
function inicio_noticias () {
	$("#camimgnt").on("click",cambar_imgnoticia);
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
function cambar_imgnoticia () {
	var ida=$("#ridnt").val();
	var gmg=$("#lgmnt")[0].files[0];
	var namegmg=gmg.name;
	var extegmg=namegmg.substring(namegmg.lastIndexOf('.')+1);
	var tamgmg=gmg.size;
	var tipogmg=gmg.type;
	if (ida=="0" || ida=="") {
		$("#txA").css(mal).text("id noticia no disponible");
		return false;
	}
	else{
		if (!es_imagen(extegmg)) {
			$("#txA").css(mal).text("tipo de imagen no permitido");
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			var formu=new FormData($("#ffgm")[0]);
			$.ajax({
				url: '../../../modifimgnoticia.php',
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