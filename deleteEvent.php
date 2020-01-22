<?php

    $phpScript = sanitize($_SERVER['PHP_SELF']);

    function sanitize($data) {
        return trim(stripslashes(htmlspecialchars($data)));
    }

    require 'inc.db.php';

    function retrieveRecords() {

        try {
            $pdo = new PDO(CONNECT_MYSQL, USER, PWD);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "
            SELECT name AS Event, date AS Date, time AS Time
            FROM event
            ORDER BY Date, Time;
            ";
            
            $row = $pdo->query($sql)->fetch();

            $pdo = null;

            return $row;
        }
        catch(PDOException $e) {
            die ($e->getMessage()) ;
        }
    }

    function displayEventTable() {   

        $row = retrieveRecords();
        try {

            $pdo = new PDO(CONNECT_MYSQL, USER, PWD);
    
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            $sql = "
            SELECT name AS Event, date AS Date, time AS Time
            FROM event
            ORDER BY Date, Time;
            ";
            
            $rows = $pdo->query($sql);
    
            $pdo = null;
        }
        catch(PDOException $e) {
            die ($e->getMessage());
        }
        
        echo " 
            <table class='w3-table-all w3-hoverable w3-margin-top w3-border w3-border-cyan w3-light-green w3-round-large w3-striped'>
                <tr class='w3-light-green'>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
        ";
        while($row = $rows->fetch()) {
            $event = $row['Event'];
            $date = $row['Date'];
            $time = $row['Time'];
        echo " 
            <tr>
            <th>$event</th>
            <th>$date</th>
            <th>$time</th> 
            </tr>
        ";
        }
        echo '
            </table>'
        ;

           
    }

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $eventToRemove = '';
        $eventToRemove = sanitize($_POST['event']);

        $isEventEmpty = empty($eventToRemove);

        $eventError = $isEventEmpty? 'Enter an event' : '';

        $hasFormEmptyFields = $isEventEmpty;

        if (!$hasFormEmptyFields) {
            try {
                $pdo = new PDO(CONNECT_MYSQL, USER, PWD);
    
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $sql = "
                DELETE FROM event
                WHERE name = '$eventToRemove';
                ";
                
                $row = $pdo->exec($sql);
    
                $pdo = null;
            }
            catch(PDOException $e) {
                die ($e->getMessage()) ;
            }
            header("Location: displayToDoList.php");
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <?php include 'deleteEventHandler.php'; ?>
    <style> form { margin-left: 715px; } </style>
</head>
<body class="w3-panel w3-gray">
    <h1 class="w3-center"><b>Delete an event<b></h1>
    <?php echo displayEventTable(); ?>
    <form action="<?php echo $phpScript; ?>" method="POST" class="w3-container w3-quarter w3-light-green w3-margin-top w3-round-large w3-padding-32 w3-center w3-border w3-border-cyan">
            <h1><b>Choose an event</b></h1>
            <p> 
                <input name="event" placeholder="Remove which event?" value="<?php echo $eventToRemove; ?>" class="w3-round-large w3-border w3-border-cyan w3-center" required>
                <span class="w3-text-red">*</span>
            </p>
            <p><button name="submit" class="w3-round-xlarge w3-border w3-border-cyan">Submit</button><p>
    </form>
</body>
</html>
