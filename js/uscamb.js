var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_usuarioC);
function inicio_usuarioC () {
	$("#camA").on("click",cambiarA);
	$("#camB").on("click",cambiarB);
	$("#camC").on("click",cambiarC);
	$("#camD").on("click",cambiarD);
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
function cambiarC () {
	alert("Deshabilitado");
}
function cambiarD () {
	var idd=$(this).attr("data-us");
	var psac=$("#coac").val();
	var psna=$("#cona").val();
	var psnb=$("#conb").val();
	if (psac=="") {
		$("#txD").css(mal).text("Ingrese la contraseña actual");
	}
	else{
		if (psna=="" || psna.length<6) {
			$("#txD").css(mal).text("Contraseña mínimo 6 dígitos");
		}
		else{
			if (psnb!=psna) {
				$("#txD").css(mal).text("Contraseñas no coinciden");
			}
			else{
				$("#txD").css(normal).text("");
				$("#txD").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>")
				$.post("camb_passus.php",{fdd:idd,a:psac,b:psna},resulcD);
			}
		}
	}
}
function resulcD (uu) {
	if (uu=="2") {
		$("#txD").css(mal).text("Contraseña actual incorrecta");
	}
	else{
		if (uu=="3") {
			$("#txD").css(bien).text("Contraseña cambiada");
			setTimeout(direcionar,1500);
		}
		else{
			$("#txD").css(mal).html(uu);
		}
	}
}
function direcionar () {
	window.location.href="../cerrar/us.php";
}