$(document).on("ready",inicio_portafolio);
function inicio_portafolio () {
	$("#nvmmpp").on("click",nuevo_menu_pp);
	$(".ccpp").on("click",modif_menupp);
}
var bien={color:"#006600"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function nuevo_menu_pp () {
	var titPp=$("#titppp").val();
	if (titPp=="") {
		$("#txA").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("new_menuport.php",{a:titPp},resulmenupp);
		return false;
	}
}
function resulmenupp (rsppp) {
	if (rsppp=="2") {
		$("#txA").css(mal).text("nombre ya existe");
		return false;
	}
	else{
		if (rsppp=="3") {
			$("#txA").css(bien).text("Ingresado");
			location.reload(20);
		}
		else{
			$("#txA").css(mal).html(rsppp);
			return false;
		}
	}
}
function modif_menupp () {
	var ida=$(this).attr("data-id");
	var titfpp=$("#titmn_"+ida).val();
	if (titfpp=="") {
		$("#txB_"+ida).css(mal).text("Ingrese el nombre");
	}
	else{
		$("#txB_"+ida).css(normal).text("");
		$("#txB_"+ida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("modif_manuspp.php",{fa:ida,a:titfpp}, function (tpmn) {
			if (tpmn=="2") {
				$("#txB_"+ida).css(bien).text("Modificado");
				location.reload(20);
			}
			else{
				$("#txB_"+ida).css(mal).html(tpmn);
			}
		});
	}
}