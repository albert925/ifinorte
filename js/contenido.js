$(document).on("ready",inicio_contenidos);
function inicio_contenidos () {
	$("#nvmnmv").on("click",nuevo_menuv);
	$("#nvsbmv").on("click",nuevo_submenu);
	$(".mofmv").on("click",modif_menuv);
	$(".mofsubmv").on("click",modif_submenu);
}
var bien={color:"#006600"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function nuevo_menuv () {
	var namv=$("#nmmv").val();
	if (namv=="") {
		$("#txA").css(mal).text("Ingrese el nombre");
		return false;
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("new_menu.php",{a:namv},resulmenu);
		return false;
	}
}
function resulmenu (rvm) {
	if (rvm=="2") {
		$("#txA").css(mal).text("Nombre ingresado ya existe");
		return false;
	}
	else{
		if (rvm=="3") {
			$("#txA").css(bien).text("Ingresado");
			location.reload(20);
		}
		else{
			$("#txA").css(mal).html(rvm);
			return false;
		}
	}
}
function modif_menuv () {
	var ida=$(this).attr("data-id");
	var nfmv=$("#mfnv_"+ida).val();
	if (nfmv=="") {
		$("#txB_"+ida).css(mal).text("Nombre en blanco");
	}
	else{
		$("#txB_"+ida).css(normal).text("");
		$("#txB_"+ida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
		$.post("modif_menuv.php",{fa:ida,a:nfmv},function (frmv) {
			if (frmv="2") {
				$("#txB_"+ida).css(bien).text("Nombre modificado");
				location.reload(20);
			}
			else{
				$("#txB_"+ida).css(mal).html(frmv);
			}
		});
	}
}
function nuevo_submenu () {
	var subnamv=$("#nmsbmv").val();
	var delmenv=$("#mnvR").val();
	if (delmenv=="0" || delmenv=="") {
		$("#txA").css(mal).text("Selecione del menu v");
		return false;
	}
	else{
		if (subnamv=="") {
			$("#txA").css(mal).text("Ingrese el nombre");
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' /></center>");
			$.post("new_submenu.php",{a:subnamv,b:delmenv},resulmenu);
			return false;
		}
	}
}
function modif_submenu () {
	var idb=$(this).attr("data-id");
	var Fmn=$("#selmP_"+idb).val();
	var FnmSb=$("#mfsbnv_"+idb).val();
	if (Fmn=="0" || Fmn=="") {
		$("#txB_"+idb).css(mal).text("Selecione del menu");
	}
	else{
		if (FnmSb=="") {
			$("#txB_"+idb).css(mal).text("Ingrese el nombre");
		}
		else{
			$("#txB_"+idb).css(normal).text("");
			$.post("modif_submenu.php",{fb:idb,a:Fmn,b:FnmSb},function (rsSb) {
				if (rsSb=="2") {
					$("#txB_"+idb).css(bien).text("Modificado");
					location.reload(20);
				}
				else{
					$("#txB_"+idb).css(mal).html(rsSb);
				}
			});
		}
	}
}