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
		$idR=$_GET['br'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id sub formato no disponible');";
				echo "var pagina='sub_formato.php';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$borrar="DELETE from sub_form where id_subf=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Subformato borrado');";
				echo "var pagina='sub_formato.php';";
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