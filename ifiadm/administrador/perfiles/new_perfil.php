<?php
	include '../../../config.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$idsesr=$_SESSION['adm'];
		$datadm="SELECT * from administrador where id_adm=$idsesr";
		$sql_datad=mysql_query($datadm,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_datad)) {
			$idad=$ad['id_adm'];
			$usad=$ad['user_adm'];
			$tpad=$ad['tp_adm'];
		}
		$a=$_POST['slmndc'];//tipo
		$b=$_POST['ttdc'];//titulo
		$c=$_POST['txtdc'];//texto
		if ($a=="0" || $a=="" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id tipo o titulo en blanco');";
				echo "var pagina='../perfiles';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$ingresar="INSERT into directivos(dc_id,nam_dic,txt_dic) values($a,'$b','$c')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('perfil ingresado');";
				echo "var pagina='../perfiles';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>