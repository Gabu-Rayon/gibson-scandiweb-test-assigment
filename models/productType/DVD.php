<?php

namespace app\models\productType;

use app\models\Product;

class DVD extends Product
{
    protected function validateValue()
    {
        if (!$this->data['size']) {
            return "Please set the size";
        }

        if (is_numeric($this->data['size']) && floatval($this->data['size'] >= 0)) {
            $this->value = 'Size: ' . $this->data['size'] . ' MB';
            return "";
        }

        return "This size is invalid please set another";
    }
}