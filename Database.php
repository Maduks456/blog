<?php
class Database {
    private $pdo;

    public function __construct($config) {
        $dsn = "mysql:host=" . $config['host'] .
               ";port=" . $config['port'] .
               ";dbname=" . $config['dbname'] .
               ";charset=" . $config['charset'];

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        // Only enforce SSL when not connecting to localhost (e.g. on Vercel/Aiven)
        if ($config['host'] !== 'localhost') {
            $sslCaConstant = PHP_VERSION_ID >= 80500
                ? \Pdo\Mysql::ATTR_SSL_CA
                : PDO::MYSQL_ATTR_SSL_CA;

            $options[$sslCaConstant] = __DIR__ . '/certs/aiven-ca.pem';
        }

        $this->pdo = new PDO($dsn, $config['user'], $config['password'], $options);
    }

    public function query($sql, $params = []) {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }
}