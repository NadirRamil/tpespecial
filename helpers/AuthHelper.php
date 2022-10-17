<?php

class AuthHelper {
    public function __construct(){
        session_start();
    }

// Verifica que el user este logueado y si no lo está
//lo redirige al login.

public function checkLoggedIn() {
    if (!isset($_SESSION['IS_LOGGED'])){
        session_start();
        header("Location: " . BASE_URL . 'login');
        die();
    }    
}
public function getUser(){
    return $_SESSION;
}


}