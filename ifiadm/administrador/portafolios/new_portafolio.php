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
		$a=$_POST['slmnpp'];//del tipo
		$b=$_POST['ttpp'];//titulo
		$c=$_POST['txtpp'];//texto
		$hoy=date("Y-m-d");
		if ($a=="0" || $a=="" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alert('tipo o titulo en blanco');";
				echo "var pagina='../portafolios';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$ingresar="INSERT into portafolio(mn_pid,tit_port,txt_port,fe_port) 
				values($a,'$b','$c','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Ingresado');";
				echo "var pagina='../portafolios';";
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