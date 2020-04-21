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

    $shopping_cart->remove_by_id($_POST['id']);

    $shopping_cart_serialize = serialize($shopping_cart);

    $myfile = fopen('database/cart.txt', 'w');
    fwrite($myfile, $shopping_cart_serialize);
    fclose($myfile);
}

?>