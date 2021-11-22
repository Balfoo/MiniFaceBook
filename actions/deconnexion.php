<?php

    if (isset($_COOKIE['rememberme'])) { //On supprime le cookie de rester connecter si il existe.
        setcookie("rememberme", "", time() - 3600);
    }
    session_destroy(); //On supprime la session ce qui déconnecte l'utilisateur
    header("Location:index.php"); //On retourne sur l'accueil.
?> 