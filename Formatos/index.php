<?php
	include '../config.php';
	session_start();
	if (isset($_SESSION['us'])) {
		$Russ=$_SESSION['us'];
		$userdats="SELECT * from usuarios where id_us=$Russ";
		$sql_users=mysql_query($userdats,$conexion) or die (mysql_error());
		while ($us=mysql_fetch_array($sql_users)) {
			$idus=$us['id_us'];
			$avus=$us['avat_us'];
			$ccus=$us['cc_us'];
			$nmus=$us['nom_ap_us'];
			$crus=$us['cor_us'];
			$tlus=$us['tel_us'];
			$mvus=$us['mov_us'];
			$dpus=$us['depart_id'];
			$mnus=$us['muni_id'];
			$drus=$us['direc_us'];
			$tpus=$us['tp_us'];
			$cfus=$us['corrfm_us'];
			$feus=$us['fecr_us'];
		}
		$nomP=split(" ", $nmus);
	}
	else{
		$idus=0;
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Formatos ifinorte" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title>Formatos|Ifinorte</title>
	<link rel="icon" href="../imagenes/icon.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/owl_carousel.css" />
	<link rel="stylesheet" href="../css/owl_theme_min.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/frases.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/owl_carousel_min.js"></script>
	<script src="../js/scripag.js"></script>
	<script src="../js/ingreG.js"></script>
	<script type="application/ld+json">
		{
		  "@context" : "http://schema.org",
		  "@type" : "LocalBusiness",
		  "name" : "Galeria|Ifinorte",
		  "image" : "url"
		}
	</script>
</head>
<body>
	<header>
		<article id="empr">
			<figure id="logo">
				<a href="../"><img src="../imagenes/logo.png" alt="logo" /></a>
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
					<li><a href="../">Inicio</a></li>
					<li><a href="../nosotros">Quienes Somos</a></li>
					<li class="submen" data-num="1">
						<a href="../portafolio">Portafolio de servicios</a>
						<ul class="children1">
							<?php
								$Tpf="SELECT * from mn_porf order by nam_po asc";
								$sql_Tpf=mysql_query($Tpf,$conexion) or die (mysql_error());
								while ($ffp=mysql_fetch_array($sql_Tpf)) {
									$idpf=$ffp['id_mn_po'];
									$nmpf=$ffp['nam_po'];
							?>
							<li><a href="../portafolio/portaf.php?pf=<?php echo $idpf ?>"><?php echo "$nmpf"; ?></a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li class="submen" data-num="2">
						<a href="../perfil">Perfiles Directivos</a>
						<ul class="../children2">
							<?php
								$ttpfiles="SELECT * from tp_dic order by id_tpdc asc";
								$sql_perfil=mysql_query($ttpfiles,$conexion) or die (mysql_error());
								while ($fil=mysql_fetch_array($sql_perfil)) {
									$idfil=$fil['id_tpdc'];
									$nmfil=$fil['man_tpdc'];
							?>
							<li><a href="../perfil/tpperfil.php?fl=<?php echo $idfil ?>"><?php echo "$nmfil"; ?></a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li><a href="../boletin">Boletin Informativo</a></li>
					<li><a href="../contacto">Contáctenos</a></li>
					<?php
						if ($idus=="0") {
					?>
					<li><a href="../registro">Clientes</a></li>
					<?php
						}
						else{
					?>
					<li><a href="../usuario"><?php echo $nomP[0]; ?></a>
						<ul>
							<li><a href="../usuario">Información</a></li>
							<li><a href="../cerrar/us.php">Salir</a></li>
						</ul>
					</li>
					<?php
						}
					?>
				</ul>
			</nav>
		</article>
	</header>
	<section>
		<article id="automargen" class="flmvycont">
			<nav id="mnV">
				<ul>
					<li><a href="../galeria">Galeria</a></li>
					<li><a href="../contacto">Quejas y Reclamos</a></li>
					<li><a href="../encuestas">Encuestas</a></li>
					<li><a class="sell" href="../Formatos">Formatos</a></li>
					<?php
						$verMN="SELECT * from men_vert order by id_mv desc";
						$sql_mnv=mysql_query($verMN,$conexion) or die (mysql_error());
						while ($vv=mysql_fetch_array($sql_mnv)) {
							$idmv=$vv['id_mv'];
							$namv=$vv['nam_mv'];
					?>
					<li class="submenbb" data-num="<?php echo $idmv ?>">
						<a href="../contenido.php?v=<?php echo $idmv ?>&bv=0"><?php echo "$namv"; ?></a>
						<ul class="clsichil<?php echo $idmv ?>">
							<?php
								$subvv="SELECT * from sub_mv where mv_id=$idmv order by id_submv desc";
								$sql_sbvv=mysql_query($subvv,$conexion) or die (mysql_error());
								$numsbvv=mysql_num_rows($sql_sbvv);
								if ($numsbvv>0) {
									while ($sbvv=mysql_fetch_array($sql_sbvv)) {
										$idsbmv=$sbvv['id_submv'];
										$namsv=$sbvv['nam_submv'];
							?>
							<li><a href="../contenido.php?v=<?php echo $idmv ?>&bv=<?php echo $idsbmv ?>"><?php echo "$namsv"; ?></a></li>
							<?php
									}
								}
							?>
						</ul>
					</li>
					<?php
						}
					?>
				</ul>
			</nav>
			<section>
				<h1>Formatos</h1>
				<article class="flgal">
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
						$ssql="SELECT * from formatos order by id_form desc";
						$rs=mysql_query($ssql,$conexion) or die (mysql_error());
						$num_total_registros= mysql_num_rows($rs);
						$total_paginas= ceil($num_total_registros / $tamno_pagina);
						$gsql="SELECT * from formatos order by id_form desc limit $inicio, $tamno_pagina";
						$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
						while ($gh=mysql_fetch_array($impsql)) {
							$idfo=$gh['id_form'];
							$nafo=$gh['tit_form'];
							$fefo=$gh['fe_form'];
					?>
					<article class="cjform">
						<h2><a href="ind2x.php?fa=<?php echo $idfo ?>&fb=0"><?php echo "$nafo"; ?></a></h2>
						<article class="columninput">
							<?php
								$subfor="SELECT * from sub_form where form_id=$idfo order by id_subf desc";
								$sql_subfor=mysql_query($subfor,$conexion) or die (mysql_error());
								while ($bsf=mysql_fetch_array($sql_subfor)) {
									$idsbfo=$bsf['id_subf'];
									$nasbfo=$bsf['tit_subf'];
							?>
							<a href="ind2x.php?fa=<?php echo $idfo ?>&fb=<?php echo $idsbfo ?>"><?php echo "$nasbfo"; ?></a>
							<?php
								}
							?>
						</article>
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
									<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

						<?php
								}
							}
						}
					?>
				</article>
			</section>
		</article>
	</section>
	<section class="porfond">
		<article id="automargen" class="prov">
			<article class="owl-carousel owl-theme owl-loaded">
				<?php
					$proveCol="SELECT * from proveedor order by id_prov desc";
					$sqlcolpvv=mysql_query($proveCol,$conexion) or die (mysql_error());
					while ($clcv=mysql_fetch_array($sqlcolpvv)) {
						$idcv=$clcv['id_prov'];
						$nmcv=$clcv['nam_prov'];
						$rtcv=$clcv['rut_prov'];
						$lkcv=$clcv['lk_prov'];
						if ($lkcv=="") {
							$vclk="#";
						}
						else{
							$vclk=$lkcv;
						}
				?>
				<div class="item">
					<figure>
						<a href="<?php echo $vclk ?>" target="_blank">
							<img src="../<?php echo $rtcv ?>" alt="<?php echo $nmcv ?>" />
						</a>
					</figure>
				</div>
				<?php
					}
				?>
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
			<article>
				<a href="../contacto">Contáctenos</a>
				<a href="../politicas">Políticas de privacidad y seguridad</a>
				<a href="../portafolio">Portafolio de servicios</a>
				<a href="../mapa_sitio">Mapa del sitio</a>
			</article>
			<article>
				<a href="../tramites">Trámites y Servicios</a>
				<a href="../Preguntas">Preguntas Frecuentes</a>
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
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.owl-carousel').owlCarousel({
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				dots:false,
				loop:false,
				margin:10,
				responsiveClass:true,
				nav:false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:3
					},
					1200:{
						items:5
					}
				}
			});
		});
	</script>
</body>
</html>