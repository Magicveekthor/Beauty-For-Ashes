<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendvolunteer($name, $email, $phone, $address, $gender, $message){
	//Load Composer's autoloader
	require 'vendor/autoload.php';

	//Create an instance passing `true` enables exception
	$mail = new PHPMailer(true);

	try {
		//Server setting
		$mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
		$mail->isSMTP();
		$mail->SMTPKeepAlive = true; // Set mailer to use SMTP                                            //Send using SMTP
		$mail->Host       = 'beautyforashesint.org';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'control@beautyforashesint.org';                     //SMTP username
		$mail->Password   = 'indbpffleedmswao';                               //SMTP password
		$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
		$mail->Port       = 465;                     //Enable verbose debug output

		//Recipients
		$mail->setFrom('control@beautyforashesint.org', 'Beauty For Ashes');
		$mail->addAddress('Contact@beautyforashesint.org');     //Add a recipient

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Message Notification - Become a Volunteer';
		$mail->Body = "
	<!DOCTYPE html>
	<html lang='en'>
		<head>
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'> 
			<meta name='x-apple-disable-message-reformatting'>
			<title></title>
			<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i' rel='stylesheet'>
		<style>

		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
			background: #f1f1f1;
		}


		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}


		div[style*='margin: 16px 0'] {
			margin: 0 !important;
		}


		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}
		img {
			-ms-interpolation-mode:bicubic;
		}

		a {
			text-decoration: none;
		}

		*[x-apple-data-detectors], 
		.unstyle-auto-detected-links *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		.im {
			color: inherit !important;
		}

		img.g-img + div {
			display: none !important;
		}

		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u ~ div .email-container {
				min-width: 320px !important;
			}
		}

		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u ~ div .email-container {
				min-width: 375px !important;
			}
		}

		@media only screen and (min-device-width: 414px) {
			u ~ div .email-container {
				min-width: 414px !important;
			}
		}

		</style>

		<style>

		.primary{
			background: #f3a333;
		}

		.bg_white{
			background: #ffffff;
		}
		.bg_light{
			background: #fafafa;
		}
		.bg_black{
			background: #000000;
		}
		.bg_dark{
			background: rgba(0,0,0,.8);
		}
		.email-section{
			padding:2.5em;
		}

		/*BUTTON*/
		.btn{
			padding: 10px 15px;
		}
		.btn.btn-primary{
			border-radius: 30px;
			background: #f3a333;
			color: #ffffff;
		}



		h1,h2,h3,h4,h5,h6{
			font-family: 'Playfair Display', serif;
			color: #000000;
			margin-top: 0;
		}

		body{
			font-family: 'Montserrat', sans-serif;
			font-weight: 400;
			font-size: 15px;
			line-height: 1.8;
			color: rgba(0,0,0,.4);
		}

		a{
			color: #f3a333;
		}



		.logo h1{
			margin: 0;
		}
		.logo h1 a{
			color: #000;
			font-size: 20px;
			font-weight: 700;
			text-transform: uppercase;
			font-family: 'Montserrat', sans-serif;
		}


		.hero{
			position: relative;
		}

		.hero .text{
			color: rgba(255,255,255,.8);
		}
		.hero .text h2{
			color: #ffffff;
			font-size: 30px;
			margin-bottom: 0;
		}

		.heading-section h2{
			color: #000000;
			font-size: 28px;
			margin-top: 0;
			line-height: 1.4;
		}
		.heading-section .subheading{
			margin-bottom: 20px !important;
			display: inline-block;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: rgba(0,0,0,.4);
			position: relative;
		}
		.heading-section .subheading::after{
			position: absolute;
			left: 0;
			right: 0;
			bottom: -10px;
			content: '';
			width: 100%;
			height: 2px;
			background: #f3a333;
			margin: 0 auto;
		}

		.heading-section-white{
			color: rgba(255,255,255,.8);
		}
		.heading-section-white h2{
			font-size: 28px;
			line-height: 1;
			padding-bottom: 0;
		}
		.heading-section-white h2{
			color: #ffffff;
		}
		.heading-section-white .subheading{
			margin-bottom: 0;
			display: inline-block;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: rgba(255,255,255,.4);
		}


		.icon{
			text-align: center;
		}

		.text-services{
			padding: 10px 10px 0;
			text-align: center;
		}
		.text-services h3{
			font-size: 20px;
		}

		@media screen and (max-width: 500px) {

			.icon{
				text-align: left;
			}

			.text-services{
				padding-left: 0;
				padding-right: 20px;
				text-align: left;
			}

		}

		</style>


		</head>

		<body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly;'>
			<center style='width: 100%; background-color: #f1f1f1;'>
			<div style='max-width: 600px; margin: 0 auto;' class='email-container'>
				<!-- BEGIN BODY -->
			<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
				<tr>
					<td class='bg_white'>
						<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
						<tr>
							<td class='bg_white email-section'>
								<div class='heading-section' style='text-align: center; padding: 0 30px;'>
								<h2>New Message from Beauty For Ashes (Become a Volunteer)</h2>
								</div>
								<table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Full Name</h3>
										<p>$name</p>
									</td>
								</tr>
								</table>
							</td>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Email Address</h3>
										<p>$email</p>
									</td>
								</tr>
								</table>
							</td>
							</tr>
							<tr>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Phone Number</h3>
										<p>$phone</p>
									</td>
								</tr>
								</table>
							</td>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Address</h3>
										<p>$address</p>
									</td>
								</tr>
								</table>
							</td>
							</tr>
							<tr><td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Gender</h3>
										<p>$gender</p>
									</td>
								</tr>
								</table>
							</td>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Comment</h3>
										<p>$message</p>
									</td>
								</tr>
								</table>
							</td>
							</tr>
								</table>
							</td>
						</tr>
						</table>
					</td>
					</tr>
			</table>

			</div>
		</center>
		</body>
	</html>";
	$mail->send();

	// if($mail) {
	// 	header("Location: success.html");
    //     exit(); // Ensure no further code is executed
	// }
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}


