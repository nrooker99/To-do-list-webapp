<?php 

    function sanitizeInput($data) {
        return trim(stripslashes(htmlspecialchars($data)));
    }
    
    $username = sanitizeInput($_GET['name']);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
        <!-- Drop down menu, uncertain of how to implement using W3 -->
        <style> 
            .dropbtn { background-color: #4CAF50; color: white; padding: 16px; font-size: 16px; border: none; }
            .dropdown { position: relative; display: inline-block; }
            .dropdown-content { display: none; position: absolute; background-color: #f1f1f1; min-width: 160px; box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); z-index: 1; }
            .dropdown-content a { color: black; padding: 12px 16px; text-decoration: none; display: block; }
            .dropdown-content a:hover { background-color: #ddd; }
            .dropdown:hover .dropdown-content { display: block; }
            .dropdown:hover .dropbtn { background-color: #3e8e41; }
        </style>
    </head>
    <!-- Some elements don't display correctly when using W3.CSS so I used the style tag instead-->
    <body class="w3-container w3-margin-left w3-gray w3-center">
        <h1><b>Welcome <?php echo $username ?>!</b></h1>
        <div class="dropdown w3-center">
            <button class="dropbtn w3-light-green w3-container w3-round-xlarge w3-border w3-border-cyan" style="width:300px; margin-top:300px"><b>Choose an action.</b></button>
                <div class="dropdown-content w3-display-bottom" style="margin-left:65px; text-align:center">
                    <a href="displayToDoList.php">View my to-do list</a>
                    <a href="deleteEvent.php">Delete an event</a>
                    <a href="updateEvent.php">Update an event</a>
                </div>
        </div>
        <form>
        <p class="w3-display-botttomright"><button formaction="logout.php" class="w3-margin-bottom w3-round-xlarge w3-border w3-border-cyan w3-center w3-light-green"style="width:100px; margin-top:490px; margin-left:1700px;"><b>Log out</b></button><p>
        </form>
    </body>
</html>