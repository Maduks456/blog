<?php
require __DIR__ . '/../../Validator.php';
$pageTitle = "Edit Blog";
$errors = [];
$sql = "SELECT * FROM categories" ;
$categories = $db ->query($sql)->fetchAll();
if(!isset($_GET["id"]) || $_GET["id"] == ""){
        redirectIfNotFound();
    }
    $sql = "SELECT posts.*, categories.category_name FROM posts
        LEFT JOIN categories
        ON posts.category_id = categories.id
        WHERE posts.id = :id";;
    $params = ["id" => $_GET["id"]];
    $post = $db ->query($sql, $params)->fetch();
    if(!$post){
        redirectIfNotFound();
    }
    $CategoryNow = $_POST["category_id"] ?? $post["category_id"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['title'], max: 50)){
        $errors["title"] = "Title is needed to be typed, And it isnt longer than 50 simbols";
    }
    if(!Validator::string($_POST['content'], max: 250)){
        $errors["content"] = "Content is needed to be typed, And it isnt longer than 250 simbols";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Id is needed to be a number and in the database";
    }
    if (empty($errors)) {
        $sql = "UPDATE posts SET title = :title, content = :content, category_id= :category_id WHERE id = :id";
        $params = ["title" => $_POST["title"],"content" => $_POST["content"],"category_id"=> $_POST["category_id"], "id" =>$_POST["id"]];
        $db->query($sql,$params);
        header("location: /"); 
        exit();
    }
}
require(__DIR__ . '/../../views/posts/edit.view.php');
