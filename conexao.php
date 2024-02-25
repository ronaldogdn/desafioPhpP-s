<?php 
   $username = "root";
   $password = "rgdn3288";

    try 
    {
        $conn = new PDO('mysql:host=localhost;dbname=wxr', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