function sendmessage($name, $email, $phone, $subject, $message){
	//Load Composer's autoloader
	require 'vendor/autoload.php';

	//Create an instance passing `true` enables exception
	$mail = new PHPMailer(true);

	try {
		//Server setting
		$mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
		$mail->isSMTP();
		$mail->SMTPKeepAlive = true; // Set mailer to use SMTP                                            //Send using SMTP
		$mail->Host       = 'beautyforashesint.org';                     //Set the SMTP server to send through
		$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		$mail->Username   = 'control@beautyforashesint.org';                     //SMTP username
		$mail->Password   = 'indbpffleedmswao';                               //SMTP password
		$mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
		$mail->Port       = 465;                     //Enable verbose debug output

		//Recipients
		$mail->setFrom('control@beautyforashesint.org', 'Beauty For Ashes');
		$mail->addAddress('Contact@beautyforashesint.org');     //Add a recipient

		//Content
		$mail->isHTML(true);                                  //Set email format to HTML
		$mail->Subject = 'Message Notification';
		$mail->Body = "
	<!DOCTYPE html>
	<html lang='en'>
		<head>
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width'>
			<meta http-equiv='X-UA-Compatible' content='IE=edge'> 
			<meta name='x-apple-disable-message-reformatting'>
			<title></title>
			<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i' rel='stylesheet'>
		<style>

		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
			background: #f1f1f1;
		}


		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}


		div[style*='margin: 16px 0'] {
			margin: 0 !important;
		}


		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}
		img {
			-ms-interpolation-mode:bicubic;
		}

		a {
			text-decoration: none;
		}

		*[x-apple-data-detectors], 
		.unstyle-auto-detected-links *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		.im {
			color: inherit !important;
		}

		img.g-img + div {
			display: none !important;
		}

		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u ~ div .email-container {
				min-width: 320px !important;
			}
		}

		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u ~ div .email-container {
				min-width: 375px !important;
			}
		}

		@media only screen and (min-device-width: 414px) {
			u ~ div .email-container {
				min-width: 414px !important;
			}
		}

		</style>

		<style>

		.primary{
			background: #f3a333;
		}

		.bg_white{
			background: #ffffff;
		}
		.bg_light{
			background: #fafafa;
		}
		.bg_black{
			background: #000000;
		}
		.bg_dark{
			background: rgba(0,0,0,.8);
		}
		.email-section{
			padding:2.5em;
		}

		/*BUTTON*/
		.btn{
			padding: 10px 15px;
		}
		.btn.btn-primary{
			border-radius: 30px;
			background: #f3a333;
			color: #ffffff;
		}



		h1,h2,h3,h4,h5,h6{
			font-family: 'Playfair Display', serif;
			color: #000000;
			margin-top: 0;
		}

		body{
			font-family: 'Montserrat', sans-serif;
			font-weight: 400;
			font-size: 15px;
			line-height: 1.8;
			color: rgba(0,0,0,.4);
		}

		a{
			color: #f3a333;
		}



		.logo h1{
			margin: 0;
		}
		.logo h1 a{
			color: #000;
			font-size: 20px;
			font-weight: 700;
			text-transform: uppercase;
			font-family: 'Montserrat', sans-serif;
		}


		.hero{
			position: relative;
		}

		.hero .text{
			color: rgba(255,255,255,.8);
		}
		.hero .text h2{
			color: #ffffff;
			font-size: 30px;
			margin-bottom: 0;
		}

		.heading-section h2{
			color: #000000;
			font-size: 28px;
			margin-top: 0;
			line-height: 1.4;
		}
		.heading-section .subheading{
			margin-bottom: 20px !important;
			display: inline-block;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: rgba(0,0,0,.4);
			position: relative;
		}
		.heading-section .subheading::after{
			position: absolute;
			left: 0;
			right: 0;
			bottom: -10px;
			content: '';
			width: 100%;
			height: 2px;
			background: #f3a333;
			margin: 0 auto;
		}

		.heading-section-white{
			color: rgba(255,255,255,.8);
		}
		.heading-section-white h2{
			font-size: 28px;
			line-height: 1;
			padding-bottom: 0;
		}
		.heading-section-white h2{
			color: #ffffff;
		}
		.heading-section-white .subheading{
			margin-bottom: 0;
			display: inline-block;
			font-size: 13px;
			text-transform: uppercase;
			letter-spacing: 2px;
			color: rgba(255,255,255,.4);
		}


		.icon{
			text-align: center;
		}

		.text-services{
			padding: 10px 10px 0;
			text-align: center;
		}
		.text-services h3{
			font-size: 20px;
		}

		@media screen and (max-width: 500px) {

			.icon{
				text-align: left;
			}

			.text-services{
				padding-left: 0;
				padding-right: 20px;
				text-align: left;
			}

		}

		</style>


		</head>

		<body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly;'>
			<center style='width: 100%; background-color: #f1f1f1;'>
			<div style='max-width: 600px; margin: 0 auto;' class='email-container'>
				<!-- BEGIN BODY -->
			<table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
				<tr>
					<td class='bg_white'>
						<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
						<tr>
							<td class='bg_white email-section'>
								<div class='heading-section' style='text-align: center; padding: 0 30px;'>
								<h2>New Message from Beauty For Ashes (Contact Us)</h2>
								</div>
								<table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
									<tr>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Full Name</h3>
										<p>$name</p>
									</td>
								</tr>
								</table>
							</td>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Email Address</h3>
										<p>$email</p>
									</td>
								</tr>
								</table>
							</td>
							</tr>
							<tr>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Phone Number</h3>
										<p>$phone</p>
									</td>
								</tr>
								</table>
							</td>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Subject</h3>
										<p>$subject</p>
									</td>
								</tr>
								</table>
							</td>
							</tr>
							<tr>
							<td valign='top' width='50%' style='padding-top: 20px;'>
								<table role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
								<tr>
									<td class='text-services'>
										<h3>Comment</h3>
										<p>$message</p>
									</td>
								</tr>
								</table>
							</td>
							</tr>
								</table>
							</td>
						</tr>
						</table>
					</td>
					</tr>
			</table>

			</div>
		</center>
		</body>
	</html>";

	$mail->send();

	// if($mail) {
	// 	header("Location: success.html");
    //     exit(); // Ensure no further code is executed
	// }
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

?>



