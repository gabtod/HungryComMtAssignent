<?php 
    session_start();
?>

<!DOCTYPE html>
<html>  
<head> <!--head information-->
	<meta charset="UTF-8"/>
	<title>Your details</title>	
</head>
<body>
<?php
	#echo $_SERVER['DOCUMENT_ROOT'];
	require($_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php'); #Superglobal
	
    //if (isset($_POST['email']))
    if (isset($_SESSION['email'])) {
        $username = $_SESSION['email'];
    } else {
	$username = $_POST['email']; }
    //$username = $_POST['email'];
	$pwd= $_POST['password'];
    $subject = $_POST['subject'];
    #$emailTo = $_POST['emailTo']; #later
    if (isset($_SESSION['name'])) {
        $firstname = $_SESSION['name'];
    } else {$firstname = $_POST['firstname'];}
    //$firstname = $_POST['firstname'];
    if (isset($_SESSION['surname'])) {
        $lastname = $_SESSION['surname'];
    } else {$lastname = $_POST['lastname'];}
    //$lastname = $_POST['lastname'];
    $topic = $_POST['topic'];
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->isHtml(true);
	$mail->Debugoutput = 'html';
	$mail->Host = "smtp.office365.com";
	$mail->SMTPDebug = 2; #include client and server messages
	$mail->Port = 587;
	#$mail->Port = 465; #change to ssl SMTPSecure
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = $username;
	$mail->Password = $pwd;
    
	$mail->From = $username;
	$mail->AddAddress('gabriela.todorova.a100822@mcast.edu.mt'); #later
	$mail->Subject = $topic.' - from '.$firstname.' '.$lastname;
	$mail->Body = $subject;    
	#$mail->WordWrap = 50;
	
    
	if(!$mail->Send()) {
		echo 'Message was not sent.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
	} else {
		//echo 'Message has been sent.';
        header('Location: thankyou.php');
	}	
    
?>	
</body>
</html>

