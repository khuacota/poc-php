<?php
require ('server/shopping_cart.php');
require ('server/product_handler.php');
require ('server/item.php');
require ('server/product.php');

try{
if (isset($_POST['id']) && isset($_POST['quantity']))
{
    $quantity = (int)$_POST['quantity'];
    if ($quantity <= 0) 
    {
        throw new \Exception("The quantity is invalid!");
    }
    $myfile = fopen('database/product.txt', 'r');
    $product_handler = unserialize(fread($myfile, filesize('database/product.txt')));
    fclose($myfile);
    
    $product = $product_handler->get_product_by_id($_POST['id']);
    $subtotal = $product->get_price() * $quantity;
    $item = new Item($product, $quantity, $subtotal);

    $myfile = fopen('database/cart.txt', 'r');
    $shopping_cart = unserialize(fread($myfile, filesize('database/cart.txt')));
    fclose($myfile);

    $shopping_cart->add_item($item);

    $shopping_cart_serialize = serialize($shopping_cart);

    $myfile = fopen('database/cart.txt', 'w');
    fwrite($myfile, $shopping_cart_serialize);
    fclose($myfile);
    echo json_encode(array(
        'result' => array(),
    ));
}
} catch(Exception $e) {
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}

?>