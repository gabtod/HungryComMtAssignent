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
                        <a class="nav-link" href="index.php">Home | </a>
                      </li>
                      <li class="nav-item">
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
            <h1><center>All locations: </center></h1>
            <div id="main">
               <?php    
                $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                $query = "select localityName from locality ";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)) {
               
                    if ($row['localityName'] == 'Buggiba') {
                    echo "<h2><center><a href='bugibba.php'><font color='black'>$row[localityName]</font><a></center></h2> <hr/>";} 
                 if ($row['localityName'] == 'Hamrun') {
                    echo "<h2><center><a href='hamrun.php'><font color='black'>$row[localityName]</font><a></center></h2> <hr/>";} 
                  if ($row['localityName'] == 'Attard') {
                    echo "<h2><center><a href='attard.php'><font color='black'>$row[localityName]</font><a></center></h2> <hr/>";}
                   if ($row['localityName'] == 'Sliema') {
                    echo "<h2><center><a href='sliema.php'><font color='black'>$row[localityName]</font><a></center></h2> <hr/>";}
                
                  if ($row['localityName'] == 'St Julians') {
                    echo "<h2><center><a href='stjulians.php'><font color='black'>$row[localityName]</font><a></center></h2> <hr/>";
                    } else  
                     if ($row['localityName'] == 'Marsaxlokk') {
                    echo "<h2><center><a href='marsaxlokk.php'><font color='black'>$row[localityName]</font><a></center></h2> <hr/>";}
                   
                        //echo "<h2><center>$row[rastaurantName]</center></h2> <br/>";
                    
                        //echo "<h2><center>$row[rastaurantName]</center></h2> <br/>";
                }
                    
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