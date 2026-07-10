<?php
    require __DIR__ . '/../../Validator.php';
    $errors = [];
    if(!Validator::number($_POST["kom_id"])){
        $errors["kom_id"] = "Content is needed to be a number and in the database";
    }
    if(!Validator::number($_POST["id"])){
        $errors["id"] = "Content is needed to be a number and in the database";
    }
    if(empty($errors)){
        $sql = "DELETE FROM comments WHERE id = :id";
        $params = ["id" => $_POST["kom_id"]];
        $db->query($sql,$params);
        header("Location: /show?id=".$_POST["id"]); 
        exit();
    }