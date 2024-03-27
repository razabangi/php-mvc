<?php

namespace app\Models;

use PDO;

class Product {
    public function getData(): array {
        $dns = "mysql:host=localhost;dbname=mvc_php_db;charset=utf8;port=3306";
        $userName = "root";
        $password = "root";

        $pdo = new PDO($dns, $userName, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->query("select * from products");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}