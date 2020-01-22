<?php include 'registrationHandler.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add record</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
        <style> 
            form { margin-left: 650px; transform: translateY(200px); }
        </style>
    </head>

    <body class="w3-container w3-margin-left w3-gray">
        <form action="<?php echo $phpScript; ?>" method="POST" class="w3-quarter w3-light-green w3-margin-top w3-round-large w3-padding-32 w3-center w3-border w3-border-cyan">
            <h1><b>Create Account</b></h1>
            <p> 
                <input name="username" placeholder="New username" value="<?php echo $username; ?>" class="w3-round-large w3-border w3-border-cyan w3-center" required>
                <span class="w3-text-red"> * <?php echo $usernameError; ?></span>
            </p>
            <p>
                <input name="password" placeholder="New password" type="password" value="<?php echo $password; ?>" class="w3-round-large w3-border w3-border-cyan w3-center" required>
                <span class="w3-text-red"> * <?php echo $passwordError; ?></span>
            </p>
            <p><button name="submit" class="w3-round-xlarge w3-border w3-border-cyan">Let's get started!</button><p>
        </form>
    </body>
</html>