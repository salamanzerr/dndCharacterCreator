<?php
$dsn='mysql:host=joecool.highpoint.edu;dbname=CSC3212_S24_YOURNAME_db';
$username=YOURUSERNAME;
$password=YOURPASSWORD;
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('databaseError.php');
        exit();
    }
?>
