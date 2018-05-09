<?php
    session_start();
?>

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
                      <li class="nav-item active">
                        <a class="nav-link" href="contactus.php">Contact Us |</a>
                      </li>
                       <?php 
                            if (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
                                
                                echo "<li class='nav-item'>
                        <a class='nav-link' href='basket.php'> Your Basket | </a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link' href='logout.php'> Log out  </a>
                      </li>";
                            }
                        else { 
                            $_SESSION =array();
                            echo "<li class='nav-item'>
                        <a class='nav-link' href='login.php'>Log in | </a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link' href='signup.php'>Sign up  </a>
                      </li>";
                        }                        
                        ?>
                    </ul>
                  </div>
                </nav>
            </header>
            <br><br>
            <h1><center>Contact us </center></h1>
            <h6><center>Via filling up this form:</center></h6>
            
            <div id="main">
                <form action="PHPforContactUs.php" method="POST">
                    <br>
                    
                                        
                     <?php 
                            if (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
                                
                                echo "<label for='firstname'>First Name</label><br>
                    <input type='text' id='firstname' name='firstname' value='".$_SESSION['name']."' disabled>
                    <br>
                    <label for='lastname'>Last Name</label><br>
                    <input type='text' id='lastname' name='lastname' value='".$_SESSION['surname']."' disabled>
                    <br>
                    <label for='email'>Email</label><br>
                    <input type='email' id='email' name='email' value='".$_SESSION['email']."' disabled>
                    <br>
                           <label for='password'>Password</label><br>
                    <input type='password' id='password' name='password' placeholder='Your email password..' required>
                    <br>";
                                
                            }
                        else { 
                            $_SESSION =array();
                            echo "<label for='firstname'>First Name</label><br>
                    <input type='text' id='firstname' name='firstname' placeholder='Your name..' required>
                    <br>
                    <label for='lastname'>Last Name</label><br>
                    <input type='text' id='lastname' name='lastname' placeholder='Your last name..' required>
                    <br>
                    <label for='email'>Email</label><br>
                    <input type='email' id='email' name='email' placeholder='Your email..' required>
                    <br>
                            <label for='password'>Password</label><br>
                    <input type='password' id='password' name='password' placeholder='Your email password..' required>
                    <br>";
                        }                        
                        ?>
                    <label for='topic'>Topic</label><br>
                    <input type='text' id='topic' name='topic' placeholder='Your topic..' required>
                    <br>
                    <label for="subject">Subject</label><br>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>
                    <br>
                    <input type="submit" value="Submit"><br><br>
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
                      <li class="nav-item active">
                        <a class="nav-link" href="contactus.php">Contact Us </a>
                      </li>
                    </ul>
                  </div>
                </nav>
                
            </footer>
        </div>
        
        
    </body>
</html>