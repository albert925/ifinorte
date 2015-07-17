<?php
	include '../../../config.php';
	$idR=$_POST['fa'];
	$a=$_POST['a'];
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE mn_porf set nam_po='$a' where id_mn_po=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>