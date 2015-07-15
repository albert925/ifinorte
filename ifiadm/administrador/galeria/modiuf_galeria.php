<?php
	include '../../../config.php';
	$idR=$_POST['fa'];
	$a=$_POST['a'];
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE gal_mv set tit_glmv='$a' where id_glmv=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>