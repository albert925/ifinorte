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
		$idR=$_POST['irct'];
		$a=$_POST['slmnv'];
		$b=$_POST['slsbv'];
		$c=$_POST['titcont'];
		$d=$_POST['txtcont'];
		if ($idR=="" || $a=="0" || $a=="" || $c=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id contenido no disponible');";
				echo "var pagina='../conmenv';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($b=="0" || $b=="") {
				$modificar="UPDATE doc_mv set tit_mv='$c',mv_id=$a,txt_mv='$d' where id_doc_mv=$idR";
				mysql_query($modificar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alert('Modificado');";
					echo "var pagina='moficicontenido.php?co=$idR';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				$modificar="UPDATE doc_mv set tit_mv='$c',mv_id=$a,submv_id=$b,txt_mv='$d' where id_doc_mv=$idR";
				mysql_query($modificar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alert('Modificado');";
					echo "var pagina='moficicontenido.php?co=$idR';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>