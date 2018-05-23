<!DOCTYPE html>
<html>
    <head>
        <title>Hungry.com.mt - Main Page</title>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="styles.css" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light ">
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <img src="images/smalllogo.png" id="logo">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home | </a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="aboutus.php">About Us |</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="contactus.php">Contact Us |</a>
                      </li>
                      <li class="nav-item ">
                        <a class="nav-link" href="login.php">Log in | </a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="signup.php">Sign up  </a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </header>
            <br><br>
            <h1><center>Registration Form </center></h1>
            <h6><center>Fill up all required fields:</center></h6>
            
            
            <div id="main">
                <form method="POST" action="signup.php" >
                   <br>
                    <label for="firstname">First Name</label><br>
                    <input type="text" id="firstname" name="firstname" placeholder="Your name..">
                    <br>
                    <label for="lastname">Last Name</label><br>
                    <input type="text" id="lastname" name="lastname" placeholder="Your last name..">
                    <br>
                    <label for="username">Username</label><br>
                    <input type="text" id="username" name="username" placeholder="Your username..">
                    <br>
                    <label for="password"> Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Your password..">
                    <br>
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="Your email..">
                    <br>
                    <label for="phone">Phone</label><br>
                    <input type="text" id="phone" name="phone" placeholder="Your phone number..">
                    <br>
                    <label for="Address">Address</label><br>
                    <textarea id="address" name="address" placeholder="Your address here.." style="height:100px"></textarea>
                    <br><br>
                    <input type="checkbox" name="terms"> I agree with the Hungry.com.mt <a href="tandc.php"> T&amp;C</a>  <br><br>
                    <input type="submit" value="Login"><br><br>
                    <input type="reset" value="Reset"><br><br>
                </form>
                 
               
                <div class="clear"></div>
            </div>
            <div class="push"></div>
            <footer>
                
                <nav class="navbar navbar-expand-lg navbar-light ">
                  <div class="collapse navbar-collapse" id="navbarNav">
                   Copyright &copy; 2018 Gabriela Todorova. Hungry.com.mt. All Rights Reserved
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="help.php">Help | </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="faq.php"> FAQ |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us </a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </footer>
        </div>
    </body>
</html>

<?php
	
	if (isset($_POST['firstname'])) {
        echo 'getting inside if';
		$firstname = $_POST['firstname'];
		$surname = $_POST['lastname'];
		$username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
		
        //Connect to db
        $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
        $query = "insert into client (clientName, clientSurname, clientUsername, clientEmail, clientPhoneNumber, clientAddress, clientPassword)
                    values('$firstname', '$surname', '$username', '$email', '$phone', '$address', '$password')";
        echo "<br>$query<br>";
        if(mysqli_query($conn, $query)) { 
            echo mysqli_affected_rows($conn);            
        }
        else
            echo "Error: ".mysqli_error($conn);
			
		}
						
	
?>