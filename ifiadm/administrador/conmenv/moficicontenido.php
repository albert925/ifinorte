<?php
	include '../../../config.php';
	session_start();
	if (isset($_SESSION['adm'])) {
		$idsesr=$_SESSION['adm'];
		$datadm="SELECT * from administrador where id_adm=$idsesr";
		$sql_datad=mysql_query($datadm,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_datad)) {
			$idad=$ad['id_adm'];
			$usad=$ad['user_adm'];
			$tpad=$ad['tp_adm'];
		}
		$idR=$_GET['co'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id contenido no disponible');";
				echo "var pagina='../conmenv';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from doc_mv where id_doc_mv=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$ttdc=$dt['tit_mv'];
					$mvdc=$dt['mv_id'];
					$svdc=$dt['submv_id'];
					$rtdc=$dt['rut_docmv'];
					$txdc=$dt['txt_mv'];
					$fedc=$dt['fe_mv'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administrar <?php echo $ttdc ?>" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title>admin <?php echo "$ttdc"; ?>| Ifinorte</title>
	<link rel="icon" href="../../../imagenes/icon.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/styadmin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scripag.js"></script>
	<script src="../../../js/scripadmin.js"></script>
	<script src="../../../js/contendio.js"></script>
	<script src="../../../ckeditor/ckeditor.js"></script>
</head>
<body>
	<header>
		<article id="empr">
			<figure id="logo">
				<a href="../"><img src="../../../imagenes/logo.jpg" alt="logo" /></a>
			</figure>
		</article>
		<article id="mn_red">
			<article id="redes">
				<a href="https://www.facebook.com/ifinorte.nortedesantander" target="_blank"><span class="icon-facebook"></span></a>
				<a href="https://twitter.com/@ifinortecucuta" target="_blank"><span class="icon-twitter"></span></a>
			</article>
			<div id="mn_mv"><span class="icon-menu"></span></div>
			<nav id="mnP">
				<ul>
					<li class="submen" data-num="1">
						<a href="../slider">Sliders</a>
						<ul class="children1">
							<li><a href="../slider">Slider Noticias</a></li>
							<li><a href="../slider/slider_images.php">Slider Imágenes</a></li>
							<li><a href="../proveedor">Proveedores</a></li>
						</ul>
					</li>
					<li class="submen" data-num="2">
						<a class="sell" href="../contenido">Contenido P</a>
						<ul class="children2">
							<li><a href="../contenido/menus.php">Menus Vertical</a></li>
							<li><a href="../contenido/submenus.php">Submenus Vertical</a></li>
							<li><a href="../boletin">Boletin Informativo</a></li>
							<li><a href="../galeria">Galeria</a></li>
							<li><a href="../formatos">Formatos</a></li>
							<li><a href="../conmenv">Contenido menus vertical</a></li>
						</ul>
					</li>
					<li class="submen" data-num="3">
						<a href="portafolios">Portafolio de servicios</a>
						<ul class="children3">
							<li><a href="../portafolios/menuport.php">Menus protafolios</a></li>
							<li><a href="../portafolios">Portafolios</a></li>
						</ul>
					</li>
					<li class="submen" data-num="4">
						<a href="../perfiles">Perfiles Directivos</a>
						<ul class="children4">
							<li><a href="../perfiles/tipo_perfil.php">Tipo de perfiles</a></li>
							<li><a href="../perfiles">Perfiles</a></li>
						</ul>
					</li>
					<li><a href="../boletin">Noticias</a></li>
					<li><a href="../usuarios">Usuarios</a></li>
					<li><a href="../"><?php echo "$usad"; ?></a></li>
					<li><a href="../../../cerrar">Salir</a></li>
				</ul>
			</nav>
		</article>
	</header>
	<nav id="mnad">
		<a href="../conmenv">Ver Contenidos</a>
	</nav>
	<section>
		<h1><?php echo "$ttdc"; ?></h1>
		<article id="automargen" class="flexmoff">
			<article>
				<h2>Cambiar Archivo</h2>
				<form action="#" method="post" enctype="multipart/form-data" id="cmbarch" class="columninput">
					<input type="text" id="idct" name="idct" value="<?php echo $idR ?>" required style="display:none;" />
					<a href="../../../<?php echo $rtdc ?>" target="_blank"><?php echo "$rtdc"; ?></a>
					<input type="file" id="afarch" name="afarch" required />
					<div id="ccA"></div>
					<input type="submit" value="Modificar y subir" id="camarch"  />
				</form>
			</article>
			<article>
				<h2>Modifcar datos</h2>
				<form action="modifc_cont.php" method="post" class="columninput">
					<input type="text" id="irct" name="irct" value="<?php echo $idR ?>" required style="display:none;" />
					<label>*<b>Del Menu</b></label>
					<select id="slmnv" name="slmnv">
						<option value="0">Selecione	</option>
						<?php
							$Tdmn="SELECT * from men_vert order by id_mv desc";
							$sql_tdmn=mysql_query($Tdmn,$conexion) or die (mysql_error());
							while ($mn=mysql_fetch_array($sql_tdmn)) {
								$idmv=$mn['id_mv'];
								$namv=$mn['nam_mv'];
								if ($idmv==$mvdc) {
									$selmenu="selected";
								}
								else{
									$selmenu="";
								}
						?>
						<option value="<?php echo $idmv ?>" <?php echo $selmenu ?>><?php echo "$namv"; ?></option>
						<?php
							}
						?>
					</select>
					<div id="tld"></div>
					<label><b>Del submenu</b></label>
					<select id="slsbv" name="slsbv">
						<option value="0">Selecione</option>
						<?php
							$Tsb="SELECT * from sub_mv order by id_submv desc";
							$sqlsb=mysql_query($Tsb,$conexion) or die (mysql_error());
							while ($bsb=mysql_fetch_array($sqlsb)) {
								$idsbmv=$bsb['id_submv'];
								$namsv=$bsb['nam_submv'];
								if ($idsbmv==$svdc) {
									$selsubm="selected";
								}
								else{
									$selsubm="";
								}
						?>
						<option value="<?php echo $idsbmv ?>" <?php echo $selsubm ?>><?php echo "$namsv"; ?></option>
						<?php
							}
						?>
					</select>
					<label>*<b>Titulo</b></label>
					<input type="text" id="titcont" name="titcont" value="<?php echo $ttdc ?>" required />
					<label>*<b>Texto</b></label>
					<textarea id="editor1" name="txtcont"><?php echo "$txdc"; ?></textarea>
					<script>
						CKEDITOR.replace('txtcont');
					</script>
					<div id="txA"></div>
					<input type="submit" value="Modificar" id="nvcont" />
				</form>
			</article>
		</article>
	</section>
	<footer>
		<div id="automargen" class="bupis"><h2></h2></div>
		<article id="automargen" class="flexfoot">
			<article>
				<div><b>Dirección:</b> Av 0 # 9-80 Edif. ROSETAL</div>
				<div>Cúcuta, Norte de Santander, Colombia</div>
				<div><b>Teléfono:</b> (+57) 5 83 6464</div>
				<div><b>Email:</b> ifinorte@ifinorte.gov.co</div>
				<div><b>Horario:</b> Lunes - Viernes </div>
				<div>08:00 AM - 06:00 PM</div>
			</article>
		</article>
		<article class="footfin">
			<article id="automargen" class="flfin">
				<article>
					COPYRUGHT @ 2015 INFINORTE CÚCUTA COLOMBIA
				</article>
				<article>
					Diseño y Programación &nbsp;&nbsp;<a href="http://conaxport.com/" target="_blank">Conaxport</a>
				</article>
				<article id="redes">
					<a href="https://www.facebook.com/ifinorte.nortedesantander" target="_blank"><span class="icon-facebook"></span></a>
					<a href="https://twitter.com/@ifinortecucuta" target="_blank"><span class="icon-twitter"></span></a>
				</article>
			</article>
		</article>
	</footer>
</body>
</html>
<?php
			}
			else{
				echo "<script type='text/javascript'>";
					echo "alert('Contenido no existe o elimnado');";
					echo "var pagina='../conmenv';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>