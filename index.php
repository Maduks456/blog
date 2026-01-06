<?php
require_once "functions.php";
$dsn = "mysql:host=localhost;port=3306;user=root;password=root;dbname=blog;charset=utf8mb4";
$pdo = new PDO($dsn);
var_dump($pdo);
$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
echo "<ul>";
    foreach($posts as $post) {
        echo "<li>" . $post["content"] . "</li>";
    }
echo "</ul>";