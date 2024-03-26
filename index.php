<?php

$dns = "mysql:host=localhost;dbname=mvc_php_db;charset=utf8;port=3306";
$userName = "root";
$password = "root";

$pdo = new PDO($dns, $userName, $password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stmt = $pdo->query("select * from products");

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($products);