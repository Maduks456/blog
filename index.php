<?php
require_once "functions.php";
require_once "Database.php";
$config = require __DIR__ . '/config.php';
$db = new Database($config["database"]);
require __DIR__ . '/router.php';