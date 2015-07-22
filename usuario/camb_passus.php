<?php
	include '../config.php';
	$idR=$_POST['fdd'];
	$pasactual=$_POST['a'];
	$passnew=$_POST['b'];
	function cifrarpass($pass)
	{
		$salt="pneyan$/";
		$cifrar=sha1(md5($salt.$pass));
		return $cifrar;
	}
	if ($idR=="" || $pasactual=="" || $passnew=="") {
		echo "1";
	}
	else{
		$a=cifrarpass($pasactual);
		$b=cifrarpass($passnew);
		$existe="SELECT * from usuarios where id_us=$idR and pass_us='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numexiste=mysql_num_rows($sql_existe);
		if ($numexiste>0) {
			$modificar="UPDATE usuarios set pass_us='$b' where id_us=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>