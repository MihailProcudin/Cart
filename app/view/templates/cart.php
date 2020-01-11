<div class="row">
    <div class="col mt-5 text-right"> </div>
</div>

<div class="row">
    <div class="col text-center">
        <h4 class="display4"> Cart<h4>
    </div>
</div>
<div class="row">
    <div class="col">

        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col" width='40%'>Prod. Name</th>
                    <th scope="col" width='30%'>Price</th>
                    <th scope="col" width='15%'>Quantity</th>
                    <th scope="col" width='15%'>Total</th>
                    <th scope="col" width='15%'></th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['cart'] as $product) {
                ?>
                    <tr>
                        <td style=" vertical-align: middle;"><?php echo $product['name'] ?></td>
                        <td style=" vertical-align: middle;"><?php echo  number_format($product['price'], 2) ?></td>
                        <td style=" vertical-align: middle;">
                            <div style="display:flex; flex-direction: row;align-items: center;">
                                <?php echo $product['quantity'] ?>
                                <div class="mx-2" style="display:flex; flex-direction:column;">
                                    <a href="cart/addQuantity/<?php echo $product['name'] ?>" style="padding:0; margin: 0; line-height: 15px;" class=" btn-success px-1" type="button">+</a>
                                    <a href="cart/removeQuantity/<?php echo $product['name'] ?>" style="padding:0; margin: 0; line-height: 15px;" class="btn-danger px-1" type="button">-</a>
                                </div>
                            </div>
                        </td>
                        <td style="vertical-align: middle;">
                        <?php echo number_format($product['quantity'] * $product['price'], 2); ?>

                        </td>
                        <td style=" vertical-align: middle;">
                            <a class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal" data-name="<?php echo $product['name'] ?>" href="cart/remove/<?php echo $product['name'] ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <caption class="text-right">total: <?php echo  number_format($data['total'], 2)?></caption>

        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    This will delete all selected products from the cart. <br />
                    Are you sure?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> No Thanks </button>
                    <a href="#" id="confirm" class="btn btn-primary"> Yes please <a>
                </div>
            </div>
        </div>
    </div>






</div>
