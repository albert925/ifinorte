<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idR=$_POST['idct'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['afarch']['name'];
		$tipfotA=$_FILES['afarch']['type'];
	 	$almfotA=$_FILES['afarch']['tmp_name'];
	 	$tamfotA=$_FILES['afarch']['size'];
	 	$erorfotA=$_FILES['afarch']['error'];
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
					$ruta="documents/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una archivo tiene el mismo nombre";
					}
					else{
						$subiendo=@move_uploaded_file($almfotA, $ruta);
						if ($subiendo) {
							$sacarruta="SELECT rut_docmv from doc_mv where id_doc_mv=$idR";
							$sqlrut=mysql_query($sacarruta,$conexion) or die (mysql_error());
							while ($tr=mysql_fetch_array($sqlrut)) {
								$ruttr=$tr['rut_docmv'];
							}
							unlink($ruttr);
							$ddf="UPDATE doc_mv set rut_docmv='$ruta' where id_doc_mv=$idR";
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