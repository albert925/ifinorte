<?php
	include '../../../config.php';
	$idR=$_POST['fb'];//id submenu
	$a=$_POST['a'];//menu id
	$b=$_POST['b'];//nam submenu
	if ($idR=="" || $a=="0" || $a=="" || $b=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE sub_mv set mv_id=$a,nam_submv='$b' where id_submv=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>