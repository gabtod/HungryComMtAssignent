<?php session_start(); ?>
<?php
        if (isset($_POST['firstnameChange'])) {
        
		$firstnameChange = $_POST['firstnameChange'];
        $_SESSION['firstnameChange'] =$firstnameChange;
            
		$surnameChange = $_POST['lastnameChange'];
        $_SESSION['surnameChange'] =$surnameChange;
            
		$usernameChange = $_POST['usernameChange'];
        $_SESSION['usernameChange'] =$usernameChange;
            
        $emailChange = $_POST['emailChange'];
        $_SESSION['emailChange'] =$emailChange;
            
        $newPassword = $_POST['newPassword'];
        $_SESSION['newPassword'] =$newPassword;
            
        /*header("Location: changePassword1.php");*/
		
        if ($_POST['newPassword'] == $_POST['newPassword1']) {
            $conn = mysqli_connect('localhost', 'root','','hungry', '3306') or die('Cannot connect to DB');	 
            $query = "update client SET clientPassword = '".$_SESSION['newPassword']."' where  clientUsername='".$_SESSION['usernameChange']."' and clientEmail = '".$_SESSION['emailChange']."' and clientName = '".$_SESSION['firstnameChange']."' and clientSurname = '".$_SESSION['surnameChange']."';";

            
            if(mysqli_query($conn, $query)) { 
            /*echo mysqli_affected_rows($conn);*/
                /*echo "<script type='text/javascript'>alert('$message');</script>";*/
                header('Location: changedPassword.php');
                
            }else {echo "Error: ".mysqli_error($conn);}
                    
			
		
            } else {echo "Newpassword and newpassword1 are not equal";}
            
             
            
		} else {
            echo "Error to submit the credentials";
        }

        
            
		


?>