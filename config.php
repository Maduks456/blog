<?php
return [
    "database" => [
        "host"     => getenv('DB_HOST') ?: 'localhost',
        "port"     => getenv('DB_PORT') ?: 3306,
        "user"     => getenv('DB_USER') ?: 'root',
        "password" => getenv('DB_PASS') ?: 'root',
        "dbname"   => getenv('DB_NAME') ?: 'blog',
        "charset"  => "utf8mb4",
    ],
    "email" => [
    ],
    "payments" => [
    ],
];