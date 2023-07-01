<?php

namespace app;

use PDO;
use app\models\Product;

class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $this ->pdo =  new PDO('mysql:host=localhost;port=3306;dbname=scandiweb-db-02', 'GabuRayon', 'localhost@12345#');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM products ORDER BY sku');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct($sku)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE sku = :sku ');
        $statement->bindValue(':sku', $sku);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (sku, name, price, type, value)VALUES (:sku, :name, :price, :type, :value)");

        $statement->bindValue(':sku', $product->sku);
        $statement->bindValue(':name', $product->name);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':type', $product->type);
        $statement->bindValue(':value', $product->value);

        $statement->execute();
    }

    public function deleteProduct($sku) {
        $statement = $this->pdo->prepare('DELETE FROM products WHERE sku = :sku');
        $statement->bindValue(':sku', $sku);

        return $statement->execute();
    }
}