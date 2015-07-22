<?php
	include '../config.php';
	$dpR=$_POST['a'];
	if ($dpR=="0" || $dpR=="") {
?>
<option value="0">Departamento no selecionado</option>
<?php
	}
	else{
		$buscar="SELECT * from municipios where depart_id=$dpR order by nam_muni asc";
		$sql_buscar=mysql_query($buscar,$conexion) or die (mysql_error());
		$numbuscar=mysql_num_rows($sql_buscar);
		if ($numbuscar>0) {
			while ($mn=mysql_fetch_array($sql_buscar)) {
				$idmn=$mn['id_municipio'];
				$nmmn=$mn['nam_muni'];
?>
<option value="<?php echo $idmn ?>"><?php echo "$nmmn"; ?></option>
<?php
			}
		}
		else{
?>
<option value="0">Municipios no encontrado</option>
<?php
		}
	}
?>