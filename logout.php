<?php
    declare(strict_types = 1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    unset($_SESSION['name']);
    session_destroy();
    header("Location: index.php");
    die();
?>