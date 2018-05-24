<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gate of India Menu</title>
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

                        <?php 
                            if (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
                                
                                echo "<li class='nav-item'>
                        <a class='nav-link' href='basket.php'> Your Basket | </a>
                      </li>
                      <li class='nav-item'>
                        <a class='nav-link' href='basket.php'> Log out  </a>
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
           
            <h1><center>Gate of India offers: </center></h1>
            <div id="main">
              
                <?php
                $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');
                $query = "select restaurantitem.itemId, item.itemName, item.itemDescription, item.itemPrice from item left join restaurantitem on item.itemId = restaurantitem.itemId
                where restaurantitem.restaurantIId=4";
                $result =mysqli_query($conn,$query);
                if(!isset($_SESSION['arrayGate'])){
    
                    $_SESSION['arrayGate'] = array();
                }                
                while($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<form method='POST' action='gateofindia.php'><b>$row[itemName] </b> Price &#x20AC; $row[itemPrice] <br>";
                    if (isset($_SESSION['username']) && (isset($_SESSION['password']))) { 
                          echo "<i>$row[itemDescription]</i> <br> <input type='submit' name='$row[itemId]' id='$row[itemId]' value='Add To Basket'><hr/></form> ";
                      } else {
                        echo "<i>$row[itemDescription]</i> <hr> </form>";
                    }
                    
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
<?php
foreach($_POST as $name => $content) {
        $_SESSION['arrayGate'][] = $name;
    }
?>