<?php
    session_start();
    foreach($_POST as $name => $content) {
        if (sizeof($_SESSION['arrayOkurama']) >0) {
        $index = array_search($name,$_SESSION['arrayOkurama']);
        unset($_SESSION['arrayOkurama'][$index]);}
        
        if (sizeof($_SESSION['arrayOcean']) >0) {
        $index = array_search($name,$_SESSION['arrayOcean']);
        unset($_SESSION['arrayOcean'][$index]);}
        
        if (sizeof($_SESSION['arrayPizza']) >0) {
        $index = array_search($name,$_SESSION['arrayPizza']);
        unset($_SESSION['arrayPizza'][$index]);}
        
        if (sizeof($_SESSION['arrayPeking']) >0) {
        $index = array_search($name,$_SESSION['arrayPeking']);
        unset($_SESSION['arrayPeking'][$index]);}
        
        if (sizeof($_SESSION['arrayGate']) >0) {
        $index = array_search($name,$_SESSION['arrayGate']);
        unset($_SESSION['arrayGate'][$index]);}
        
        if (sizeof($_SESSION['arrayHugos']) >0) {
        $index = array_search($name,$_SESSION['arrayHugos']);
        unset($_SESSION['arrayHugos'][$index]);}
        
        if (sizeof($_SESSION['arraySofra']) >0) {
        $index = array_search($name,$_SESSION['arraySofra']);
        unset($_SESSION['arraySofra'][$index]);}
        
    }
    header('Location: basket.php');

?>