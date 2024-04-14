<?php

namespace App;

use PDO;

class Database
{
    public function getConnection(): PDO {
        $dns = "mysql:host=localhost;dbname=mvc_php_db;charset=utf8;port=3306";
        $userName = "root";
        $password = "root";

        return new PDO($dns, $userName, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}