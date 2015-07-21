<?php
	include '../../../config.php';
	$idR=$_POST['fa'];
	$a=$_POST['a'];
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE tp_dic set man_tpdc='$a' where id_tpdc=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>