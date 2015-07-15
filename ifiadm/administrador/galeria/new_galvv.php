<?php
	include '../../../config.php';
	$a=$_POST['a'];//tit glaeria
	$hoy=date("Y-m-d");
	if ($a=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from gal_mv where tit_glmv='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into gal_mv(tit_glmv,fe_glmv) values('$a','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>