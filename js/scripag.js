var contador=1;
$(document).on("ready",inicio_pagina);
function inicio_pagina () {
	if ($(window).width()<810) {
		$(window).scroll(mostrarmov);
	}
	$("#mn_mv").on("click",abrir_menuP);
	$("#depar").on("change",buscar_muni);
	$(".submen").on("click",abrirsubmenu);
}
function abrir_menuP () {
	if (contador==1) {
		$("#mnP").animate({left:"0"}, 500);
		contador=0;
	}
	else{
		$("#mnP").animate({left:"-100%"}, 500);
		contador=1;
	}
}
function abrirsubmenu () {
	var numerothis=$(this).attr("data-num");
	$(".children"+numerothis).slideToggle();
}
function mostrarmov () {
	if ($(window).scrollTop()>0) {
		$("header").css({position:"fixed"});
	}
	else{
		$("header").css({position:"relative"});
	}
}
function buscar_muni () {
	var dpR=$("#depar").val();
	$("#txmn").text("Buscando municipios...");
	$.post("buscar_muni.php",{a:dpR},colocarmunicipio);
}
function colocarmunicipio (mnR) {
	$("#txmn").text("");
	$("#muni").html(mnR);
}