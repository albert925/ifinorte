$(document).on("ready",inicio_formato);
function inicio_formato () {
	$("#nvform").on("click",nuevo_formato);
	$(".camfmf").on("click",mof_formato);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function nuevo_formato () {
	var afm=$("#nmfm").val();
	if (afm=="") {
		$("#txA").css(mal).text("Ingrese la palabra");
		return false;
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("new_formato.php",{a:afm},resulformato);
		return false;
	}
}
function resulformato (utfm) {
	if (utfm=="2") {
		$("#txA").css(mal).text("Ya existe ese nombre");
		return false;
	}
	else{
		if (utfm=="3") {
			$("#txA").css(bien).text("Ingresado");
			location.reload(20);
		}
		else{
			$("#txA").css(mal).html(utfm);
			return false;
		}
	}
}
function mof_formato () {
	var ida=$(this).attr("data-id");
	var palf=$("#mffm_"+ida).val();
	if (palf=="") {
		$("#txB_"+ida).css(mal).text("Ingrese la palabra");
	}
	else{
		$("#txB_"+ida).css(normal).text("");
		$("#txB_"+ida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("modif_formato.php",{fa:ida,a:palf},function (rffmf) {
			if (rffmf=="2") {
				$("#txB_"+ida).css(bien).text("Modificado");
				location.reload(20);
			}
			else{
				$("#txB_"+ida).css(mal).html(rffmf);
			}
		});
	}
}