<?php 
    session_start();
?>
<?php 

        if (isset($_POST['username'])) {
        //echo 'good till here';
		$username = $_POST['username'];
        $password = $_POST['password'];}
       
		
        $conn = mysqli_connect('localhost', 'root','','hungry', '3306') or die('Cannot connect to DB');	 
        $query = "select clientUsername, clientPassword from client where  clientUsername='".$username."' and clientPassword = '".$password."';";
        //echo "<br>$query<br>";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['username'] =$username;
                $_SESSION['password'] = $password;
                //echo "Welcome";
                header('Location: index.html');
            }
            else {
               //echo "not logged";
            }
?>