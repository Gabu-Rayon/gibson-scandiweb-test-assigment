<?php
require_once __DIR__ . '/../vendor/autoload.php';


use app\Router;
use app\controllers\ProductController;

$router = new Router();

//route the controllers

$router->get('/', [ProductController::class, 'index']);

$router->get('/addproduct', [ProductController::class, 'create']);


$router->post('/delete-product', [ProductController::class, 'delete']);

$router->get('/api/read-product', [ProductController::class, 'read']);

$router->resolve();