$(document).on("ready",inicio_formato);
function inicio_formato () {
	$("#nvform").on("click",nuevo_formato);
	$("#nvsbform").on("click",nuevo_subformato);
	$(".camfmf").on("click",mof_formato);
	$(".camsbfmsbf").on("click",mof_subfortmato);
}
var bien={color:"#53A93F"};
var normal={color:"#000"};
var mal={color:"#D30801"};
function nuevo_formato () {
	var afm=$("#nmfm").val();
	if (afm=="") {
		$("#txA").css(mal).text("Ingrese la palabra");
		return false;
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("new_formato.php",{a:afm},resulformato);
		return false;
	}
}
function resulformato (utfm) {
	if (utfm=="2") {
		$("#txA").css(mal).text("Ya existe ese nombre");
		return false;
	}
	else{
		if (utfm=="3") {
			$("#txA").css(bien).text("Ingresado");
			location.reload(20);
		}
		else{
			$("#txA").css(mal).html(utfm);
			return false;
		}
	}
}
function mof_formato () {
	var ida=$(this).attr("data-id");
	var palf=$("#mffm_"+ida).val();
	if (palf=="") {
		$("#txB_"+ida).css(mal).text("Ingrese la palabra");
	}
	else{
		$("#txB_"+ida).css(normal).text("");
		$("#txB_"+ida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("modif_formato.php",{fa:ida,a:palf},function (rffmf) {
			if (rffmf=="2") {
				$("#txB_"+ida).css(bien).text("Modificado");
				location.reload(20);
			}
			else{
				$("#txB_"+ida).css(mal).html(rffmf);
			}
		});
	}
}
function nuevo_subformato () {
	var slfm=$("#fmsl").val();
	var msbf=$("#sbfm").val();
	if (slfm=="0" || slfm=="") {
		$("#txC").css(mal).text("Selecione del formato");
		return false;
	}
	else{
		if (msbf=="") {
			$("#txC").css(mal).text("Ingrese el titulo de subformato");
			return false;
		}
		else{
			$("#txC").css(normal).text("");
			$("#txC").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$.post("new_subformt.php",{a:slfm,b:msbf},resulsubfr);
			return false;
		}
	}
}
function resulsubfr (rtsb) {
	if (rtsb=="2") {
		$("#txC").css(mal).text("El nombre ya existe");
		return false;
	}
	else{
		if (rtsb=="3") {
			$("#txC").css(bien).text("Ingresado");
			location.reload(20);
		}
		else{
			$("#txC").css(mal).html(rtsb);
			return false;
		}
	}
}
function mof_subfortmato () {
	var idb=$(this).attr("data-id");
	var slFsf=$("#fidf_"+idb).val();
	var nmFsf=$("#mfsfm_"+idb).val();
	if (slFsf=="0" || slFsf=="") {
		$("#txB_"+idb).css(mal).text("Selecione formato");
	}
	else{
		if (nmFsf=="") {
			$("#txB_"+idb).css(mal).text("Ingrese el nombre");
		}
		else{
			$("#txB_"+idb).css(mal).text("");
			$("#txB_"+idb).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$.post("modif_subfy.php",{fb:idb,a:slFsf,b:nmFsf},function (ssS) {
				if (ssS=="2") {
					$("#txB_"+idb).css(bien).text("Modificado");
					location.reload(20);
				}
				else{
					$("#txB_"+idb).css(mal).html(ssS);
				}
			});
		}
	}
}