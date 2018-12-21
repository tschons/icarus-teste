<?php

function isLogged()
{
    $isLogged = false;

    if(
        isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true
        or
        isset($_COOKIE['Loggedin']) && $_COOKIE['Loggedin'] == true
    ) {
        $isLogged = true;
    }

    return $isLogged;
}

if (isLogged()) {
    header("Location: http://www.google.com");
    exit();
}