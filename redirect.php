<?php
    $id = $_GET['id'];
    $servername = "localhost";
    $dbname = "shortener";
    $username = "root";
    $password = "root";
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT l.url FROM link AS l WHERE l.id=$id";
        $result = $connection->query($query);
        $url = $result->fetch(PDO::FETCH_ASSOC);
    }
    catch(Exception $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $newURL = $url["url"];

    header('Location: '.$newURL);
?>