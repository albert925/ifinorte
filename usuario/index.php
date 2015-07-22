<?php
	include '../config.php';
	include '../fecha_format.php';
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
	<meta name="description" content="datos e información de <?php echo $nmus; ?>" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title><?php echo $nomP[0]; ?>|Ifinorte</title>
	<link rel="icon" href="../imagenes/icon.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/owl_carousel.css" />
	<link rel="stylesheet" href="../css/owl_theme_min.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/users.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/owl_carousel_min.js"></script>
	<script src="../js/scripag.js"></script>
	<script src="../js/uscamb.js"></script>
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
						<ul class="children2">
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
					<li><a class="sell" href="../usuario"><?php echo $nomP[0]; ?></a>
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
		<h1>Datos <?php echo "$nmus"; ?></h1>
		<article id="automargen" class="flrg">
			<article class="columninput cjaus">
				<h2>Datos</h2>
				<label>*<b>Nombre y Apellidos</b></label>
				<input type="text" id="fas" value="<?php echo $nmus ?>" />
				<label><b>N° Teléfono</b></label>
				<input  type="tel" id="fbs" value="<?php echo $tlus ?>" />
				<label><b>N° Celular</b></label>
				<input type="tel" id="fcs" value="<?php echo $mvus ?>" />
				<label>*<b>Departamento</b></label>
				<select id="depar">
					<option value="0">Seleccione</option>
					<?php
						$Tdpd="SELECT * from departamentos order by nam_depart asc";
						$sqldpd=mysql_query($Tdpd,$conexion) or die (mysql_error());
						while ($pd=mysql_fetch_array($sqldpd)) {
							$idpd=$pd['id_depart'];
							$nmpd=$pd['nam_depart'];
							if ($idpd==$dpus) {
								$seldepart="selected";
							}
							else{
								$seldepart="";
							}
					?>
					<option value="<?php echo $idpd ?>" <?php echo $seldepart ?>><?php echo "$nmpd"; ?></option>
					<?php
						}
					?>
				</select>
				<div id="txmn"></div>
				<label>*<b>Municipio</b></label>
				<select id="muni">
					<option value="0">Seleccione</option>
					<?php
						$Tmn="SELECT * from municipios order by nam_muni asc";
						$sql_mn=mysql_query($Tmn,$conexion) or die (mysql_error());
						while ($mn=mysql_fetch_array($sql_mn)) {
							$idmuni=$mn['id_municipio'];
							$nammuni=$mn['nam_muni'];
							if ($idmuni==$mnus) {
								$selmuni="selected";
							}
							else{
								$selmuni="";
							}
					?>
					<option value="<?php echo $idmuni ?>" <?php echo $selmuni ?>><?php echo "$nammuni"; ?></option>
					<?php
						}
					?>
				</select>
				<label><b>Dirección</b></label>
				<input type="text" id="ffs" value="<?php echo $drus ?>" />
				<div id="txA"></div>
				<input type="submit" value="Modificar" id="camA" data-us="<?php echo $idus ?>" />
			</article>
			<article class="cjaus">
				<article class="columninput">
					<h2>Correo</h2>
					<input type="email" id="corF" value="<?php echo $crus ?>" />
					<div id="txB"></div>
					<input type="submit" value="Cambiar" id="camB" data-us="<?php echo $idus ?>" />
				</article>
				<article class="columninput">
					<h2>Cédula</h2>
					<?php
						if ($ccus=="") {
					?>
					<input type="number" id="ccF" />
					<div id="txC"></div>
					<input type="submit" value="Ingresar" id="camC" data-us="<?php echo $idus ?>" />
					<?php
						}
						else{
					?>
					<label><b><?php echo "$ccus"; ?></b></label>
					<?php
						}
					?>
				</article>
			</article>
			<article class="columninput cjaus">
				<h2>Cambiar contraseña</h2>
				<label>*<b>Contraseña actual</b></label>
				<input type="password" id="coac" />
				<label>*<b>Contraseña nueva</b></label>
				<input type="password" id="cona" />
				<label>*<b>Repite la contraseña nueva</b></label>
				<input type="password" id="conb" />
				<div id="txD"></div>
				<input type="submit" value="Cambiar" id="camD" data-us="<?php echo $idus ?>" />
			</article>
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