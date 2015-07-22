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
				echo "alert('id de proveedor no disponible');";
				echo "var pagina='../proveedor';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$sacruta="SELECT * from proveedor where id_prov=$idR";
			$sql_ruta=mysql_query($sacruta,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_ruta)) {
				$ruita=$tr['rut_prov'];
			}
			unlink("../../../".$ruita);
			$borrar="DELETE from proveedor where id_prov=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Proveedor borrado');";
				echo "var pagina='../proveedor';";
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