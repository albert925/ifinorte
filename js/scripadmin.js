$(document).on("ready",inicio_scripadmin);
var wvent=$(window).width();
function inicio_scripadmin () {
	$("#btA").on("click",abrirA);
	$("#btB").on("click",abrirB);
	$("#btC").on("click",abrirC);
	$("#fmsl").on("change",buscarsubformato);
	$("#slmnv").on("change",buscarsubmenu);
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
function abrirC (ec) {
	ec.preventDefault();
	$("#cjC").each(animarC);
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
function animarC () {
	if (wvent>800) {
		var altoEs="150px";
	}
	else{
		var altoEs="250px";
	}
	var alto=$(this).css("height");
	if (altoEs==alto) {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:altoEs}, 500);
	}
}
function buscarsubformato () {
	var fR=$("#fmsl").val();
	$("#ldsl").text("Buscando..");
	$.post("busc_subformato.php",{a:fR},colocarsubform);
}
function colocarsubform (rfmsb) {
	$("#ldsl").text("");
	$("#subfmsl").html(rfmsb);
}
function buscarsubmenu () {
	var mv=$("#slmnv").val();
	$("#tld").text("Buscando submenu..");
	$.post("buscar_submenu.php",{a:mv},colocarsubmenu);
}
function colocarsubmenu (vmrv) {
	$("#tld").text("");
	$("#slsbv").html(vmrv);
}