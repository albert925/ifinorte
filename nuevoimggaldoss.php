<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['idglv'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['igmglv']['name'];
		$tipfotA=$_FILES['igmglv']['type'];
	 	$almfotA=$_FILES['igmglv']['tmp_name'];
	 	$tamfotA=$_FILES['igmglv']['size'];
	 	$erorfotA=$_FILES['igmglv']['error'];
		//----------------------------------------
		if ($idR=="" || $fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/galbb/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$subiendo=@move_uploaded_file($almfotA, $ruta);
						if ($subiendo) {
							$ddf="INSERT into img_galeria(rut_gal,gal_id) values('$ruta','$idR')";
							mysql_query($ddf,$conexion) or die (mysql_error());
							echo "5";
						}
						else{
							echo "4";
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