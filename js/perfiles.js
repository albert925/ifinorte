$(document).on("ready",inicio_perfiles);
function inicio_perfiles () {
	$("#valdc").on("click",validarperfil);
	$("#nvtpdc").on("click",nuevo_tpperfil);
	$(".ccpp").on("click",modif_perfil);
}
var bien={color:"#006600"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function validarperfil () {
	var va=$("#slmndc").val();
	if (va=="0" ||  va=="") {
		alert("Seleccione tipo de perfil");
		return false;
	}
	else{
		return true;
	}
}
function nuevo_tpperfil () {
	var atp=$("#ptdc").val();
	if (atp=="") {
		$("#txA").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("new_tipoperfil.php",{a:atp},resultipos);
		return false;
	}
}
function resultipos (rcjto) {
	if (rcjto=="2") {
		$("#txA").css(mal).text("Nombre ya existe");
		return false;
	}
	else{
		if (rcjto=="3") {
			$("#txA").css(bien).text("Ingresado");
			location.reload(20);
		}
		else{
			$("#txA").css(mal).html(rcjto);
			return false;
		}
	}
}
function modif_perfil () {
	var ida=$(this).attr("data-id");
	var ftit=$("#titmn_"+ida).val();
	if (ftit=="") {
		$("#txB_"+ida).css(mal).text("Ingrese el nombre");
	}
	else{
		$("#txB_"+ida).css(normal).text("");
		$("#txB_"+ida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("modif_tipoperfil.php",{fa:ida,a:ftit},function (siy) {
			if (siy=="2") {
				$("#txB_"+ida).css(bien).text("Modificado");
				location.reload(20);
			}
			else{
				$("#txB_"+ida).css(mal).html(siy);
			}
		});
	}
}