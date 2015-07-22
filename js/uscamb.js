var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_usuarioC);
function inicio_usuarioC () {
	$("#camA").on("click",cambiarA);
	$("#camB").on("click",cambiarB);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function cambiarA () {
	var ida=$(this).attr("data-us");
	var csa=$("#fas").val();
	var csb=$("#fbs").val();
	var csc=$("#fcs").val();
	var csd=$("#depar").val();
	var cse=$("#muni").val();
	var csf=$("#ffs").val();
	if (csa=="") {
		$("#txA").css(mal).text("Ingrese un nombre y un apellido");
	}
	else{
		if (csd=="0" || csd=="") {
			$("#txA").css(mal).text("Selecione el departamento");
		}
		else{
			if (cse=="0" || cse=="") {
				$("#txA").css(mal).text("Selecione el municipio");
			}
			else{
				$("#txA").css(normal).text("");
				$("#txA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>")
				$.post("modif_datus.php",{fad:ida,a:csa,b:csb,c:csc,d:csd,e:cse,f:csf},resulcA);
			}
		}
	}
}
function resulcA (Aa) {
	if (Aa=="2") {
		$("#txA").css(bien).text("Datos actuañlizado");
		location.reload(20);
	}
	else{
		$("#txA").css(mal).html(Aa);
	}
}
function cambiarB () {
	var idb=$(this).attr("data-us");
	var correoF=$("#corF").val();
	if (correoF=="" || !expr.test(correoF)) {
		$("#txB").css(mal).text("Ingrese un correo valido");
	}
	else{
		$("#txB").css(normal).text("");
		$("#txB").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>")
		$.post("camb_corrus.php",{fbd:idb,a:correoF},resulcB);
	}
}
function resulcB (Bb) {
	if (Bb=="2") {
		$("#txB").css(mal).text("Correo ingresado ya existe");
	}
	else{
		if (Bb=="3") {
			$("#txB").css(bien).text("Cambiando");
			window.location.href="txtcorreo.php";
		}
		else{
			$("#txB").css(mal).html(Bb);
		}
	}
}