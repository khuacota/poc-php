<?php

class ProductHandler
{
    private $products;

    public function __construct()
    {
        $this->products = array();
    }

    public function add_product($product)
    {
        $this->products[$product->get_id()] = $product;
    }

    public function get_products()
    {
        return array_values($this->products);
    }

    public function get_product_by_id($id)
    {
        return $this->products[$id] ?? null;
    }

}

?>