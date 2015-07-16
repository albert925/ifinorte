$(document).on("ready",inicio_contenido);
function inicio_contenido () {
	$("#nvcont").on("click",valiocont);
}
function valiocont () {
	var sela=$("#slmnv").val();
	if (sela=="0" || sela=="") {
		alert('Selecione el menu');
		return false;
	}
	else{
		return true;
	}
}