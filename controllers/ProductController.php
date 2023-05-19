<?php

namespace app\controllers;

use app\Database;
use app\resources\views\mainBlade;
use app\models\productType\utilValidate;

class ProductController
{
    public static function index()
    {
        $db = new Database();
        mainBlade::renderView('show.blade', [
            'products' => $db->getProducts()
        ]);
    }

    public static function create()
    {
        $product = new utilValidate([]);
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = [];
            foreach ($_POST as $key => $value) {
                $productData[$key] = $value;
            }
            //function that renders different types of products
            $prodName = "app\\models\\productType\\" . $_POST['type'];
            if (class_exists($prodName)) {
                $product = new $prodName($productData);
            } else {
                $product = new utilValidate($productData);
            }

            $errors = $product->validateData();

            if (!$errors) {
                $db = new Database();
                $db->createProduct($product);
                header('Location: /');
                exit;
            }
        }

        mainBlade::renderView('add-product.blade', [
            'errors' => $errors,
            'product' => $product
        ]);
    }

    public static function delete()
    {
        if ($_POST) {
            $db = new Database();
            foreach ($_POST as $key => $value) {
                $db->deleteProduct($key);
            }
        }
        header('Location: /');
    }

    public static function read()
    {
        header('Content-Type: application/json');
        $db = new Database();
        echo json_encode($db->getProduct($_GET['sku']));
    }
}