<?php
	include '../../../config.php';
	$idR=$_POST['fb'];//id subfor
	$a=$_POST['a'];//del formt
	$b=$_POST['b'];//nam subf
	if ($idR=="" || $a=="0" || $a=="" || $b=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE sub_form set tit_subf='$b',form_id=$a where id_subf=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>