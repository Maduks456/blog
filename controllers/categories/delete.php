<?php
require __DIR__ . '/../../Validator.php';
    $errors = [];
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Content is needed to be a number and in the database";
    }
    if(empty($errors)){
        $sql = "DELETE FROM categories WHERE id = :id";
        $params = ["id" => $_POST["id"]];
        $db->query($sql,$params);
        header("location: /categories"); 
        exit();
    }