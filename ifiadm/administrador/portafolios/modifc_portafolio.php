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
		$idR=$_POST['idpt'];
		$a=$_POST['slmnpp'];//del tipo
		$b=$_POST['ttpp'];//titulo
		$c=$_POST['txtpp'];//texto
		$hoy=date("Y-m-d");
		if ($idR=="" || $a=="0" || $a=="" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alert('datos no disponible');";
				echo "var pagina='../portafolios';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$dmodificar="UPDATE portafolio set mn_pid=$a,tit_port='$b',txt_port='$c' where id_port=$idR";
			mysql_query($dmodificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Modificado');";
				echo "var pagina='moficiportafolio.php?co=$idR';";
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