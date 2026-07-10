<?php
require __DIR__ . '/../../Validator.php';
$pageTitle = "Edit Category";
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
        $errors["category_name"] = "Content is needed to be typed, And it isnt shorter than 3 and longer than 25 simbols";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Content is needed to be a number and in the database";
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