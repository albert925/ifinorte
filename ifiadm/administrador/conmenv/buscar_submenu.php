<?php
	include '../../../config.php';
	$Mn=$_POST['a'];
	if ($Mn=="0" || $Mn=="") {
?>
<option value="0">Menu no selecionada</option>
<?php
	}
	else{
		$buscar="SELECT * from sub_mv where mv_id=$Mn order by nam_submv asc";
		$sql_buscar=mysql_query($buscar,$conexion) or die (mysql_error());
		$numbus=mysql_num_rows($sql_buscar);
		if ($numbus>0) {
?>
<option value="0">Selecione</option>
<?php
			while ($bs=mysql_fetch_array($sql_buscar)) {
				$idsbmv=$bs['id_submv'];
				$namsv=$bs['nam_submv'];
?>
<option value="<?php echo $idsbmv ?>"><?php echo "$namsv"; ?></option>
<?php
			}
		}
		else{
?>
<option value="0">Submenu no encontrado</option>
<?php
		}
	}
?>