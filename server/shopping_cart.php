<?php

class ShoppingCart
{
    private $items;

    public function __construct()
    {
        $this->items = array();
    }

    public function add_item($item)
    {
        $this->items[$item->get_id()] = $item;
    }

    public function get_items()
    {
        return array_values($this->items);
    }

    public function get_item_by_id($id)
    {
        return $this->items[$id] ?? null;
    }

    public function remove_by_id($id)
    {
        unset($this->items[$id]);
    }

    public function buy() {
        $this->items = array();
    }

}

?>