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
		$idR=$_POST['idSn'];
		$a=$_POST['ttsln'];
		$b=$_POST['frsln'];
		$c=$_POST['txtsln'];
		if ($idR=="" || $a=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id de slider noticia no disponible');";
				echo "var pagina='../slider';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$modificar="UPDATE galeria set tit_gal='$a',fra_gal='$b',txt_gal='$c' where id_gal=$idR";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Informacion modificada');";
				echo "var pagina='modifslinot.php?nt=$idR';";
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