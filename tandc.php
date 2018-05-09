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
            <h1><center>Terms and Conditions: </center></h1>
            <div id="main">
                <p>Hungry.com.mt is using sessions/cookies. Not for commercial purposes.</p>
                
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non tristique elit, ac consectetur elit. Curabitur ut lacus eros. Integer malesuada eros vestibulum, tristique dui quis, consequat nunc. Cras consectetur dui id justo lacinia, eu eleifend risus congue. Mauris et porttitor dolor, id pretium velit. Sed eros tortor, pretium sed arcu vel, volutpat hendrerit dolor. Nunc feugiat ac ligula at convallis. Morbi odio libero, bibendum vel mattis eget, sollicitudin ac nulla. Nullam in mauris at erat imperdiet malesuada. Mauris sit amet velit dignissim, laoreet mauris eget, hendrerit enim. </p>

                <p>Morbi vel quam faucibus, placerat lorem ut, interdum ex. Etiam quis erat sodales, rhoncus augue non, porta orci. Etiam vel velit varius, consequat nunc id, tincidunt nisi. Nullam dictum magna ac justo commodo rhoncus. Fusce condimentum pellentesque tincidunt. Integer facilisis non lectus quis luctus. Etiam eget dui pellentesque, luctus nulla ac, auctor justo. Maecenas risus lorem, sagittis in justo non, tempus laoreet ipsum. Proin eget nisi vitae mi ultricies placerat. Donec eget egestas nibh, vel sagittis orci. Praesent feugiat sagittis diam quis sodales. Nam sed mollis mi, sed porta ipsum. Donec ac congue libero.</p>
                
                <p>Aliquam erat volutpat. Nulla eget placerat purus. Proin sed dapibus elit. Quisque id fringilla eros, non facilisis sem. Sed at bibendum tortor. Aliquam ullamcorper ante mauris, sed laoreet sapien convallis ut. Nulla dapibus enim nec quam vulputate faucibus. Cras dictum eget ligula sit amet fringilla. Aliquam ut dignissim mi. Etiam sodales neque posuere ex consequat scelerisque. Praesent ac posuere purus, in fringilla nisl.</p>
                
                <p>Aenean a nibh leo. Vestibulum vel neque lobortis, placerat felis ac, scelerisque felis. Nulla tincidunt aliquet imperdiet. Integer ultricies scelerisque augue, sit amet facilisis ligula euismod sit amet. Vivamus vitae dictum ligula. Nulla consectetur sed tortor ut fermentum. Ut eros odio, iaculis vel mattis non, tempor vulputate felis. Aenean eros turpis, facilisis et rhoncus finibus, interdum at risus.</p>
                
                <p>Pellentesque ac dictum justo. Nullam rutrum urna id hendrerit feugiat. Nullam sollicitudin posuere interdum. Maecenas pretium posuere elit id pretium. Nam pellentesque posuere nulla in pulvinar. Curabitur eget mi vestibulum, gravida leo eu, imperdiet dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ut venenatis ex. Suspendisse mauris dolor, egestas sit amet est tempor, feugiat gravida nibh. Cras hendrerit ante vitae magna molestie placerat sit amet sed dolor. Cras non orci interdum enim varius consequat. Nulla quis turpis nec ligula semper euismod viverra non nibh. Vestibulum tristique tortor vitae arcu dictum, vel laoreet urna maximus. Vivamus eu maximus nunc, non finibus nisi. Nulla sodales ultrices eros, at posuere mauris facilisis et. Aliquam erat volutpat.</p>
               
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