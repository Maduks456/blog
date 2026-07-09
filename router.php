<?php
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$routes = require __DIR__ . '/routes.php';
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    require __DIR__ . '/controllers/404.php';
    die();
}
