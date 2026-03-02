<?php

    if(!isset($_GET["id"]) || $_GET["id"] == ""){
        redirectIfNotFound();
    }
    $sql = "SELECT posts.*, categories.category_name FROM posts
        LEFT JOIN categories
        ON posts.category_id = categories.id
        WHERE posts.id = :id";
    $params = ["id" => $_GET["id"]];
    $post = $db ->query($sql, $params)->fetch();
    if(!$post){
        redirectIfNotFound();
    }
require "views/posts/show.view.php";