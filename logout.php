<?php 
    session_start();

    unset($_SEESION['username']);
    unset($_SEESION['password']);
    unset($_SESSION['arrayOkurama']);
    unset($_SESSION['arrayOcean']);
    unset($_SESSION['arrayPeking']);
    unset($_SESSION['arrayPizza']);
    unset($_SESSION['arraySofra']);
    unset($_SESSION['arrayHugos']);
    unset($_SESSION['arrayGate']);
    $_SESSION =array();
    header('Location:index.php');
?>