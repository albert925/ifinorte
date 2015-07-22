var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_registro);
function inicio_registro () {
	$("#nvus").on("click",nuevo_users);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function nuevo_users () {
	var rea=$("#regnm").val();
	var reb=$("#regap").val();
	var rec=$("#regcor").val();
	var red=$("#regpsa").val();
	var ree=$("#regpsb").val();
	if (rea=="") {
		$("#txA").css(mal).text("Ingrese el nombre");
	}
	else{
		if (reb=="") {
			$("#txA").css(mal).text("Ingrese el apellido");
		}
		else{
			if (rec=="" || !expr.test(rec)) {
				$("#txA").css(mal).text("Ingrese un correo valido");
			}
			else{
				if (red=="" || red.length<6) {
					$("#txA").css(mal).text("contraseña mínimo 6 dígitos");
				}
				else{
					if (ree!=red) {
						$("#txA").css(mal).text("contraseñas no coinciden");
					}
					else{
						if ($("#acdesac").is(":checked")) {
							$("#txA").css(normal).text("");
							$("#txA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>")
							$.post("regis_users.php",{a:rea,b:reb,c:rec,d:red},resultregiostro);
						}
						else{
							$("#txA").css(mal).text("Debes aceptar las condiciones");
						}
					}
				}
			}
		}
	}
}
function resultregiostro (usGt) {
	if (usGt=="2") {
		$("#txA").css(mal).text("Correo ingresado ya está registrado");
	}
	else{
		if (usGt=="3") {
			$("#txA").css(bien).text("Registrado");
			window.location.href="comple.php";
		}
		else{
			$("#txA").css(mal).html(usGt);
		}
	}
}