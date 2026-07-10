<?php
require __DIR__ . '/../../Validator.php';
$pageTitle = "Create Category";
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['category_name'], min: 3,  max: 25)){
        $errors["category_name"] = "Content is needed to be typed, And it isnt shorter than 3 and longer than 25 simbols";
    }
    if (empty($errors)) {
        $sql = "INSERT INTO categories(category_name) VALUE (:category_name)";
        $params = ["category_name" => $_POST["category_name"]];
        $db->query($sql,$params);
        header("Location: /categories"); 
        exit();
    }
}

require(__DIR__ . '/../../views/categories/create.view.php');