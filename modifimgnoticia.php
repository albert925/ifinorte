<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['ridnt'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['lgmnt']['name'];
		$tipfotA=$_FILES['lgmnt']['type'];
	 	$almfotA=$_FILES['lgmnt']['tmp_name'];
	 	$tamfotA=$_FILES['lgmnt']['size'];
	 	$erorfotA=$_FILES['lgmnt']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/noticias/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=1400;
						$altodeterminad=870;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 1400 x 870";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$sacarrut="SELECT * from noticias where id_nt=$idR";
								$sql_rut=mysql_query($sacarrut,$conexion) or die (mysql_error());
								while ($tr=mysql_fetch_array($sql_rut)) {
									$yrt=$tr['rut_nt'];
								}
								unlink($yrt);
								$ddf="UPDATE noticias set rut_nt='$ruta' where id_nt=$idR";
								mysql_query($ddf,$conexion) or die (mysql_error());
								echo "5";
							}
							else{
								echo "4";
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
	else{
		echo "error";
	}
?>