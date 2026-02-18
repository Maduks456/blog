<?php
require "Validator.php";
$pageTitle = "Reģitrēt";
$errors = [];
if(!isset($_GET["id"]) || $_GET["id"] == ""){
        redirectIfNotFound();
    }
    $sql = "SELECT * FROM posts WHERE id = :id";
    $params = ["id" => $_GET["id"]];
    $post = $db ->query($sql, $params)->fetch();
    if(!$post){
        redirectIfNotFound();
    }

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['content'], max: 50)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Saturam jābūt ciparam un jābūt datubāzē";
    }
    if (empty($errors)) {
        $sql = "UPDATE posts SET content = :content WHERE id = :id";
        $params = ["content" => $_POST["content"], "id" =>$_POST["id"]];
        $db->query($sql,$params);
        header("location: /show?=" . $_POST["id"]); 
        exit();
    }
}

require "./views/posts/edit.view.php";