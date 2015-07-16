<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$idF=$_POST['fmsl'];
		$idSf=$_POST['subfmsl'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['acfm']['name'];
		$tipfotA=$_FILES['acfm']['type'];
	 	$almfotA=$_FILES['acfm']['tmp_name'];
	 	$tamfotA=$_FILES['acfm']['size'];
	 	$erorfotA=$_FILES['acfm']['error'];
		//----------------------------------------
		if ($idF=="" || $fotAcosmodT=="") {
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
							if ($idSf=="0" || $idSf=="") {
								$ddf="INSERT into doc_form(form_id,rut_doc) values($idF,'$ruta')";
								mysql_query($ddf,$conexion) or die (mysql_error());
								echo "5";
							}
							else{
								$ddf="INSERT into doc_form(form_id,sub_id,rut_doc) values($idF,$idSf,'$ruta')";
								mysql_query($ddf,$conexion) or die (mysql_error());
								echo "5";
							}
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