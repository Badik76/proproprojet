<?php
// Start the session
session_start();
require 'views/header.php';
?>
<div id="products" class="container-fluid center">
    <div class="row">
        <h2 class="soft-white">Notre catalogue</h2>
        <div class="row" id="categoryList">
        </div>
        <div class="row" id="productList">
        </div>
    </div>
</div>
<?php
require 'views/footer.php';
?> 