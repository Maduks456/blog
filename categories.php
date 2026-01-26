<?php

require_once "functions.php";
require_once "Database.php";
$config = require "config.php";

$db = new Database($config["database"]);
$sql_query = "SELECT * FROM categories";
$params = [];
if(isset($_GET["search_query"]) && trim($_GET["search_query"]) != "") {
    $sql_query .= " WHERE category_name LIKE :search";
    $params["search"] = "%" . $_GET["search_query"] . "%";
}
$categories = $db->query($sql_query, $params)->fetchAll(PDO::FETCH_ASSOC);
echo "<ul>";
echo" <h1>Emuārs</h1>";
echo "<form>";
    echo "<input name='search_query' />";
    echo "<button>Meklēt</button>";
echo "</form>";
    foreach($categories as $category) {
        echo "<li>" 
        . $category["category_name"] 
        . "</li>";
    }
echo "</ul>";