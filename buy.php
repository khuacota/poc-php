<?php
require ('server/shopping_cart.php');
require ('server/product_handler.php');

    $myfile = fopen('database/cart.txt', 'r');
    $shopping_cart = unserialize(fread($myfile, filesize('database/cart.txt')));
    fclose($myfile);

    $shopping_cart->buy();
    $shopping_cart_serialize = serialize($shopping_cart);

    $myfile = fopen('database/cart.txt', 'w');
    fwrite($myfile, $shopping_cart_serialize);
    fclose($myfile);
?>