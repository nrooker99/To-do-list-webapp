<?php 
        
    //you might be wondering why this file is the way it is.
    //well, it works, and if i touch it, everything breaks.

        $phpScript = sanitizeInput($_SERVER['PHP_SELF']);

        function sanitizeInput($data) {
            return trim(stripslashes(htmlspecialchars($data)));
        }
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $username = sanitizeInput($_POST['username']);
            $password = sanitizeInput($_POST['password']);
    
            $isUsernameEmpty = empty($username);
            $isPasswordEmpty = empty($password);
    
            $hasFormEmptyFields = $isUsernameEmpty || $isPasswordEmpty;
        } 
        require 'inc.db.php';
        try {
            $pdo = new PDO(CONNECT_MYSQL, USER, PWD);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = " 
            INSERT INTO user (username, password)
            VALUES ('$username', '$password');
            ";
            $pdo->exec($sql);
            $sql = '
            DELETE FROM user
            WHERE username = "";
            ';
            $pdo->exec($sql);
            $sql = '
            DELETE FROM user
            WHERE username = "";
            ';
            $pdo->exec($sql);
            $pdo = null;

        }
        catch(PDOException $e) {
            die ($e->getMessage()) ;
        }

        if ( !$hasFormEmptyFields ) {
            session_start();
            $_SESSION['name'] = $username;
            header("Location: homepage.php?name=$username");
            die();
        }
?>