<?php
require __DIR__ . '/../../Validator.php';
$pageTitle = "Create Blog";
$errors = [];

$sql = "SELECT * FROM categories" ;
$CategoryNow = $_POST['category_id'] ?? null;
$categories = $db ->query($sql)->fetchAll();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['title'], max: 50)){
        $errors["title"] = "Title is needed to be typed, And it isnt longer than 50 simbols";
    }
    if(!Validator::string($_POST['content'], max: 250)){
        $errors["content"] = "Content is needed to be typed, And it isnt longer than 250 simbols";
    }
    if(!Validator::number($_POST['category_id'])){
        $errors["category_id"] = "id is needed to be a number and in the database";
    }
    if (empty($errors)) {
        $sql = "INSERT INTO posts(title, content, category_id) VALUES (:title, :content, :category_id)";
        $params = ["title" => $_POST["title"],"content" => $_POST["content"], "category_id"=>$_POST["category_id"]];
        $db->query($sql,$params);
        header("Location: /"); 
        exit();

    }
}
require(__DIR__ . '/../../views/posts/create.view.php');