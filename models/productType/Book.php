<?php

namespace app\models\productType;

use app\models\Product;

class Book extends Product
{
    protected function validateValue()
    {
        if (!$this->data['weight']) {
            return "Please set the weight";
        }

        if (is_numeric($this->data['weight']) && floatval($this->data['weight'] >= 0)) {
            $this->value = 'Weight: ' . $this->data['weight'] . ' KG';
            return "";
        }

        return "This weight is invalid please set another";
    }
}