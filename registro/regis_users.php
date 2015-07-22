<?php
	include '../config.php';
	$a=$_POST['a'];//nombres
	$b=$_POST['b'];//apellidos
	$c=$_POST['c'];//correo
	$d=$_POST['d'];//contraseña
	$nombreComp=$a." ".$b;
	$hoy=date("Y-m-d");
	function rand_code($chars,$long)
	{
		$code="";
		for ($x=0; $x <=$long ; $x++) { 
			$rand=rand(1,strlen($chars));
			$code.=substr($chars, $rand,1);
		}
		return $code;
	}
	function cifrarpass($pass)
	{
		$salt="pneyan$/";
		$cifrar=sha1(md5($salt.$pass));
		return $cifrar;
	}
	if ($a=="" || $b=="" || $c=="" || $d=="") {
		echo "1";
	}
	else{
		$pscif=cifrarpass($d);
		$existe="SELECT * from usuarios where cor_us='$c'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012456789";
			$longitud=20;
			$longib=8;
			$codigoal=rand_code($caracteres,$longitud);
			$ingresar="INSERT into usuarios(nom_ap_us,cor_us,pass_us,tp_us,estd_us,cod_reg_us,fecr_us) 
				values('$nombreComp','$c','$pscif','1','2','$codigoal','$hoy')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			$tomar_id="SELECT id_us from usuarios where cor_us='$c'";
			$sql_tomar=mysql_query($tomar_id,$conexion) or die (mysql_error());
			while ($fg=mysql_fetch_array($sql_tomar)) {
				$idus=$fg['id_us'];
			}
			include '../miler/class.phpmailer.php';
			$mail=new PHPMailer();
			$body="<section style='max-width:1100px;'>
				<header>
					<figure>
						<img src='http://ifinorte.gov.co/imagenes/logo.jpg' alt='logo' />
					</figure>
					<h1>Registro</h1>
				</header>
				<section>
					<article>
						<p>
							Hola $a $b te has registrado en la página de Ifinorte para poder 
							ingresar click en el siguiente link para activar tu cuenta.
						</p>
						<p>
							Link de activación: 
							<a style='background: #002457;color: #fff;text-decoration: none;padding: 0.5em 0;' 
								href='http://ifinorte.gov.co/activacion.php?alg=$codigoal&di=$idus' target='_blank'>
								Terminar Registro
							</a>
						</p>
					</article>
					<article>
						<a herf='http://ifinorte.gov.co/' target='_blank'>Página</a>
					</article>
				</section>
			</section>";
			$mail->SetFrom('no-reply@inmobiliariaprovase.com.co','Ifinorte');
			$mail->From = "no-reply@inmobiliariaprovase.com.co";
			$mail->FromName = "Ifinorte";
			$mail->AddReplyTo('no-reply@inmobiliariaprovase.com.co','Ifinorte');
			$address="$c";
			$mail->AddAddress($address, "$a $b");
			$mail->Subject = "Registro";
			$mail->AltBody = "Cuerpo alternativo del mensaje";
			$mail->CharSet = 'UTF-8';
			$mail->MsgHTML($body);
			if(!$mail->Send()) {
				echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
			} 
			else {
				echo "3";
			}
		}
	}
?>