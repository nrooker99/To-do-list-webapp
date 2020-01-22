<?php
    declare(strict_types = 1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

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
            </table>
            <h3 class="w3-center w3-margin-top"><a href="redirectToHomepage.php"><b>Return to homepage</b></a></h3>
            </body>
            </html> 
         ';
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
</head>
<body class="w3-panel w3-gray">
    <h1 class="w3-center"><b>Your to-do list<b></h1>
    <?php echo displayEventTable(); ?>