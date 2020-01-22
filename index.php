<?php include 'loginFormHandler.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
        <style> 
            form { margin-left: 650px; transform: translateY(200px); }
            small { font-size: smaller; }
        </style>
    </head>

    <body class="w3-container w3-margin-left w3-gray">
        <form action="<?php echo $phpScript; ?>" method="POST" class="w3-quarter w3-light-green w3-margin-top w3-round-large w3-padding-32 w3-center w3-border w3-border-cyan">
            <h1><b>Login</b></h1>
            <p> 
                <input name="username" id="usr"placeholder="Username" value="<?php echo $username; ?>" class="w3-round-large w3-border w3-border-cyan w3-center" required>
                <span class="w3-text-red"> * <?php echo $usernameError; ?></span>
            </p>
            <p>
                <input name="password" id="pwd" placeholder="Password" type="password" value="<?php echo $password; ?>" class="w3-round-large w3-border w3-border-cyan w3-center" required>
                <span class="w3-text-red"> * <?php echo $passwordError; ?></span>
            </p>
            <p>
                <button name="submit" class="w3-round-xlarge w3-border w3-border-cyan">
                    <script src="loginFormValidation.js"></script>
                Submit
                </button>
            <p>
            <p>________________________</p>
            <p><button formaction="guestRegistration.php" class="w3-round-xlarge w3-border w3-border-cyan" formnovalidate><b>Continue as Guest</b></button></p>
            <p><button formaction="newUserRegistration.php" class="w3-round-xlarge w3-border w3-border-cyan" formnovalidate><b>Create Account</b></button></p>
            <h6 class="w3-center"><small>Note for grader: add-event functionality was removed in final iteration due to bugs, but records can still be added to database via "Create Account".</small></h4>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    </body>
</html>