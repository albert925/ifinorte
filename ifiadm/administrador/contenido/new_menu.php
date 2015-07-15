<?php
	include '../../../config.php';
	$a=$_POST['a'];//nombre menu
	if ($a=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from men_vert where nam_mv='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into men_vert(nam_mv) values('$a')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>