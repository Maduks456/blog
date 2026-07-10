<?php
require __DIR__ . '/../../Validator.php';
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!Validator::string($_POST['auther'], min: 1,  max: 50)){
        $errors["auter"] = "Autor name is needed to be typed, And it isnt  shorter than 1 and longer than 50 simbols";
    }
    if(!Validator::string($_POST['saturs'], min: 1,  max: 250)){
        $errors["saturs"] = "Content is needed to be typed, And it isnt  shorter than 1 and longer than 250 simbols";
    }
    if (empty($errors)) {
        $sql = "INSERT INTO comments(author, creation_time, content, post_id) VALUES (:auther, NOW(), :content, :post_id)";
        $params = ["auther" => $_POST["auther"], "content"=> $_POST["saturs"],"post_id"=> $_POST["id"]];
        $db->query($sql,$params);
        header("Location: /show?id=".$_POST["id"]); 
        exit();
    }
}