$(document).on("ready",inicio_adminin);
function inicio_adminin () {
	$("#ingad").on("click",ingadmin);
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