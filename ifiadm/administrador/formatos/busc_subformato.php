<?php
	include '../../../config.php';
	$idF=$_POST['a'];
	if ($idF=="0" || $idF=="") {
?>
<option value="0">Formato no selecionado</option>
<?php
	}
	else{
		$buscar="SELECT * from sub_form where form_id=$idF order by tit_subf asc";
		$sql_bus=mysql_query($buscar,$conexion) or die (mysql_error());
		$numbus=mysql_num_rows($sql_bus);
		if ($numbus>0) {
?>
<option value="0">Selecione</option>
<?php
			while ($bbs=mysql_fetch_array($sql_bus)) {
				$idsb=$bbs['id_subf'];
				$nasb=$bbs['tit_subf'];
		?>
<option value="<?php echo $idsb ?>"><?php echo "$nasb"; ?></option>
		<?php
			}
		}
		else{
?>
<option value="0">Sub menu no encontrado</option>
<?php
		}
	}
?>