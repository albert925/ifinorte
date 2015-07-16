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
		$frR=$_GET['ff'];
		echo "$idR";
		if ($idR=="" || $frR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id formato o de archivo no disponible');";
				echo "var pagina='../formatos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$sacarrut="SELECT * from doc_form where id_doc_form=$idR";
			$sql_rut=mysql_query($sacarrut,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_rut)) {
				$rutar=$tr['rut_doc'];
			}
			unlink("../../../".$rutar);
			$borrar="DELETE from doc_form where id_doc_form=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Archivo borrado');";
				echo "var pagina='formatos_doc.php?fo=$frR';";
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