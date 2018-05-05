<?php
    require_once("db.php");
    $db = new DB();
    $id = $_GET['id'];

    $url = $db->query("SELECT l.url FROM link AS l WHERE l.id=$id");

    $newURL = $url["url"];

    header('Location: '.$newURL);
?>