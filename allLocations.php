<?php 
    session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>All Locations</title>
        
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
                      <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home | </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="aboutus.html">About Us |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contactus.html">Contact Us |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="login.html">Log in | </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign up  </a>
                      </li>
                    </ul>
                  </div>
                </nav>
            </header>
            <br><br>
            <h1><center>All locations: </center></h1>
            <div id="main">
              
               <?php 
                    
                
                
                ?>
               
                <div class="clear"></div>
            </div>
            <div class="push"></div>
            <footer>
                
                <nav class="navbar navbar-expand-lg navbar-light ">
                  <div class="collapse navbar-collapse" id="navbarNav">
                   Copyright &copy; 2018 Gabriela Todorova. Hungry.com.mt. All Rights Reserved
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="help.html">Help | </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="faq.html"> FAQ |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contactus.html">Contact Us </a>
                      </li>
                    </ul>
                  </div>
                </nav>
                
            </footer>
        </div>
        
        
    </body>
</html>