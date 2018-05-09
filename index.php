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
                      <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home | </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">About Us |</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact Us |</a>
                      <!--</li>
                      <li class="nav-item">
                        <a class="nav-link" href="login.html">Log in | </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign up  </a>
                      </li>-->
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
            <?php 
                     if (isset($_SESSION['username']) && (isset($_SESSION['password']))) { 
                         echo " <h1><center>Welcome,", $_SESSION['username'],"  </center></h1>";
                      }
            
            ?>
           
            <h1><center>Order your food here: </center></h1>
            <div id="main">
              
                 <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-danger active">All</button>
                  <button type="button" class="btn btn-danger"><a href="allrestaurants.php"><font color='white'>Delivery</font></a></button>
                     <button type="button" class="btn btn-danger"><a href="allrestaurants.php"><font color='white'>Pickup</font></a></button>
                </div>
                
                <br><br><br><br>
                <h5><center>Select Your Location</center></h5>
                
                <div class="dropdown">
                  <a class="btn btn-danger btn-lg dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Your Location...</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="allLocations.php">All</a>
                       <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Attard</a>
                      <a class="dropdown-item" href="#">Hamrun</a>
                      <a class="dropdown-item" href="#">Sliema</a>
                      <a class="dropdown-item" href="#">Marsaxlokk</a>
                      <a class="dropdown-item" href="#">Bugibba</a>
                      <a class="dropdown-item" href="#">St Julians</a>
                   
                    
                  </div>
                </div>
                
                <br><br><br><br>
                <h5><center>OR </center></h5>
                <div class="dropdown">
                  <a class="btn btn-danger btn-lg dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select The Restaurant...</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                       <a class="dropdown-item" href="allrestaurants.php">All</a>
                      <!--<div class="dropdown-divider"></div>-->
                    <a class="dropdown-item" href="oceanBasket.php">Ocean Basket</a>
                    <a class="dropdown-item" href="okurama.php">Okurama</a>
                      <a class="dropdown-item" href="gateofindia.php">Gate of India</a>
                      <a class="dropdown-item" href="pizzahut.php">Pizza Hut</a>
                      <a class="dropdown-item" href="hugos.php">Hugo's Burgers</a>
                      <a class="dropdown-item" href="peking.php">Peking</a>
                      <a class="dropdown-item" href="sofra.php">Sofra Kebap</a>
                        
                  </div>
                    
                </div>
               
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