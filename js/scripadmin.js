$(document).on("ready",inicio_scripadmin);
var wvent=$(window).width();
function inicio_scripadmin () {
	$("#btA").on("click",abrirA);
	$(".doll").on("click",confirmborr);
}
function confirmborr () {
	return confirm("Estas seguro de eliminarlo?");
}
function abrirA (ea) {
	ea.preventDefault();
	$("#cjA").each(animarA);
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