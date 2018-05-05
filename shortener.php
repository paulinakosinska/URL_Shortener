<?php
    $url = $_POST['url'];
    $servername = "localhost";
    $dbname = "shortener";
    $username = "root";
    $password = "root";

    //PHP Data Object PDO - library to connect to db
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO link VALUES (NULL, \"$url\")";
        $connection->exec($query);
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>