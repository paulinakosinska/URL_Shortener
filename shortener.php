<?php

    require_once("db.php");

    $db = new DB();

    $post = json_decode(file_get_contents('php://input'), true);
    $url = $post["url"];

    $baseUrl = "http://localhost/redirect.php?id=";

    $id = $db->executeQuery("INSERT INTO link VALUES (NULL, \"$url\")");

    $response = ['url' => $baseUrl.$id];
    echo json_encode($response);
?>