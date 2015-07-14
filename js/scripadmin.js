$(document).on("ready",inicio_scripadmin);
var wvent=$(window).width();
function inicio_scripadmin () {
	$("#btA").on("click",abrirA);
	$("#btB").on("click",abrirB);
	$(".doll").on("click",confirmborr);
}
function confirmborr () {
	return confirm("Estas seguro de eliminarlo?");
}
function abrirA (ea) {
	ea.preventDefault();
	$("#cjA").each(animarA);
}
function abrirB (eb) {
	eb.preventDefault();
	$("#cjB").each(animarB);
}
function animarA () {
	if (wvent>800) {
		var altoEs="550px";
	}
	else{
		var altoEs="650px";
	}
	var alto=$(this).css("height");
	if (altoEs==alto) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:altoEs}, 500);
	}
}
function animarB () {
	if (wvent>800) {
		var altoEs="250px";
	}
	else{
		var altoEs="350px";
	}
	var alto=$(this).css("height");
	if (altoEs==alto) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:altoEs}, 500);
	}
}