<?php

namespace app\resources\views;

class mainBlade
{
 
    public static function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/blades/$view.php";
        $content = ob_get_clean();
        include __DIR__ . "/partials/_layout.blade.php";
    }
}