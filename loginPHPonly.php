<?php 
    session_start();
?>
<?php 

        if (isset($_POST['username'])) {
        //echo 'good till here';
		$username = $_POST['username'];
        $password = $_POST['password'];
        }
       
		
        $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
        $query = "select clientUsername, clientPassword, clientName, clientSurname, clientEmail from client where  clientUsername='".$username."' and clientPassword = '".$password."';";
        echo "<br>$query<br>";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] =$username;
                $_SESSION['password'] = $password;
                //$name = $row['clientName'];
                $_SESSION['name'] = $row['clientName'];
                $_SESSION['surname'] = $row['clientSurname'];
                $_SESSION['email'] = $row['clientEmail'];
                
                //echo $_SESSION['surname'];
                header('Location: index.php');
            }
            else {
               echo "not logged";
            }
?>