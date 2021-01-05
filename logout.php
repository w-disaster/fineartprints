<?php
    require_once 'bootstrap.php';

    if (isUserLoggedIn(UserType::Customer) || isUserLoggedIn(UserType::Seller)) {
        // Elimina tutti i valori della sessione.
        $_SESSION = array();
        // Recupera i parametri di sessione.
        $params = session_get_cookie_params();
        // Cancella i cookie attuali.
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        // Cancella la sessione.
        session_destroy();
        require('login.php');
    }

?>