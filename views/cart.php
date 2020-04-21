<div class="container" id="table">
    <?php
      include __DIR__ . '/table.php';
    ?>
  <button class="btn btn-info" onclick="buy()">Submit</button>
</div>
<script>
  function remove(id) {
    $.ajax({
      type: "POST",
      url: '../remove_item.php',
      data: { id: id },
      success: function(data) {
        $( "#table" ).load(window.location.href + " #table" );
        console.log('successfully posted data! response body: ' + data);
      }
    });
  }

  function decrease(id) {
    $.ajax({
      type: "POST",
      url: '../decrease_quantity.php',
      data: { id: id },
      success: function(data) {
        $( "#table" ).load(window.location.href + " #table" );
        console.log('successfully posted data! response body: ' + data);
      }
    });
  }

  function increase(id) {
    $.ajax({
      type: "POST",
      url: '../increase_quantity.php',
      data: { id: id },
      success: function(data) {
        $( "#table" ).load(window.location.href + " #table" );
        console.log('successfully posted data! response body: ' + data);
      }
    });
  }

  function buy() {
    $.ajax({
      type: "POST",
      url: '../buy.php',
      success: function(data) {
        window.location.href = '/success';
        console.log('successfully posted data! response body: ' + data);
      }
    });
  }
</script>