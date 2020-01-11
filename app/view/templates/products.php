<div class="row">
    <div class="col text-center">
        <h4 class="display4 mt-5"> Product List<h4>
    </div>
</div>
<div class="row">
    <?php
    foreach ($data['products'] as $product) {
    ?>
        <div class="col">
            <div class="card mt-3" style="width: 200px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo  $product['name'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo  number_format($product['price'], 2) ?></h6>
                    <a href="/cart/add/<?php echo $product['name'] ?>" class="card-link">Add to card</a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
