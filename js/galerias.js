$(document).on("ready",inicio_galeriasvv);
function inicio_galeriasvv () {
	$("#nvgalme").on("click",nuevo_galeria);
	$("#nuevimngv").on("click",nuevo_imagengalv);
	$(".mofml").on("click",modif_nomgaleria);
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
function nuevo_galeria () {
	var titRgl=$("#nmglmv").val();
	if (titRgl=="") {
		$("#txA").css(mal).text("Ingrese el título");
		return false;
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("new_galvv.php",{a:titRgl},resulgaleriavv);
		return false;
	}
}
function resulgaleriavv (rsvr) {
	if (rsvr=="2") {
		$("#txA").css(mal).text("El titulo ingresado ya existe");
		return false;
	}
	else{
		if (rsvr=="3") {
			$("#txA").css(bien).text("Ingresado");
			window.location.href="images_galermv.php";
		}
		else{
			$("#txA").css(mal).html(rsvr);
			return false;
		}
	}
}
function nuevo_imagengalv () {
	var ida=$("#idglv").val();
	var givl=$("#igmglv")[0].files[0];
	var namegivl=givl.name;
	var extegivl=namegivl.substring(namegivl.lastIndexOf('.')+1);
	var tamgivl=givl.size;
	var tipogivl=givl.type;
	if (ida=="0" || ida=="") {
		$("#tximage").css(mal).text("Id de galeria no disponible");
		return false;
	}
	else{
		if (!es_imagen(extegivl)) {
			$("#tximage").css(mal).text("Tipo de imagen no disponible");
			return false;
		}
		else{
			$("#tximage").css(normal).text("");
			var formu=new FormData($("#nvG")[0]);
			$.ajax({
				url: '../../../nuevoimggaldoss.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#tximage").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:function (set) {
					if (set=="2") {
						$("#tximage").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
						$("#tximage").fadeIn();$("#tximage").fadeOut(3000);
						return false;
					}
					else{
						if (set=="3") {
							$("#tximage").css(mal).text("Tamaño no permitido");
							$("#tximage").fadeIn();$("#tximage").fadeOut(3000);
							return false;
						}
						else{
							if (set=="4") {
								$("#tximage").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
								$("#tximage").fadeIn();$("#tximage").fadeOut(3000);
								return false;
							}
							else{
								if (set=="5") {
									$("#tximage").css(bien).text("Imagen subida");
									$("#tximage").fadeIn();$("#tximage").fadeOut(3000);
									window.location.href="galermv_images.php?gl="+ida;
								}
								else{
									$("#tximage").css(mal).html(set);
									$("#tximage").fadeIn();
									return false;
								}
							}
						}
					}
				},
				error:function () {
					$("#tximage").css(mal).text("Ocurrió un error");
					$("#tximage").fadeIn();$("#tximage").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function modif_nomgaleria () {
	var idb=$(this).attr("data-id");
	var nfgl=$("#mfgl_"+idb).val();
	if (nfgl=="") {
		$("#txB_"+idb).css(mal).text("Ingrese el titulo");
	}
	else{
		$("#txB_"+idb).css(normal).text("");
		$("#txB_"+idb).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("modiuf_galeria.php",{fa:idb,a:nfgl},function (tglF) {
			if (tglF=="2") {
				$("#txB_"+idb).css(bien).text("Modificado");
				location.reload(20);
			}
			else{
				$("#txB_"+idb).css(mal).html(tglF);
			}
		});
	}
}