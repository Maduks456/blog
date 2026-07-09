<?php
require "Validator.php";
$pageTitle = "Izveidot kategoriju";
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['category_name'], min: 3,  max: 25)){
        $errors["category_name"] = "Saturam jābūt ievadītam, bet ne īsākam par 3 un ne garākam par 25 rakstzīmēm";
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