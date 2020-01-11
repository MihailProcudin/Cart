<?php

class State
{



    public function __construct()
    {

        $_SESSION['products'] = $this->products;
    }

    public static function add($product)
    {
        //if new item;
        if (Self::isFirst($product)) {
            $product['quantity'] = 1;
            array_push($_SESSION['cart'], $product);
        } else {
            Self::addToExisting($product);
        }
        // $_SESSION['cart'] = $product;

        return true;
    }

    private static function addToExisting($product)
    {
        $newCartState = array_map(function ($item) use ($product) {
            if ($item['name'] == $product['name']) {
                $item['quantity'] += 1;
            }
            return $item;
        }, $_SESSION['cart']);
        $_SESSION['cart'] = $newCartState;
    }

    /* check if this is first product in the cart */
    private static function isFirst($product)
    {
        if (!is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $data = true;
        $data = array_filter($_SESSION['cart'], function ($item) use ($product) {
            return $item['name'] == $product['name'];
        });
        return !$data;
    }

    public static function updateState($state)
    {
        $_SESSION['cart'] = $state;
    }

    public static function get()
    {

        return $_SESSION['cart'];
    }

    public static function getProducts()
    {
        return [
            ["name" => "Sledgehammer", "price" => 125.75],
            ["name" => "Axe", "price" => 190.50],
            ["name" => "Bandsaw", "price" => 562.131],
            ["name" => "Chisel", "price" => 12.9],
            ["name" => "Hacksaw", "price" => 18.45],
        ];
    }

    public static function showState()
    {
?>
        <pre> <?php print_r($_SESSION) ?> </pre>
<?php
    }
}
