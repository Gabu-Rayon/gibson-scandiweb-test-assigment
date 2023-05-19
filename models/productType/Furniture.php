<?php

namespace app\models\productType;

use app\models\Product;

class Furniture extends Product
{
    protected function validateValue()
    {
        if (!$this->data['height'] || !$this->data['height'] || !$this->data['height']) {
            return "Please set the height";
        }

        if (
            is_numeric($this->data['height']) && is_numeric($this->data['width']) && is_numeric($this->data['length']) &&
            floatval($this->data['height'] >= 0) && floatval($this->data['width'] >= 0) && floatval($this->data['length'] >= 0)
        ) {
            $this->value = 'Dimensions: ' . $this->data['height'] . 'x' . $this->data['width'] . 'x' . $this->data['length'] . ' CM';
            return "";
        }

        return "Please set width, height and length";
    }
}