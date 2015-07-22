<?php
	include 'config.php';
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
		$a=$_POST['ttnt'];
		$b=$_POST['restnt'];
		$c=$_POST['txtnt'];
		$hoy=date("Y-m-d");
		//-------------------------------------------
		$fotAcosmodT=$_FILES['gmnt']['name'];
		$tipfotA=$_FILES['gmnt']['type'];
	 	$almfotA=$_FILES['gmnt']['tmp_name'];
	 	$tamfotA=$_FILES['gmnt']['size'];
	 	$erorfotA=$_FILES['gmnt']['error'];
		//----------------------------------------
		if ($a=="" || $b=="") {
			echo "<script type='text/javascript'>";
				echo "alert('titulo o resumen en blanco');";
				echo "var pagina='ifiadm/administrador/noticias/';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($fotAcosmodT=="") {
				$ingresar="INSERT into noticias(tit_nt,res_nt,txt_nt,fe_nt) 
					values('$a','$b','$c','$hoy')";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alert('Noticia ingresada');";
					echo "var pagina='ifiadm/administrador/noticias/';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				if ($erorfotA>0) {
					echo "<script type='text/javascript'>";
						echo "alert('Carpeta sin permisos o resolucion maxima no permitida');";
						echo "var pagina='ifiadm/administrador/noticias/';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
				else{
					$maAximo = 100204000;
					if ($tamfotA<=$maAximo*1024) {
						$ruta="imagenes/noticias/".$fotAcosmodT;
						if (file_exists($ruta)) {
							echo "Una imagen tiene el mismo nombre";
							echo "<script type='text/javascript'>";
								echo "alert('Una imagen ya existe');";
								echo "var pagina='ifiadm/administrador/noticias/';";
								echo "document.location.href=pagina;";
							echo "</script>";
						}
						else{
							$size=getimagesize($almfotA);
							$anchoimagen=$size[0];
							$altoimagen=$size[1];
							$anchodetermindo=1400;
							$altodeterminad=870;
							if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
								echo "Resolucion de imagen no permitida debe ser 1400 x 870";
								echo "<script type='text/javascript'>";
									echo "alert('Resolucion de imagen no permitida');";
									echo "var pagina='ifiadm/administrador/noticias/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
							else{
								$subiendo=@move_uploaded_file($almfotA, $ruta);
								if ($subiendo) {
									$ddf="INSERT into noticias(tit_nt,rut_nt,res_nt,txt_nt,fe_nt) 
										values('$a','$ruta','$b','$c','$hoy')";
									mysql_query($ddf,$conexion) or die (mysql_error());
									echo "<script type='text/javascript'>";
										echo "alert('Noticia ingresada');";
										echo "var pagina='ifiadm/administrador/noticias/';";
										echo "document.location.href=pagina;";
									echo "</script>";
								}
								else{
									echo "<script type='text/javascript'>";
										echo "alert('Carpeta sin permisos o resolucion maxima no permitida');";
										echo "var pagina='ifiadm/administrador/noticias/';";
										echo "document.location.href=pagina;";
									echo "</script>";
								}
							}
						}
					}
					else{
						echo "3";
					}
				}
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='ifiadm/erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>