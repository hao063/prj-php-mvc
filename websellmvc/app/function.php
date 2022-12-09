<?php

function formatTextIndex($text, $num = 10){
    $arrayText = explode(" ", $text);
    $textSub = '';
    if(count($arrayText) > $num){
        for ($i = 0 ; $i < $num; $i++) { 
            $textSub .= ' '.$arrayText[$i];
        }
    }
    $result =  $textSub == '' ? $text : $textSub.'...';
    return $result;
}

function getIdCustomer() {
    if(isset($_SESSION['login_customer']) || isset($_COOKIE['login_customer'])){
        $idUser = isset($_COOKIE['login_customer']) ? $_COOKIE['login_customer'] : $_SESSION['login_customer'];
    }
    return isset($idUser) ? $idUser : null;     
}




?>