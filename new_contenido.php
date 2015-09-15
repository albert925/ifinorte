<?php
	include 'config.php';
	session_start();
	if (isset($_SESSION['adm'])) {//ifiadm/administrador/conmenv/
		$idsesr=$_SESSION['adm'];
		$datadm="SELECT * from administrador where id_adm=$idsesr";
		$sql_datad=mysql_query($datadm,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_datad)) {
			$idad=$ad['id_adm'];
			$usad=$ad['user_adm'];
			$tpad=$ad['tp_adm'];
		}
		$a=$_POST['slmnv'];
		$b=$_POST['slsbv'];
		$c=$_POST['titcont'];
		$d=$_POST['txtcont'];
		$hoy=date("Y-m-d");
		//-------------------------------------------
		$fotAcosmodT=$_FILES['arcct']['name'];
		$tipfotA=$_FILES['arcct']['type'];
	 	$almfotA=$_FILES['arcct']['tmp_name'];
	 	$tamfotA=$_FILES['arcct']['size'];
	 	$erorfotA=$_FILES['arcct']['error'];
		//----------------------------------------
		if ($a=="0" || $a=="" || $c=="") {
			echo "<script type='text/javascript'>";
				echo "alert('Archivo menu o nombre no disponible');";
				echo "var pagina='ifiadm/administrador/conmenv/';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($fotAcosmodT=="") {
				if ($b=="0" || $b=="") {
					$ddf="INSERT into doc_mv(tit_mv,mv_id,txt_mv,fe_mv) 
						values('$c',$a,'$d','$hoy')";
					mysql_query($ddf,$conexion) or die (mysql_error());
					echo "<script type='text/javascript'>";
						echo "alert('Contenido ingresado');";
						echo "var pagina='ifiadm/administrador/conmenv/';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
				else{
					$ddf="INSERT into doc_mv(tit_mv,mv_id,submv_id,txt_mv,fe_mv) 
						values('$c',$a,$b,'$d','$hoy')";
					mysql_query($ddf,$conexion) or die (mysql_error());
					echo "<script type='text/javascript'>";
						echo "alert('Contenido ingresado');";
						echo "var pagina='ifiadm/administrador/conmenv/';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
			}
			else{
				if ($erorfotA>0) {
					echo "<script type='text/javascript'>";
						echo "alert('Carpeta sin permisos');";
						echo "var pagina='ifiadm/administrador/conmenv/';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
				else{
					$maAximo = 100204000;
					if ($tamfotA<=$maAximo*1024) {
						$ruta="documents/".$fotAcosmodT;
						if (file_exists($ruta)) {
							echo "Una archivo tiene el mismo nombre";
							echo "<script type='text/javascript'>";
								echo "alert('Una archivo tiene el mismo nombre');";
								echo "var pagina='ifiadm/administrador/conmenv/';";
								echo "document.location.href=pagina;";
							echo "</script>";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								if ($b=="0" || $b=="") {
									$ddf="INSERT into doc_mv(tit_mv,mv_id,rut_docmv,txt_mv,fe_mv) 
										values('$c',$a,'$ruta','$d','$hoy')";
									mysql_query($ddf,$conexion) or die (mysql_error());
									echo "<script type='text/javascript'>";
										echo "alert('Contenido ingresado');";
										echo "var pagina='ifiadm/administrador/conmenv/';";
										echo "document.location.href=pagina;";
									echo "</script>";
								}
								else{
									$ddf="INSERT into doc_mv(tit_mv,mv_id,submv_id,rut_docmv,txt_mv,fe_mv) 
										values('$c',$a,$b,'$ruta','$d','$hoy')";
									mysql_query($ddf,$conexion) or die (mysql_error());
									echo "<script type='text/javascript'>";
										echo "alert('Contenido ingresado');";
										echo "var pagina='ifiadm/administrador/conmenv/';";
										echo "document.location.href=pagina;";
									echo "</script>";
								}
							}
							else{
								echo "<script type='text/javascript'>";
									echo "alert('Carpeta sin permisos');";
									echo "var pagina='ifiadm/administrador/conmenv/';";
									echo "document.location.href=pagina;";
								echo "</script>";
							}
						}
					}
					else{
						echo "<script type='text/javascript'>";
							echo "alert('Imagen size no permitido');";
							echo "var pagina='ifiadm/administrador/conmenv/';";
							echo "document.location.href=pagina;";
						echo "</script>";
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