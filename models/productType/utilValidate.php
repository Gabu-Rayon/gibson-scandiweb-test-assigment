<?php

namespace app\models\productType;

use app\models\Product;

class utilValidate extends Product
{
    protected function validateValue()
    {
        return "Product input was invalid please try again";
    }
}