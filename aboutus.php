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
                      <li class="nav-item active">
                        <a class="nav-link" href="aboutus.php">About Us |</a>
                      </li>
                      <li class="nav-item">
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
            <h1><center>About us: </center></h1>
            <div id="main">
                <p>Hungry.com.mt is a college project created by G. T., which is based on the original website called "TimeToEat.com.mt". The purpose of this project is to dublicate the functions of ordering food online and to provide a fully functional website and a management desktop  application, connected to a dababase. The only purpose of this project is to try the student's creativity and skills in the area of ICT, and to be assessed. This project is not used for any commercial purposes.</p>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non tristique elit, ac consectetur elit. Curabitur ut lacus eros. Integer malesuada eros vestibulum, tristique dui quis, consequat nunc. Cras consectetur dui id justo lacinia, eu eleifend risus congue. Mauris et porttitor dolor, id pretium velit. Sed eros tortor, pretium sed arcu vel, volutpat hendrerit dolor. Nunc feugiat ac ligula at convallis. Morbi odio libero, bibendum vel mattis eget, sollicitudin ac nulla. Nullam in mauris at erat imperdiet malesuada. Mauris sit amet velit dignissim, laoreet mauris eget, hendrerit enim. </p>

                <p>Morbi vel quam faucibus, placerat lorem ut, interdum ex. Etiam quis erat sodales, rhoncus augue non, porta orci. Etiam vel velit varius, consequat nunc id, tincidunt nisi. Nullam dictum magna ac justo commodo rhoncus. Fusce condimentum pellentesque tincidunt. Integer facilisis non lectus quis luctus. Etiam eget dui pellentesque, luctus nulla ac, auctor justo. Maecenas risus lorem, sagittis in justo non, tempus laoreet ipsum. Proin eget nisi vitae mi ultricies placerat. Donec eget egestas nibh, vel sagittis orci. Praesent feugiat sagittis diam quis sodales. Nam sed mollis mi, sed porta ipsum. Donec ac congue libero.</p>
                 
               
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