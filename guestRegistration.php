<?php
    declare(strict_types = 1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $phpScript = sanitizeInput($_SERVER['PHP_SELF']);

    $usernameError = $passwordError = '';
    $username = $password = '';

    function sanitizeInput($data) {
        return trim(stripslashes(htmlspecialchars($data)));
    }

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $username = 'guest';
        $password = 'guest';

        if (!$hasFormEmptyFields) {
            session_start();
            $_SESSION['name'] = $username;
            header("Location: homepage.php?name=$username");
            die();
        }
    }
?>