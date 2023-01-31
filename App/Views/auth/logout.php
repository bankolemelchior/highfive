<?php

if(isset($_COOKIE['cookieName']) && isset($_COOKIE['cookiePass'])) {
    setcookie('cookieName', $_SESSION['useremail'], time() - 2592000, "/");
    setcookie('cookiePass', $u_password, time() - 2592000, "/");
}

    ## Rappel de la session (cett page n'a pas accès à la session puisque le header n'a pas été appélé)
    session_start();
    ## On supprime les variables de la session
    session_unset();

    header("Location: /pages/connexion");
?> 

