<?php


require "Validator.php";
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
        $errors["author"] = "Autora vārdam jābūt ievadītam, bet ne īsākam par 1 un ne garākam par 50 rakstzīmēm";
    }
    if(!Validator::string($_POST['content'],min: 3, max: 255)){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne īsākam par 3 un ne garākam par 255 rakstzīmēm";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Saturam jābūt ciparam un jābūt datubāzē";
    }
    if (empty($errors)) {
        $sql = "UPDATE comments SET author = :author, creation_time = NOW(), content= :content WHERE id = :id";
        $params = ["author" => $_POST["author"],"content"=>$_POST["content"], "id" =>$_POST["kom_id"]];
        $db->query($sql,$params);
        header("location: /show?id=". $_POST["id"]); 
        exit();
    }
}

require "./views/comments/edit.view.php";