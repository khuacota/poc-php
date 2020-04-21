<?php

class Item
{
    private $id;
    private $product;
    private $quantity;
    private $subtotal;

    public function __construct($product, $quantity, $subtotal)
    {
        $this->id = uniqid();
        $this->product = $product;
        $this->quantity = $quantity;
        $this->subtotal = $subtotal;
    }

    public function decrease_quantity ()
    {
        $this->quantity = $this->quantity - 1;
        $this->subtotal = $this->subtotal - $this->product->get_price();
    }

    public function increase_quantity ()
    {
        $this->quantity = $this->quantity + 1;
        $this->subtotal = $this->subtotal + $this->product->get_price();
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_product()
    {
        return $this->product;
    }

    public function get_quantity()
    {
        return $this->quantity;
    }

    public function set_quantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function get_subtotal()
    {
        return $this->subtotal;
    }

}

?>