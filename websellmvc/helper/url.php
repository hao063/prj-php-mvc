<?php

function base_url($url = "") {
    global $config;
    return $config['base_url'].$url;
}

function headerLocation($url){
    header("Location: $url");
    return true;
}
