<?php
    $dbServerName = 'localhost';
    $dbUserName = 'root';
    $dbPassword = '';
    $dbName = 'task_manager';

    $connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);
    if($connection->connect_error) {
        echo "$connection->connect_error";
        die("Connection failed: " . $connection->connect_error);
    }
?>