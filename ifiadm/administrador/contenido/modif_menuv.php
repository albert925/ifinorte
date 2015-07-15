<?php
	include '../../../config.php';
	$idR=$_POST['fa'];
	$a=$_POST['a'];
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE men_vert set nam_mv='$a' where id_mv=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>