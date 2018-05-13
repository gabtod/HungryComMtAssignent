<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Order</title>
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
                         echo " <h1><center>Hello,", $_SESSION['username'],"  </center></h1>";
                      }
            
            ?>
           
            <h1><center>Your order: </center></h1>
            <div id="main">
                <?php
                $deliveryType = $_POST['deliveryType'];
                $deliveryType = (int)$deliveryType;
                $_SESSION['deliveryType'] =$deliveryType;
                $time = $_POST['time'];
                $_SESSION['time'] = $time;
                $date = date("Y/m/d");
                //echo $date;
                
                
                $conn = mysqli_connect('localhost', 'root','','hungry', '3306') or die('Cannot connect to DB');	 
                $query = "select clientId from client where clientUsername = '".$_SESSION['username']."' ;";
                //echo "<br>$query<br>";
                if(mysqli_query($conn, $query)) { 
                    //echo mysqli_affected_rows($conn);  
                    $clientId = mysqli_affected_rows($conn);
                }
                else
                    echo "Error: ".mysqli_error($conn);

                
                $conn = mysqli_connect('localhost', 'root','','hungry', '3306') or die('Cannot connect to DB');	 
                $query = "insert into orders (orderTotalPrice, orderTypeId, orderDate, clientId, orderStatus )
                            values('$_SESSION[totalPrice]', '$_SESSION[deliveryType]', '$date', '$clientId', 'Processing')";
                //echo "<br>$query<br>";
                if(mysqli_query($conn, $query)) { 
                    //echo mysqli_affected_rows($conn);
                    echo "Your order has been procceeded<br>";
                    if ($_SESSION['deliveryType']== '1') {
                        echo "The delivery of your order will arrive at ".$_SESSION['time']." at the address indicated in your profile";
                    }
                    if ($_SESSION['deliveryType']== '2') {
                        echo "You can pick up your order at ".$_SESSION['time']." from the restaurant you chose.";
                    }
                    $_SESSION['arrayOkurama'] = array();
                    $_SESSION['arrayOcean'] = array();
                    $_SESSION['arrayPeking'] = array();
                    $_SESSION['arrayPizza'] = array();
                    $_SESSION['arrayHugos'] = array();
                    $_SESSION['arraySofra'] = array();
                    $_SESSION['arrayGate'] = array();                
                    
                }
                else
                    echo "Error: ".mysqli_error($conn);

		
                
                
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