<?php
	include '../../../config.php';
	$a=$_POST['a'];
	if ($a=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from mn_porf where nam_po='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into mn_porf(nam_po) values('$a')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>