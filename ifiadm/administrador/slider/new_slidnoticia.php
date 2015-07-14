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
		$a=$_POST['ttsln'];
		$b=$_POST['frsln'];
		$c=$_POST['txtsln'];
		$hoy=date("Y-m-d");
		if ($a=="") {
			echo "<script type='text/javascript'>";
				echo "alert('titulo en blanco');";
				echo "var pagina='../slider';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$ingresar="INSERT into galeria(tit_gal,fra_gal,txt_gal,fe_gal) 
				values('$a','$b','$c','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Slider noticia ingresado');";
				echo "var pagina='../slider';";
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