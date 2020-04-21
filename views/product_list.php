<?php
$myfile = fopen(__DIR__ . '/../database/product.txt', 'r');
$product_handler = unserialize(fread($myfile, filesize(__DIR__ . '/../database/product.txt')));
fclose($myfile);
$products = $product_handler->get_products();
?> 

<div class="container" id="product-list">
	<div class="row">
    <?php foreach($products as $product): ?>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="card">
        <img src= <?php echo $product->get_image(); ?> class="card-img-top" alt="..." width="50">
        <div class="card-body">
          <h3 class="card-title"><?php echo $product->get_name(); ?>
          <?php if ($product->is_in_promotion()): ?>
            <span class="badge badge-danger">Promotion</span>
          <?php endif; ?>
          </h3>
          <div>Price: <?php echo $product->get_price(); ?></div>
          <div>Color: <?php echo $product->get_color(); ?></div>
          <div><?php echo $product->is_available_in_bolivia(); ?></div>
          <div><?php echo $product->is_accepted_devolutions(); ?></div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" placeholder="Enter the quantity" 
                name="<?php echo $product->get_id(); ?>" min=1 max=20 required>
            </div>
            <button class="btn btn-info" onclick="addToCart('<?php echo $product->get_id(); ?>')">Add To Cart</button>

        </div>
      </div>
    </div>
    <?php endforeach ?>	
	</div>
</div>
<script>
  function addToCart(id) {
    var quantity = $("[name='"+ id +"']").val();
    $.ajax({
      type: "POST",
      url: '../add_product.php',
      data: { id: id, quantity: quantity },
      success: function(data) {
        if (JSON.parse(data).error) {
          $( "#product-list" ).load(window.location.href + " #product-list" );
          showAlert("The quantity is invalid");
        } else {
          $( "#product-list" ).load(window.location.href + " #product-list" );
          showAlert('The product was added to the cart');
        }
        console.log('successfully posted data! response body: ' + data);
      }
    });
  }
</script>