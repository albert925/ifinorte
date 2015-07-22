$(document).on("ready",ingreEmp);
function ingreEmp () {
	$("#enus").on("click",inicio_ingresoG);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function inicio_ingresoG () {
	var usia=$("#usin").val();
	var usib=$("#psin").val();
	if (usia=="") {
		$("#txUs").css(mal).text("Ingrese el correo");
		return false;
	}
	else{
		if (usib=="") {
			$("#txUs").css(mal).text("Ingrese la contraseña");
			return false;
		}
		else{
			$("#txUs").css({color:"#fff"}).text("Loading..");
			$.post("ingre_users.php",{a:usia,b:usib},resulingresoT);
			return false;
		}
	}
}
function resulingresoT (Ttt) {
	if (Ttt=="2") {
		$("#txUs").css(mal).text("Correo o contraseña incorrectos");
			return false;
	}
	else{
		if (Ttt=="3") {
			$("#txUs").css(mal).text("Cuenta desactivado");
			return false;
		}
		else{
			if (Ttt=="4") {
				$("#txUs").css(bien).text("Ingresando..");
				location.reload(20);
			}
			else{
				$("#txUs").css(mal).html(Ttt);
				return false;
			}
		}
	}
}