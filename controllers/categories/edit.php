<?php
require "Validator.php";
$pageTitle = "Reģitrēt";
$errors = [];
if(!isset($_GET["id"]) || $_GET["id"] == ""){
        redirectIfNotFound();
    }
    $sql = "SELECT * FROM categories WHERE id = :id";
    $params = ["id" => $_GET["id"]];
    $category = $db ->query($sql, $params)->fetch();
    if(!$category){
        redirectIfNotFound();
    }

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['category_name'],min: 3, max: 25)){
        $errors["category_name"] = "Saturam jābūt ievadītam, bet ne īsākam par 3 un ne garākam par 25 rakstzīmēm";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Saturam jābūt ciparam un jābūt datubāzē";
    }
    if (empty($errors)) {
        $sql = "UPDATE categories SET category_name = :category_name WHERE id = :id";
        $params = ["category_name" => $_POST["category_name"], "id" =>$_POST["id"]];
        $db->query($sql,$params);
        header("location: /categories"); 
        exit();
    }
}

require(__DIR__ . '/../../views/categories/edit.view.php');