<?php
	include 'config.php';
	$a=$_POST['a'];//users
	$b=$_POST['b'];//ps
	function cifrarpass($pass)
	{
		$salt="pneyan$/";
		$cifrar=sha1(md5($salt.$pass));
		return $cifrar;
	}
	if ($a=="" || $b=="") {
		echo "1";
	}
	else{
		$passcifr=cifrarpass($b);
		$existe="SELECT * from usuarios where cor_us='$a' and pass_us='$passcifr'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$Numexs=mysql_num_rows($sql_existe);
		if ($Numexs>0) {
			$activado="SELECT * from usuarios where cor_us='$a' and estd_us='1'";
			$sqlacti=mysql_query($activado,$conexion) or die (mysql_error());
			$numact=mysql_num_rows($sqlacti);
			if ($numact>0) {
				while ($us=mysql_fetch_array($sql_existe)) {
					$idus=$us['id_us'];
				}
				session_start();
				$_SESSION['us']=$idus;
				echo "4";
			}
			else{
				echo "3";
			}
		}
		else{
			echo "2";
		}
	}
?>