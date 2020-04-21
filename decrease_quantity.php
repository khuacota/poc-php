<?php
require ('server/shopping_cart.php');
require ('server/product_handler.php');
require ('server/item.php');
require ('server/product.php');

if (isset($_POST['id']))
{
    $myfile = fopen('database/cart.txt', 'r');
    $shopping_cart = unserialize(fread($myfile, filesize('database/cart.txt')));
    fclose($myfile);

    $item = $shopping_cart->get_item_by_id($_POST['id']);
    $item->decrease_quantity();
    $shopping_cart_serialize = serialize($shopping_cart);

    $myfile = fopen('database/cart.txt', 'w');
    fwrite($myfile, $shopping_cart_serialize);
    fclose($myfile);
}

?>