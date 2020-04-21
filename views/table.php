<?php
$myfile = fopen(__DIR__ . '/../database/cart.txt', 'r');
$shopping_cart = unserialize(fread($myfile, filesize(__DIR__ . '/../database/cart.txt')));
fclose($myfile);
$items = $shopping_cart->get_items();
?>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Subtotal</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($items as $key => $item){ ?>
      <tr>
        <th scope="row"><?php echo $key + 1; ?></th>
        <td><?php echo $item->get_product()->get_name(); ?></td>
        <td>
            <i class="fa fa-minus-circle" onclick="decrease('<?php echo $item->get_id(); ?>')"></i>
            <?php echo $item->get_quantity(); ?>
            <i class="fa fa-plus-circle" onclick="increase('<?php echo $item->get_id(); ?>')"></i>
        </td>
        <td><?php echo $item->get_subtotal(); ?></td>
        <td><i class="fa fa-trash" onclick="remove('<?php echo $item->get_id(); ?>')"></i></td>
      </tr>
      <?php } ?>
    </tbody>
</table>