$(document).on("ready",inicio_contenidos);
function inicio_contenidos () {
	$("#nvmnmv").on("click",nuevo_menuv);
}
var bien={color:"#006600"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function nuevo_menuv () {
	var namv=$("#nmmv").val();
	if (namv=="") {
		$("#txA").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("new_menu.php",{a:namv},resulmenu);
		return false;
	}
}
function resulmenu (rvm) {
	if (rvm=="2") {
		$("#txA").css(mal).text("Nombre ingresado ya existe");
		return false;
	}
	else{
		if (rvm=="3") {
			$("#txA").css(bien).text("Nuevo menu ingresado");
			location.reload(20);
		}
		else{
			$("#txA").css(mal).html(rvm);
			return false;
		}
	}
}