<?php
	include '../../../config.php';
	$idR=$_POST['fa'];
	$a=$_POST['a'];
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE formatos set tit_form='$a' where id_form=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>