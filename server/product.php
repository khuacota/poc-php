<?php
class Product
{
    private $id;
    private $name;
    private $image;
    private $color;
    private $price;
    private $quantity;
    private $options;
    private const IS_AVAILABLE_IN_BOLIVIA = 0;
    private const IS_IN_PROMOTION = 1;
    private const IS_ACCEPTED_DEVOLUTIONS = 2;

    public function __construct($name, $image, $color, $price, $quantity, $options)
    {
        $this->id = uniqid();
        $this->name = $name;
        $this->image = $image;
        $this->color = $color;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->options = $options;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_name()
    {
        return $this->name;
    }
    
    public function get_image()
    {
        return $this->image;
    }

    public function get_color()
    {
        return $this->color;
    }

    public function get_price()
    {
        return $this->price;
    }

    public function get_quantity()
    {
        return $this->quantity;
    }

    public function is_available_in_bolivia()
    {
        return $this->is_bit_set(self::IS_AVAILABLE_IN_BOLIVIA) ? 'Ships to Bolivia' : 'Not ships to Bolivia';
    }

    public function is_in_promotion()
    {
        return $this->is_bit_set(self::IS_IN_PROMOTION); 
    }

    public function is_accepted_devolutions()
    {
        return $this->is_bit_set(self::IS_ACCEPTED_DEVOLUTIONS) ? 'Seller acepts returns' :
               'Seller does not accept returns';
    }

    private function is_bit_set($index)
    {
        return $this->options & (1 << $index);
    }

}

?> 