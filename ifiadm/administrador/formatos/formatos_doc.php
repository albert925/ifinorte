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
		$idR=$_GET['fo'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id formato no disponible');";
				echo "var pagina='../formatos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$datos="SELECT * from formatos where id_form=$idR";
			$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
			$numdatos=mysql_num_rows($sql_datos);
			if ($numdatos>0) {
				while ($dt=mysql_fetch_array($sql_datos)) {
					$nafo=$dt['tit_form'];
					$fefo=$dt['fe_form'];
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Administrar archivos <?php echo $nafo ?>" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title>admin <?php echo "$nafo"; ?>| Ifinorte</title>
	<link rel="icon" href="../../../imagenes/icon.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/styadmin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scripag.js"></script>
	<script src="../../../js/scripadmin.js"></script>
	<script src="../../../js/formatos.js"></script>
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
		<a href="../formatos">Ver Formatos</a>
		<a href="sub_formato.php">Sub formatos</a>
		<a id="btC" href="doc_formatos.php">Nuevo archivo</a>
	</nav>
	<section>
		<h1>Archivos <?php echo "$nafo"; ?></h1>
		<article id="cjC" class="oulcajas">
			<article id="automargen">
				<form action="#" method="post" enctype="multipart/form-data" id="nvArch" class="columninput">
					<input type="text" id="fmsl" name="fmsl" value="<?php echo $idR ?>" required style="display:none;" />
					<label><b>Del Sub formato</b></label>
					<select id="subfmsl" name="subfmsl">
						<option value="0">Selecione</option>
						<?php
							$Tdsmb="SELECT * from sub_form where form_id=$idR order by id_subf desc";
							$sql_sub=mysql_query($Tdsmb,$conexion) or die (mysql_error());
							while ($sb=mysql_fetch_array($sql_sub)) {
								$idsbfo=$sb['id_subf'];
								$nasbfo=$sb['tit_subf'];
						?>
						<option value="<?php echo $idsbfo ?>"><?php echo "$nasbfo"; ?></option>
						<?php
							}
						?>
					</select>
					<label>*<b>Archivo</b></label>
					<input type="file" id="acfm" name="acfm" required />
					<div id="msacrh"></div>
					<input type="submit" value="Ingresar" id="nvsarch" />
				</form>
			</article>
		</article>
		<article id="automargen" class="flB">
			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				$tamno_pagina=15;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT * from doc_form where form_id=$idR order by id_doc_form asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from doc_form where form_id=$idR order by id_doc_form asc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idar=$gh['id_doc_form'];
					$ifdar=$gh['form_id'];
					$sbfidar=$gh['sub_id'];
					$rutar=$gh['rut_doc'];
			?>
			<article class="columninput">
				<a href="../../../<?php echo $rutar ?>"><?php echo "$rutar"; ?></a>
				<a class="doll" href="borr_archivo.php?br=<?php echo $idar ?>&ff=<?php echo $idR ?>">Borrar</a>
			</article>
			<?php
				}
			?>
		</article>
		<article id="automargen">
			<br />
			<b>Páginas: </b>
			<?php
				//muestro los distintos indices de las paginas
				if ($total_paginas>1) {
					for ($i=1; $i <=$total_paginas ; $i++) { 
						if ($pagina==$i) {
							//si muestro el indice del la pagina actual, no coloco enlace
				?>
					<b><?php echo $pagina." "; ?></b>
				<?php
						}
						else{
							//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
				?>
							<a href="formatos_doc.php?fo=<?php echo $idR ?>&pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

				<?php
						}
					}
				}
			?>
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
					echo "alert('Formato no existe o eliminado');";
					echo "var pagina='../formatos';";
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