<?php

namespace app\models;

use app\Database;

abstract class Product
{
    public static $sku;
    
    public string $name;
    public float $price;
    public string $type;
    public string $value;
    public static array $validTypes = ["DVD", "Furniture", "Book"];
    public array $data;

    public function __construct($input)
    {
        $this->data = $input;
    }

    public function validateData()
    {
        $errors = [];
        if ($this->ValidateSku()) {
            $errors[] = $this->validateSku();
        }
        if ($this->ValidateName()) {
            $errors[] = $this->validateName();
        }
        if ($this->ValidatePrice()) {
            $errors[] = $this->validatePrice();
        }
        if ($this->ValidateType()) {
            $errors[] = $this->validateType();
        }
        if ($this->ValidateValue()) {
            $errors[] = $this->validateValue();
        }
        return $errors;
    }

    private function validateSku()
    {
        if (!$this->data['sku']) {
            return "Please set the SKU";
        }

        $db = new Database();
        if ($db->getProduct($this->data['sku'])) {
            return "Sorry this SKU is taken please provide another one";
        }

        $this->sku = $this->data['sku'];
        return "";
    }

    private function validateName()
    {
        if (!$this->data['name']) {
            return "Please set the name";
        }

        if (!$this->data['name'] === "") {
            return "This name is invalid";
        }

        $this->name = $this->data['name'];
        return "";
    }

    private function validatePrice()
    {
        if (!$this->data['price']) {
            return "Price was not provided!";
        }

        if (!filter_var($this->data['price'], FILTER_VALIDATE_FLOAT) || !(strlen($this->data['price']) > 0) || !(floatval($this->data['price']) >= 0)) {
            return "Invalid price!";
        }

        $this->price = floatval($this->data['price']);
        return "";
    }

    private function validateType()
    {
        if(!$this->data['type']) {
            return "Type was not provided!";
        }

        if(array_reduce($this::$validTypes, array($this, "reduceType"), $this->data['type']) !== true){
            return "Invalid type!";
        }

        $this->type = $this->data['type'];
        return "";
    }

    protected function reduceType($carry, $item)
    {
        if ($carry === true || $item === $carry) {
            return true;
        }
        return $carry;
    }

    abstract protected function validateValue();
 
}