<?php
	include '../../../config.php';
	$a=$_POST['a'];
	$hoy=date("Y-m-d");
	if ($a=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from formatos where tit_form='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into formatos(tit_form,fe_form) values('$a','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>