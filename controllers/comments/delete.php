<?php
    require "Validator.php";
    $errors = [];
    if(!Validator::number($_POST["kom_id"])){
        $errors["kom_id"] = "Saturam jābūt ciparam un jābūt datubāzē";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Saturam jābūt ciparam un jābūt datubāzē";
    }
    if(empty($errors)){
        $sql = "DELETE FROM comments WHERE id = :id";
        $params = ["id" => $_POST["kom_id"]];
        $db->query($sql,$params);
        header("Location: /show?id=".$_POST["id"]); 
        exit();
    }