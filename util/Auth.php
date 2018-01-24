<?php

/**
 * 
 */
class Auth {

    public static function handleLogin() {
        @session_start();
        if (isset($_SESSION['loggedIn'])) {
            $logged = $_SESSION['loggedIn'];
//            $role=$_SESSION['role'];
//            echo $logged;
            if ($logged == false) {
                echo "login false";
                die;
                session_unset();
                session_destroy();
                header('location: login');
                exit;
            }
        } else {
            header('location: index');
        }
    }

    public static function handleAdmin() {
        @session_start();
        if (isset($_SESSION['role'])) {
            $role = $_SESSION['role'];
            if ($role <> 'admin') {
                header('location: index');
                exit;
            }
        }
    }

}
