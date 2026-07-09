<?php
require __DIR__ . '/../../Validator.php';
    $errors = [];
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Saturam jābūt ciparam un jābūt datubāzē";
    }
    if(empty($errors)){
        $sql = "DELETE FROM posts WHERE id = :id";
        $params = ["id" => $_POST["id"]];
        $db->query($sql,$params);
        header("location: /"); 
        exit();
    }