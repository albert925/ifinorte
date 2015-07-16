<?php
	include '../../../config.php';
	$a=$_POST['a'];//id formato
	$b=$_POST['b'];//nombre subformato
	if ($a=="0" || $a=="" || $b=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from sub_form where tit_subf='$b'";
		$sql_exist=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_exist);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into sub_form(form_id,tit_subf) values($a,'$b')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>