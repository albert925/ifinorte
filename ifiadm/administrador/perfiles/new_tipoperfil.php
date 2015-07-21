<?php
	include '../../../config.php';
	$a=$_POST['a'];
	if ($a=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from tp_dic where man_tpdc='$a'";
		$sql_exist=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_exist);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into tp_dic(man_tpdc) values('$a')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>