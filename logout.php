<?php 
    session_start();

    unset($_SEESION['username']);
    unset($_SEESION['password']);
    $_SESSION =array();
    header('Location:index.php');
?>