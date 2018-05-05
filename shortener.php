<?php
    $url = $_POST['url'];

    echo($url);
    $servername = "localhost";
    $dbname = "shortener";
    $username = "roodt";
    $password = "root";

    //PHP Data Object PDO - library to connect to db
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>