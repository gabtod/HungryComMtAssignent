<?php 
    session_start();

    unset($_SESSION['id']);
    unset($_SEESION['username']);
    unset($_SEESION['password']);
    unset($_SESSION['arrayOkurama']);
    unset($_SESSION['arrayOcean']);
    unset($_SESSION['arrayPeking']);
    unset($_SESSION['arrayPizza']);
    unset($_SESSION['arraySofra']);
    unset($_SESSION['arrayHugos']);
    unset($_SESSION['arrayGate']);
    unset($_SEESION['firstnameChange']);
    unset($_SEESION['surnameChange']);
    unset($_SEESION['usernameChange']);
    unset($_SEESION['emailChange']);
    unset($_SESSION['newPassword']);
    $_SESSION =array();
    header('Location:index.php');
?>