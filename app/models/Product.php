<?php

namespace app\Models;

use app\Database;
use PDO;

class Product {
    public function getData(): array {
        $connection = new Database();
        $pdo = $connection->getConnection();
        
        $stmt = $pdo->query("select * from products");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}