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
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administrar menus verticales" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title>admin Galerias| Ifinorte</title>
	<link rel="icon" href="../../../imagenes/icon.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/styadmin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scripag.js"></script>
	<script src="../../../js/scripadmin.js"></script>
	<script src="../../../js/galerias.js"></script>
</head>
<body>
	<header>
		<article id="empr">
			<figure id="logo">
				<a href="../"><img src="../../../imagenes/logo.png" alt="logo" /></a>
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
						<a href="../portafolios">Portafolio de servicios</a>
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
					<li><a href="../noticias">Noticias</a></li>
					<li><a href="../usuarios">Usuarios</a></li>
					<li><a href="../"><?php echo "$usad"; ?></a></li>
					<li><a href="../../../cerrar">Salir</a></li>
				</ul>
			</nav>
		</article>
	</header>
	<nav id="mnad">
		<a href="../galeria">Ver galerias</a>
		<a href="images_galermv.php">Nuevo Imagen galeria</a>
	</nav>
	<section>
		<h1>Imagenes Galerias</h1>
		<article id="automargen">
			<form action="#" method="post" enctype="multipart/form-data" id="nvG" class="columninput">
				<label>*<b>De la galeria</b></label>
				<select id="idglv" name="idglv">
					<option value="0">Seleccione</option>
					<?php
						$Tgl="SELECT * from gal_mv order by id_glmv desc";
						$sql_tgl=mysql_query($Tgl,$conexion) or die (mysql_error());
						while ($lg=mysql_fetch_array($sql_tgl)) {
							$idGv=$lg['id_glmv'];
							$nmGv=$lg['tit_glmv'];
					?>
					<option value="<?php echo $idGv ?>"><?php echo "$nmGv"; ?></option>
					<?php
						}
					?>
				</select>
				<label>*<b>Imagen</b></label>
				<input type="file" id="igmglv" name="igmglv" required />
				<div id="tximage"></div>
				<input type="submit" value="Ingresar" id="nuevimngv" />
			</form>
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
			echo "var pagina='../../erroradm.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>