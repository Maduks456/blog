<?php

require __DIR__ . '/../../Validator.php';
$pageTitle = "Reģitrēt";
$customStyles = "komedit.css";
$errors = [];

if(!isset($_GET["id"]) || $_GET["id"] == "" ){
        redirectIfNotFound();
    }

    $sql = "SELECT * FROM comments WHERE id = :id";
    $params = ["id" => $_GET["id"]];
    $comment = $db ->query($sql, $params)->fetch();
    if(!$comment){
        redirectIfNotFound();
    }


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['author'],min: 1, max: 50)){
        $errors["author"] = "Autor name is needed to be typed, And it isnt  shorter than 1 and longer than 50 simbols";
    }
    if(!Validator::string($_POST['content'],min: 3, max: 255)){
        $errors["content"] = "Content is needed to be typed, And it isnt  shorter than 3 and longer than 255 simbols";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Content is needed to be a number and in the database";
    }
    if (empty($errors)) {
        $sql = "UPDATE comments SET author = :author, creation_time = NOW(), content= :content WHERE id = :id";
        $params = ["author" => $_POST["author"],"content"=>$_POST["content"], "id" =>$_POST["kom_id"]];
        $db->query($sql,$params);
        header("location: /show?id=". $_POST["id"]); 
        exit();
    }
}
require(__DIR__ . '/../../views/comments/edit.view.php');
