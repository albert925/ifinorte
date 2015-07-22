<?php
	include '../config.php';
	$idR=$_POST['fad'];//id us
	$a=$_POST['a'];//nombres y paellido
	$b=$_POST['b'];//telelfono
	$c=$_POST['c'];//celular
	$d=$_POST['d'];//departamento
	$e=$_POST['e'];//municipio
	$f=$_POST['f'];//direccion
	if ($idR=="" || $a=="" || $d=="0" || $d=="" || $e=="0" || $e=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE usuarios set nom_ap_us='$a',tel_us='$b',
			mov_us='$c',depart_id=$d,muni_id=$e,direc_us='$f' where id_us=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>