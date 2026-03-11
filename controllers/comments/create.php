<?php
require "Validator.php";
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['auther'], min: 1,  max: 50)){
        $errors["auter"] = "Autora vārdam jābūt ievadītam, bet ne īsākam par 1 un ne garākam par 50 rakstzīmēm";
    }
    if(!Validator::string($_POST['saturs'], min: 1,  max: 250)){
        $errors["saturs"] = "Saturam jābūt ievadītam, bet ne īsākam par 1 un ne garākam par 250 rakstzīmēm";
    }
    if (empty($errors)) {
        $sql = "INSERT INTO comments(author, creation_time, content, post_id) VALUES (:auther, NOW(), :content, :post_id)";
        $params = ["auther" => $_POST["auther"], "content"=> $_POST["saturs"],"post_id"=> $_POST["id"]];
        $db->query($sql,$params);
        header("Location: /show?id=".$_POST["id"]); 
        exit();
    }
}