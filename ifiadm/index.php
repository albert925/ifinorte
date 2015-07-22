<?php
	include '../config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Igresar para administrar pagina" />
	<meta name="keywords" content="Finacioero, prestacion de servicios" />
	<title>Ingreso administrador | Ifinorte</title>
	<link rel="icon" href="../imagenes/icon.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/owl_carousel.css" />
	<link rel="stylesheet" href="../css/owl_theme_min.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/owl_carousel_min.js"></script>
	<script src="../js/scripag.js"></script>
	<script src="../js/admin.js"></script>
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
					<li><a class="sell" href="../">Inicio</a></li>
					<li><a href="../nosotros">Quienes Somos</a></li>
					<li class="submen" data-num="1">
						<a href="../portafolio">Portafolio de servicios</a>
						<ul class="children1">
							<li><a href="">Crédito de Fomento</a></li>
							<li><a href="">Crédito de Tesoreria</a></li>
							<li><a href="">Crédito de Libranza</a></li>
							<li><a href="">Administración de recursos</a></li>
							<li><a href="">Factoring</a></li>
							<li><a href="">Certificado de desarrollo territorial</a></li>
							<li><a href="">Deposito a la vista</a></li>
							<li><a href="">MicroCréditos</a></li>
							<li><a href="">Otros Servicios</a></li>
						</ul>
					</li>
					<li class="submen" data-num="2">
						<a href="../perfil">Perfiles Directivos</a>
						<ul class="children2">
							<li><a href="">link 1</a></li>
						</ul>
					</li>
					<li><a href="../boletin">Boletin Informativo</a></li>
					<li><a href="../contacto">Contáctenos</a></li>
					<li><a href="../registro">Clientes</a></li>
				</ul>
			</nav>
		</article>
	</header>
	<section>
		<article id="automargen" class="flmvycont">
			<nav id="mnV">
				<ul>
					<li><a href="../galeria">Galeria</a></li>
					<li><a href="../nosotros">Quejas y Reclamos</a></li>
					<li><a href="../encuestas">Encuestas</a></li>
					<li><a href="../Formatos">Formatos</a></li>
					<li><a href="">men</a>
						<ul>
							<li><a href="">men</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<section>
				<h1>Ingreso Administrador</h1>
				<article>
					<form action="#" method="post" class="columninput">
						<label for="usad"><b>usuario</b></label>
						<input type="text" id="usad" required />
						<label for="psad"><b>Contraseña</b></label>
						<input type="password" id="psad" required />
						<div id="txA"></div>
						<input type="submit" value="Ingresar" id="ingad" />
					</form>
				</article>
			</section>
		</article>
	</section>
	<section class="porfond">
		<article id="automargen" class="prov">
			<article class="owl-carousel owl-theme owl-loaded">
				<div class="item">
					<figure>
						<a href="#" target="_blank">
							<img src="../imagenes/provedores/aa.png" alt="aa" />
						</a>
					</figure>
				</div>
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
				<a href="../preguntas">Preguntas Frecuentes</a>
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