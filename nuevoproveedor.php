<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$a=$_POST['ttpv'];//nombre
		$b=$_POST['lkpv'];//ruta o link
		//-------------------------------------------
		$fotAcosmodT=$_FILES['gmpv']['name'];
		$tipfotA=$_FILES['gmpv']['type'];
	 	$almfotA=$_FILES['gmpv']['tmp_name'];
	 	$tamfotA=$_FILES['gmpv']['size'];
	 	$erorfotA=$_FILES['gmpv']['error'];
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
					$ruta="imagenes/provedores/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$size=getimagesize($almfotA);
						$anchoimagen=$size[0];
						$altoimagen=$size[1];
						$anchodetermindo=230;
						$altodeterminad=140;
						if ($anchoimagen!=$anchodetermindo && $altoimagen!=$altodeterminad) {
							echo "Resolucion de imagen no permitida debe ser 230 x 140";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ddf="INSERT into proveedor(nam_prov,rut_prov,lk_prov) values('$a','$ruta','$b')";
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