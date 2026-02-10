<?php
    if(!isset($_GET["id"]) || $_GET["id"] == ""){
        RedirectIfNotFound();
    }
    $sql = "SELECT * FROM posts WHERE id = :id";
    $params = ["id" => $_GET["id"]];
    $post = $db ->query($sql, $params)->fetch();
    if(!$posts){
        RedirectIfNotFound();
    }
require "views/posts/show.view.php";