<?php
require($_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php'); 
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }
    $topic = 'Thank you - Hungry.com.mt';
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->isHtml(true);
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.office365.com";
	$mail->SMTPDebug = 2; 
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = 'gabriela.todorova.a100822@mcast.edu.mt';
	$mail->Password = 'Mcast17081997';
    
	$mail->From = 'gabriela.todorova.a100822@mcast.edu.mt';
	$mail->AddAddress($email); #later
	$mail->Subject = $topic;
	$mail->Body = 'Thank you for ordering with us. Best Regards, The Hungry.com.mt Team.';
	if(!$mail->Send()) {
		echo 'Message was not sent.';
        
		//echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {header('Location: orderNow.php');}
        ?>