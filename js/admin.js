$(document).on("ready",inicio_adminin);
function inicio_adminin () {
	$("#ingad").on("click",ingadmin);
	$("#camA").on("click",cambioA);
	$("#camB").on("click",cambioB);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function ingadmin () {
	var ada=$("#usad").val();
	var adb=$("#psad").val();
	if (ada=="") {
		$("#txA").css(mal).text("Ingrese el nombre de usuario");
		return false;
	}
	else{
		if (adb=="") {
			$("#txA").css(mal).text("Ingrese la contraseña");
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			$("#txA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' /></center>");
			$.post("ing_admin.php",{a:ada,b:adb},reulinadmin);
			return false;
		}
	}
}
function reulinadmin (rpeadu) {
	if (rpeadu=="2") {
		$("#txA").css(mal).text("Usuario o contraseña incorrectos");
			return false;
	}
	else{
		if (rpeadu=="3") {
			$("#txA").css(bien).text("Ingresando..");
			window.location.href="administrador";
		}
		else{
			$("#txA").css(mal).html(rpeadu);
			return false;
		}
	}
}
function cambioA () {
	var ida=$(this).attr("data-adm");
	var usF=$("#usfad").val();
	if (usF=="") {
		$("#txB").css(mal).text("Ingrese el nombre de usuario");
	}
	else{
		$("#txB").css(normal).text("");
		$("#txB").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("modif_usadm.php",{fa:ida,a:usF},resulcambioA);
	}
}
function resulcambioA (siA) {
	if (siA=="2") {
		$("#txB").css(mal).text("Nombre de usuario ya existe");
	}
	else{
		if (siA=="3") {
			$("#txB").css(bien).text("Nombre de usuario cambiado");
			location.reload(20);
		}
		else{
			$("#txB").css(mal).html(siA);
		}
	}
}
function cambioB () {
	var idb=$(this).attr("data-adm");
	var coa=$("#psac").val();
	var cna=$("#psna").val();
	var cnb=$("#psnb").val();
	if (coa=="") {
		$("#txC").css(mal).text("Ingrese la constraseña actual");
	}
	else{
		if (cna=="" || cna.length<6) {
			$("#txC").css(mal).text("Contraseña mínimo 6 dígitos");
		}
		else{
			if (cnb!=cna) {
				$("#txC").css(mal).text("Las contraseñan no coinciden");
			}
			else{
				$("#txC").css(normal).text("");
				$("#txC").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' /></center>");
				$.post("modif_pasadm.php",{fb:idb,b:coa,c:cna},resulcambioB);
			}
		}
	}
}
function resulcambioB (siB) {
	if (siB=="2") {
		$("#txC").css(mal).text("Contraseña actual incorrecta");
	}
	else{
		if (siB=="3") {
			$("#txC").css(bien).text("Contraseña cambiada");
			setTimeout(direcionarE,1500);
		}
		else{
			$("#txC").css(mal).html(siB);
		}
	}
}
function direcionarE () {
	window.location.href="../../cerrar";
}