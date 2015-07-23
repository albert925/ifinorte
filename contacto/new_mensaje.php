<?php
	$a=$_POST['a'];//nombre
	$b=$_POST['b'];//correo
	$c=$_POST['c'];//asunto
	$d=$_POST['d'];//mensaje
	$arras=["Selecione","Quejas y Reclamos","Afiliaciones","Crédito","Información","Crédito","Soporte"];
	if ($a=="" || $b=="" || $d=="") {
		echo "1";
	}
	else{
		$asunt=$arras[$c];
		include '../miler/class.phpmailer.php';
		$mail=new PHPMailer();
		$body="<section style='max-width:1100px;'>
			<header>
				<figure>
					<img src='http://ifinorte.gov.co/imagenes/logo.png' alt='logo' />
				</figure>
				<h1>Contacto $a</h1>
			</header>
			<section>
				<article>
					<p>
						<b>Nombres:</b> $a<br />
						<b>Correo:</b> $b<br />
						<b>Asunto:</b> $asunt<br/>
						<b>Mensaje:</b>
					</p>
					<p>
						$d
					</p>
				</article>
				<article>
					<a herf='http://ifinorte.gov.co/' target='_blank'>Página</a>
				</article>
			</section>
		</section>";
		$mail->SetFrom('$b','$a');
		$mail->From = "$b";
		$mail->FromName = "$a";
		$mail->AddReplyTo('$b','$a');
		$address="ifinorte@ifinorte.gov.co";
		$mail->AddAddress($address, "Ifinorte");
		$mail->AddAddress("albertarias925@gmail.com", "Ifinorte");
		$mail->AddAddress("$b", "$a");
		$mail->Subject = "$asunt";
		$mail->AltBody = "Cuerpo alternativo del mensaje";
		$mail->CharSet = 'UTF-8';
		$mail->MsgHTML($body);
		if(!$mail->Send()) {
			echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
		} 
		else {
			echo "2";
		}
	}
?>