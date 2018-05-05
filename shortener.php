<?php
    $post = json_decode(file_get_contents('php://input'), true);
    $url = $post["url"];

    $servername = "localhost";
    $dbname = "shortener";
    $username = "root";
    $password = "root";
    $baseUrl = "http://localhost/redirect.php?id=";

    //PHP Data Object PDO - library to connect to db
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO link VALUES (NULL, \"$url\")";
        $connection->exec($query);
        $id = $connection->lastInsertId();
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

    $response = ['url' => $baseUrl.$id];
    echo json_encode($response);
?>