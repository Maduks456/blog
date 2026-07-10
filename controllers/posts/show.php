<?php
$pageTitle = "Blog";
    if(!isset($_GET["id"]) || $_GET["id"] == ""){
        redirectIfNotFound();
    }
    $sql = "SELECT posts.*, categories.category_name FROM posts
        LEFT JOIN categories
        ON posts.category_id = categories.id
        WHERE posts.id = :id";
    $params = ["id" => $_GET["id"]];
    $post = $db ->query($sql, $params)->fetch();
    $sql = "SELECT *, c.content AS kom_content , c.id AS kom_id FROM comments c
        LEFT JOIN posts p ON p.id = c.post_id
        WHERE c.post_id = :id";
    $params = ["id"=>$_GET["id"]];
    $comment = $db ->query($sql, $params)-> fetchALL(PDO::FETCH_ASSOC);
    
    if(!$post){
        redirectIfNotFound();
    }
require(__DIR__ . '/../../views/posts/show.view.php');
