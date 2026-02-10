<?php
$pageTitle = "Izveidot";
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!isset($_POST["content"])|| strlen($_POST["content"]) == 0 || strlen($_POST["content"])>50){
        $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
    }
    if (empty($errors)) {
        $sql = "INSERT INTO posts(content) VALUE (:content)";
        $params = ["content" => $_POST["content"]];
        $db->query($sql,$params);
        header("Location: /"); 
        exit();
    }
}
require "./views/posts/create.view.php";