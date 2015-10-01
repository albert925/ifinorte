<?php
	include 'config.php';
	include 'fecha_format.php';
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

	$idR=$_GET['nt'];
	if ($idR=="") {
		echo "<script type='text/javascript'>";
			echo "alert('id noticia no disponible');";
			echo "var pagina='index.php';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
	else{
		$datos="SELECT * from noticias where id_nt=$idR";
		$sql_datos=mysql_query($datos,$conexion) or die (mysql_error());
		$numdatos=mysql_num_rows($sql_datos);
		if ($numdatos>0) {
			while ($dt=mysql_fetch_array($sql_datos)) {
				$nmnt=$dt['tit_nt'];
				$rtnt=$dt['rut_nt'];
				$rsnt=$dt['res_nt'];
				$xtnt=$dt['txt_nt'];
				$fent=$dt['fe_nt'];
			}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="<?php echo $nmnt ?>" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title><?php echo "$nmnt"; ?>|Ifinorte</title>
	<link rel="icon" href="imagenes/icon.png" />
	<link rel="image_src" href="imagenes/logo.jpg" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/iconos/style.css" />
	<link rel="stylesheet" href="css/owl_carousel.css" />
	<link rel="stylesheet" href="css/owl_theme_min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/frases.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/owl_carousel_min.js"></script>
	<script src="js/scripag.js"></script>
	<script src="js/ingreG.js"></script>
	<script type="application/ld+json">
		{
		  "@context" : "http://schema.org",
		  "@type" : "LocalBusiness",
		  "name" : "Frases|Ifinorte",
		  "image" : "url"
		}
	</script>
</head>
<body>
	<header>
		<article id="empr">
			<figure id="logo">
				<a href="index.php"><img src="imagenes/logo.png" alt="logo" /></a>
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
					<li><a href="index.php">Inicio</a></li>
					<li><a href="nosotros">Quienes Somos</a></li>
					<li class="submen" data-num="1">
						<a href="portafolio">Portafolio de servicios</a>
						<ul class="children1">
							<?php
								$Tpf="SELECT * from mn_porf order by id_mn_po asc";
								$sql_Tpf=mysql_query($Tpf,$conexion) or die (mysql_error());
								while ($ffp=mysql_fetch_array($sql_Tpf)) {
									$idpf=$ffp['id_mn_po'];
									$nmpf=$ffp['nam_po'];
							?>
							<li><a href="portafolio/portaf.php?pf=<?php echo $idpf ?>"><?php echo "$nmpf"; ?></a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li class="submen" data-num="2">
						<a href="perfil">Perfiles Directivos</a>
						<ul class="children2">
							<?php
								$ttpfiles="SELECT * from tp_dic order by id_tpdc asc";
								$sql_perfil=mysql_query($ttpfiles,$conexion) or die (mysql_error());
								while ($fil=mysql_fetch_array($sql_perfil)) {
									$idfil=$fil['id_tpdc'];
									$nmfil=$fil['man_tpdc'];
							?>
							<li><a href="perfil/tpperfil.php?fl=<?php echo $idfil ?>"><?php echo "$nmfil"; ?></a></li>
							<?php
								}
							?>
						</ul>
					</li>
					<li><a href="boletin">Boletin Informativo</a></li>
					<li><a href="contacto">Contáctenos</a></li>
					<?php
						if ($idus=="0") {
					?>
					<li><a href="registro">Clientes</a></li>
					<?php
						}
						else{
					?>
					<li><a href="usuario"><?php echo $nomP[0]; ?></a>
						<ul>
							<li><a href="usuario">Información</a></li>
							<li><a href="cerrar/us.php">Salir</a></li>
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
					<li><a href="galeria">Galeria</a></li>
					<li><a href="contacto">Quejas y Reclamos</a></li>
					<li><a href="Formatos">Formatos</a></li>
					<?php
						$verMN="SELECT * from men_vert order by id_mv asc";
						$sql_mnv=mysql_query($verMN,$conexion) or die (mysql_error());
						while ($vv=mysql_fetch_array($sql_mnv)) {
							$idmv=$vv['id_mv'];
							$namv=$vv['nam_mv'];
					?>
					<li>
						<div id='flul'>
							<a href="contenido.php?v=<?php echo $idmv ?>&bv=0"><?php echo "$namv"; ?></a>
							<?php
								$exv="SELECT * from sub_mv where mv_id=$idmv";
								$sqlexv=mysql_query($exv,$conexion) or die (mysql_error());
								$numex=mysql_num_rows($sqlexv);
								if ($numex>0) {
							?>
							<div id="mvv<?php echo $idmv ?>" class="submenbb" data-num="<?php echo $idmv ?>">
								<span class="icon-chevron-up"></span>
							</div>
							<?php
								}
							?>
						</div>
						<ul class="clsichil<?php echo $idmv ?>">
							<?php
								$subvv="SELECT * from sub_mv where mv_id=$idmv order by id_submv asc";
								$sql_sbvv=mysql_query($subvv,$conexion) or die (mysql_error());
								$numsbvv=mysql_num_rows($sql_sbvv);
								if ($numsbvv>0) {
									while ($sbvv=mysql_fetch_array($sql_sbvv)) {
										$idsbmv=$sbvv['id_submv'];
										$namsv=$sbvv['nam_submv'];
							?>
							<li><a href="contenido.php?v=<?php echo $idmv ?>&bv=<?php echo $idsbmv ?>"><?php echo "$namsv"; ?></a></li>
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
				<h1><?php echo "$nmnt"; ?></h1>
				<article class="confrases">
					<?php echo "$xtnt"; ?>
				</article>
				<article>
					<i><?php echo fechatraducearray($fent); ?></i>
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
							<img src="<?php echo $rtcv ?>" alt="<?php echo $nmcv ?>" />
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
				<a href="contacto">Contáctenos</a>
				<a href="politicas">Políticas de privacidad y seguridad</a>
				<a href="portafolio">Portafolio de servicios</a>
				<a href="mapa_sitio">Mapa del sitio</a>
			</article>
			<article>
				<a href="tramites">Trámites y Servicios</a>
				<a href="Preguntas">Preguntas Frecuentes</a>
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
<?php
		}
		else{
			echo "<script type='text/javascript'>";
				echo "alert('Noticia ha sido eliminada o no existe');";
				echo "var pagina='index.php';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
?>