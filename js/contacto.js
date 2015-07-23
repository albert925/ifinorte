var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_mensajecontacto);
function inicio_mensajecontacto () {
	$("#nvjjcc").on("click",enviarmensaje);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function enviarmensaje () {
	var za=$("#nmctsj").val();
	var zb=$("#corctsj").val();
	var zc=$("#ausctsj").val();
	var zd=$("#msjj").val();
	if (za=="") {
		$("#txjs").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		if (zb=="" || !expr.test(zb)) {
			$("#txjs").css(mal).text("Ingrese el correo");
			return false;
		}
		else{
			if (zc=="0" || zc=="") {
				$("#txjs").css(mal).text("Selecione el asunto");
				return false;
			}
			else{
				if (zd=="") {
					$("#txjs").css(mal).text("Ingrese el mensaje");
					return false;
				}
				else{
					$("#txjs").css(normal).text("");
					$("#txjs").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>")
					$.post("new_mensaje.php",{a:za,b:zb,c:zc,d:zd},resulmensaje);
					return false;
				}
			}
		}
	}
}
function resulmensaje (lcsj) {
	if (lcsj=="2") {
		$("#txjs").css(bien).text("Mensaje enviado");
		location.reload(20);
	}
	else{
		$("#txjs").css(mal).html(lcsj);
		return false;
	}
}