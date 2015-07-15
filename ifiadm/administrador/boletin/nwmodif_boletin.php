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
		$a=$_POST['nmbol'];
		$b=$_POST['txbol'];
		$hoy=date("Y-m-d");	
		$hayUndat="SELECT * from boletin where 1";
		$sql_undt=mysql_query($hayUndat,$conexion) or die (mysql_error());
		$numdt=mysql_num_rows($sql_undt);
		if ($numdt>0) {
			$modificar="UPDATE boletin set tit_bl='$a',txt_bl='$b',fe_bl='$hoy' where id_bl=1";
			mysql_query($modificar,$conexion) or die (mysql_error());
		}
		else{
			$ingresar="INSERT into boletin(tit_bl,txt_bl,fe_bl) values('$a','$b','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
		}
		echo "<script type='text/javascript'>";
			echo "alert('modificado');";
			echo "var pagina='../boletin';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>