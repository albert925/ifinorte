<?php
	include '../../../config.php';
	$a=$_POST['a'];//nombre submenu
	$b=$_POST['b'];//del menu Vp
	if ($a=="" || $b=="0" || $b=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from sub_mv where nam_submv='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into sub_mv(mv_id,nam_submv) values($b,'$a')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>