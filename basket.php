<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Your Basket </title>
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
                        <a class='nav-link' href='login.php'> Your Basket | </a>
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
                         echo " <h1><center>Welcome to your Basket,", $_SESSION['username'],"  </center></h1>";
                      }
            
            ?>
           
            <!--<h1><center> Your Basket: </center></h1>-->
            <div id="main">
                    <?php
                            if (isset($_SESSION['username']) && (isset($_SESSION['password']))) {
                                if(!isset($_SESSION['arrayOkurama'])){$_SESSION['arrayOkurama'] = array();}
                                if(!isset($_SESSION['arrayOcean'])){$_SESSION['arrayOcean'] = array();}
                                if(!isset($_SESSION['arrayPizza'])){$_SESSION['arrayPizza'] = array();}
                                if(!isset($_SESSION['arrayPeking'])){$_SESSION['arrayPeking'] = array();}
                                if(!isset($_SESSION['arrayHugos'])){$_SESSION['arrayHugos'] = array();}
                                if(!isset($_SESSION['arraySofra'])){$_SESSION['arraySofra'] = array();}
                                if(!isset($_SESSION['arrayGate'])){$_SESSION['arrayGate'] = array();}
                                
           /*Okurama*/                  if (sizeof($_SESSION['arrayOkurama']) >0) {
                                        echo "<center><h3>Your order from Okurama restaurant includes ".sizeof($_SESSION['arrayOkurama'])." item/s. </h3></center><br>";
                                        $totalPrice = 0;  
                                        $deliveryFee = 0;
                                        $finalPrice = 0;
                                        foreach ($_SESSION['arrayOkurama'] as $name) {

                                            $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                                            $query = "select itemId, itemName, itemPrice from item where  itemId='".$name."';";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "<form action='basket.php' method='POST'> $row[itemName] $row[itemPrice] <input type='submit' value='+' name='$row[itemId]' id= '$row[itemId]' title='Increase quantity'></form> 
                                                <form method='POST' action='remove.php'><input type='submit' value='-' name='$row[itemId]' id= '$row[itemId]' title='Remove Item'></form>
                                                <hr>";
                                                
                                                $totalPrice += $row['itemPrice'];
                                                if ($totalPrice < 20) {
                                                    $deliveryFee = 4.95;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                                if ($totalPrice >=20) {
                                                    $deliveryFee=0;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                            }
                                             else { echo $name;}
                                        }
                                       echo "<form action='orderNow.php' method='POST'><h4>Some other details:</h4><label><u>Delivery type:</u> </label> <br><input type='radio' name='deliveryType' value='2' checked> Pick-up
                                       <input type='radio' name='deliveryType' value='1' checked> Delivery <br><br> <label><u>Time To Be Picked-up or Deliver:</u></label> <br><input type='time' name='time' id='time' min='11:00' max='23:00' value='23:00' required> <br><br> <label><u>Payment method: </u></label><br> Cash on delivery/pick-up. <br>
                                        <br> <h2><center>Price without delivery fee: ". number_format((float)$totalPrice, 2, '.', '')."</h2></center> <br> <h2><center>Delivery Fee: ". number_format((float)$deliveryFee, 2, '.', '')." </center></h2> <br> <h2><center>Total Price: ". number_format((float)$finalPrice, 2, '.', '')."</center></h2><input type='submit' value='Order now'<br></form> <br><br> ";
                                        $_SESSION['totalPrice'] = $finalPrice;

                                    }
                                
        /*OceanBasket*/                 if (sizeof($_SESSION['arrayOcean']) >0) {
                                        echo "<center><h3>Your order from Ocean Basket restaurant includes ".sizeof($_SESSION['arrayOcean'])." item/s. </h3></center><br>";
                                        $totalPrice = 0;   
                                        $deliveryFee = 0;
                                        $finalPrice = 0;
                                        foreach ($_SESSION['arrayOcean'] as $name) {

                                            $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                                            $query = "select itemId, itemName, itemPrice from item where  itemId='".$name."';";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "<form action='basket.php' method='POST'> $row[itemName] $row[itemPrice] <input type='submit' value='+' name='$row[itemId]' id= '$row[itemId]' title='Increase quantity'></form> 
                                                <form method='POST' action='remove.php'><input type='submit' value='-' name='$row[itemId]' id= '$row[itemId]' title='Remove Item'></form>
                                                <hr>";
                                                
                                                $totalPrice += $row['itemPrice'];
                                                if ($totalPrice < 20) {
                                                    $deliveryFee = 4.95;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                                if ($totalPrice >=20) {
                                                    $deliveryFee=0;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                            }
                                             else { echo $name;}
                                        }
                                       echo "<form action='orderNow.php' method='POST'><h4>Some other details:</h4><label><u>Delivery type:</u> </label> <br><input type='radio' name='deliveryType' value='2' checked> Pick-up
                                       <input type='radio' name='deliveryType' value='1' checked> Delivery <br><br> <label><u>Time To Be Picked-up or Deliver:</u></label> <br><input type='time' name='time' id='time' min='11:00' max='23:00' value='23:00' required> <br><br> <label><u>Payment method: </u></label><br> Cash on delivery/pick-up. <br>
                                         <br> <h2><center>Price without delivery fee: ". number_format((float)$totalPrice, 2, '.', '')."</h2></center> <br> <h2><center>Delivery Fee: ". number_format((float)$deliveryFee, 2, '.', '')." </center></h2> <br> <h2><center>Total Price: ". number_format((float)$finalPrice, 2, '.', '')."</center></h2><input type='submit' value='Order now'<br></form> <br><br> ";
                                        $_SESSION['totalPrice'] = $finalPrice;

                                    }
                                
       /*Pizza Hut*/                    if (sizeof($_SESSION['arrayPizza']) >0) {
                                        echo "<center><h3>Your order from Pizza Hut restaurant includes ".sizeof($_SESSION['arrayPizza'])." item/s.</h3> </center><br>";
                                        $totalPrice = 0;   
                                        $deliveryFee = 0;
                                        $finalPrice = 0;
                                        foreach ($_SESSION['arrayPizza'] as $name) {

                                            $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                                            $query = "select itemId, itemName, itemPrice from item where  itemId='".$name."';";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "<form action='basket.php' method='POST'> $row[itemName] $row[itemPrice] <input type='submit' value='+' name='$row[itemId]' id= '$row[itemId]' title='Increase quantity'></form> 
                                                <form method='POST' action='remove.php'><input type='submit' value='-' name='$row[itemId]' id= '$row[itemId]' title='Remove Item'></form>
                                                <hr>";
                                                
                                                $totalPrice += $row['itemPrice'];
                                                if ($totalPrice < 20) {
                                                    $deliveryFee = 4.95;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                                if ($totalPrice >=20) {
                                                    $deliveryFee=0;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                            }
                                             else { echo $name;}
                                        }
                                       echo "<form action='orderNow.php' method='POST'><h4>Some other details:</h4><label><u>Delivery type:</u> </label> <br><input type='radio' name='deliveryType' value='2' checked> Pick-up
                                       <input type='radio' name='deliveryType' value='1' checked> Delivery <br><br> <label><u>Time To Be Picked-up or Deliver:</u></label> <br><input type='time' name='time' id='time' min='11:00' max='23:00' value='23:00' required> <br><br> <label><u>Payment method: </u></label><br> Cash on delivery/pick-up. <br>
                                         <br> <h2><center>Price without delivery fee: ". number_format((float)$totalPrice, 2, '.', '')."</h2></center> <br> <h2><center>Delivery Fee: ". number_format((float)$deliveryFee, 2, '.', '')." </center></h2> <br> <h2><center>Total Price: ". number_format((float)$finalPrice, 2, '.', '')."</center></h2><input type='submit' value='Order now'<br></form> <br><br> ";
                                        $_SESSION['totalPrice'] = $finalPrice;
                                    }
                                
      /*Peking*/                        if (sizeof($_SESSION['arrayPeking']) >0) {
                                        echo "<center><h3>Your order from Peking restaurant includes ".sizeof($_SESSION['arrayPeking'])." item/s. </h3></center><br>";
                                        $totalPrice = 0;  
                                        $deliveryFee = 0;
                                        $finalPrice = 0;
                                        foreach ($_SESSION['arrayPeking'] as $name) {

                                            $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                                            $query = "select itemId, itemName, itemPrice from item where  itemId='".$name."';";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if (mysqli_num_rows($result) > 0) {
                                               echo "<form action='basket.php' method='POST'> $row[itemName] $row[itemPrice] <input type='submit' value='+' name='$row[itemId]' id= '$row[itemId]' title='Increase quantity'></form> 
                                                <form method='POST' action='remove.php'><input type='submit' value='-' name='$row[itemId]' id= '$row[itemId]' title='Remove Item'></form>
                                                <hr>";
                                                
                                                $totalPrice += $row['itemPrice'];
                                                if ($totalPrice < 20) {
                                                    $deliveryFee = 4.95;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                                if ($totalPrice >=20) {
                                                    $deliveryFee=0;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                            }
                                             else { echo $name;}
                                        }
                                       echo "<form action='orderNow.php' method='POST'><h4>Some other details:</h4><label><u>Delivery type:</u> </label> <br><input type='radio' name='deliveryType' value='2' checked> Pick-up
                                       <input type='radio' name='deliveryType' value='1' checked> Delivery <br><br> <label><u>Time To Be Picked-up or Deliver:</u></label> <br><input type='time' name='time' id='time' min='11:00' max='23:00' value='23:00' required> <br><br> <label><u>Payment method: </u></label><br> Cash on delivery/pick-up. <br>
                                        <br> <h2><center>Price without delivery fee: ". number_format((float)$totalPrice, 2, '.', '')."</h2></center> <br> <h2><center>Delivery Fee: ". number_format((float)$deliveryFee, 2, '.', '')." </center></h2> <br> <h2><center>Total Price: ". number_format((float)$finalPrice, 2, '.', '')."</center></h2><input type='submit' value='Order now'<br></form> <br><br> ";
                                        $_SESSION['totalPrice'] = $finalPrice;

                                    }
                                
       /*Sofra*/                        if (sizeof($_SESSION['arraySofra']) >0) {
                                        echo "<h3><center>Your order from Sofra Kebab restaurant includes ".sizeof($_SESSION['arraySofra'])." item/s. </h3></center><br>";
                                        $totalPrice = 0;      
                                        $deliveryFee = 0;
                                        $finalPrice = 0;
                                        foreach ($_SESSION['arraySofra'] as $name) {

                                            $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                                            $query = "select itemId, itemName, itemPrice from item where  itemId='".$name."';";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "<form action='basket.php' method='POST'> $row[itemName] $row[itemPrice] <input type='submit' value='+' name='$row[itemId]' id= '$row[itemId]' title='Increase quantity'></form> 
                                                <form method='POST' action='remove.php'><input type='submit' value='-' name='$row[itemId]' id= '$row[itemId]' title='Remove Item'></form>
                                                <hr>";
                                                
                                                $totalPrice += $row['itemPrice'];
                                                if ($totalPrice < 20) {
                                                    $deliveryFee = 4.95;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                                if ($totalPrice >=20) {
                                                    $deliveryFee=0;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                            }
                                             else { echo $name;}
                                        }
                                       echo "<form action='orderNow.php' method='POST'><h4>Some other details:</h4><label><u>Delivery type:</u> </label> <br><input type='radio' name='deliveryType' value='2' checked> Pick-up
                                       <input type='radio' name='deliveryType' value='1' checked> Delivery <br><br> <label><u>Time To Be Picked-up or Deliver:</u></label> <br><input type='time' name='time' id='time' min='11:00' max='23:00' value='23:00' required> <br><br> <label><u>Payment method: </u></label><br> Cash on delivery/pick-up. <br>
                                        <br> <h2><center>Price without delivery fee: ". number_format((float)$totalPrice, 2, '.', '')."</h2></center> <br> <h2><center>Delivery Fee: ". number_format((float)$deliveryFee, 2, '.', '')." </center></h2> <br> <h2><center>Total Price: ". number_format((float)$finalPrice, 2, '.', '')."</center></h2><input type='submit' value='Order now'<br></form> <br><br> ";
                                        $_SESSION['totalPrice'] = $finalPrice;

                                    }
                                
        /*Gate*/                        if (sizeof($_SESSION['arrayGate']) >0) {
                                        echo "<center><h3>Your order from Gate of India restaurant includes ".sizeof($_SESSION['arrayGate'])." item/s. </h3></center><br>";
                                        $totalPrice = 0;    
                                        $deliveryFee = 0;
                                        $finalPrice = 0;
                                        foreach ($_SESSION['arrayGate'] as $name) {

                                            $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                                            $query = "select itemId, itemName, itemPrice from item where  itemId='".$name."';";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if (mysqli_num_rows($result) > 0) {
                                                echo "<form action='basket.php' method='POST'> $row[itemName] $row[itemPrice] <input type='submit' value='+' name='$row[itemId]' id= '$row[itemId]' title='Increase quantity'></form> 
                                                <form method='POST' action='remove.php'><input type='submit' value='-' name='$row[itemId]' id= '$row[itemId]' title='Remove Item'></form>
                                                <hr>";
                                                
                                                $totalPrice += $row['itemPrice'];
                                                if ($totalPrice < 20) {
                                                    $deliveryFee = 4.95;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                                if ($totalPrice >=20) {
                                                    $deliveryFee=0;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                            }
                                             else { echo $name;}
                                        }
                                       echo "<form action='orderNow.php' method='POST'><h4>Some other details:</h4><label><u>Delivery type:</u> </label> <br><input type='radio' name='deliveryType' value='2' checked> Pick-up
                                       <input type='radio' name='deliveryType' value='1' checked> Delivery <br><br> <label><u>Time To Be Picked-up or Deliver:</u></label> <br><input type='time' name='time' id='time' min='11:00' max='23:00' value='23:00' required> <br><br> <label><u>Payment method: </u></label><br> Cash on delivery/pick-up. <br>
                                        <br> <h2><center>Price without delivery fee: ". number_format((float)$totalPrice, 2, '.', '')."</h2></center> <br> <h2><center>Delivery Fee: ". number_format((float)$deliveryFee, 2, '.', '')." </center></h2> <br> <h2><center>Total Price: ". number_format((float)$finalPrice, 2, '.', '')."</center></h2><input type='submit' value='Order now'<br></form> <br><br> ";
                                        $_SESSION['totalPrice'] = $finalPrice;

                                    }
                                
       /*Hugos*/                        if (sizeof($_SESSION['arrayHugos']) >0) {
                                        echo "<center><h3>Your order from Hugos Burgers restaurant includes ".sizeof($_SESSION['arrayHugos'])." item/s. </h3></center><br>";
                                        $totalPrice = 0;    
                                        $deliveryFee = 0;
                                        $finalPrice = 0;
                                        foreach ($_SESSION['arrayHugos'] as $name) {

                                            $conn = mysqli_connect('localhost', 'root','','hungry', '3307') or die('Cannot connect to DB');	 
                                            $query = "select itemId, itemName, itemPrice from item where  itemId='".$name."';";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            if (mysqli_num_rows($result) > 0) {
                                               echo "<form action='basket.php' method='POST'> $row[itemName] $row[itemPrice] <input type='submit' value='+' name='$row[itemId]' id= '$row[itemId]' title='Increase quantity'></form> 
                                                <form method='POST' action='remove.php'><input type='submit' value='-' name='$row[itemId]' id= '$row[itemId]' title='Remove Item'></form>
                                                <hr>";
                                                
                                                $totalPrice += $row['itemPrice'];
                                                
                                                if ($totalPrice < 20) {
                                                    $deliveryFee = 4.95;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                                if ($totalPrice >=20) {
                                                    $deliveryFee=0;
                                                    $finalPrice = $totalPrice + $deliveryFee;
                                                }
                                            }
                                             else { echo $name;}
                                        }
                                       echo "<form action='orderNow.php' method='POST'><h4>Some other details:</h4><label><u>Delivery type:</u> </label> <br><input type='radio' name='deliveryType' value='2' checked> Pick-up
                                       <input type='radio' name='deliveryType' value='1' checked> Delivery <br><br> <label><u>Time To Be Picked-up or Deliver:</u></label> <br><input type='time' name='time' id='time' min='11:00' max='23:00' value='23:00' required> <br><br> <label><u>Payment method: </u></label><br> Cash on delivery/pick-up. <br>
                                         <br> <h2><center>Price without delivery fee: ". number_format((float)$totalPrice, 2, '.', '')."</h2></center> <br> <h2><center>Delivery Fee: ". number_format((float)$deliveryFee, 2, '.', '')." </center></h2> <br> <h2><center>Total Price: ". number_format((float)$finalPrice, 2, '.', '')."</center></h2><input type='submit' value='Order now'<br></form> <br><br> ";
                                        $_SESSION['totalPrice'] = $finalPrice;
                                        

                                    }
                                //echo 'empty';
                            
                        }
                        else {echo '<center>Register now</center>';}
                    ?>
                </div>
                <div class="clear"></div>
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
    if (sizeof($_SESSION['arrayOkurama']) >0) {
        $_SESSION['arrayOkurama'][] = $name;}
    
    if (sizeof($_SESSION['arrayOcean']) >0) {
        $_SESSION['arrayOcean'][] = $name;}
    
    if (sizeof($_SESSION['arrayPizza']) >0) {
        $_SESSION['arrayPizza'][] = $name;}
    
     if (sizeof($_SESSION['arrayPeking']) >0) {
        $_SESSION['arrayPeking'][] = $name;}
    
     if (sizeof($_SESSION['arrayGate']) >0) {
        $_SESSION['arrayGate'][] = $name;}
    
     if (sizeof($_SESSION['arrayHugos']) >0) {
        $_SESSION['arrayHugos'][] = $name;}
    
     if (sizeof($_SESSION['arraySofra']) >0) {
        $_SESSION['arraySofra'][] = $name;}
    }
?>