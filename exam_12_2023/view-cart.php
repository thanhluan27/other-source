<?php
include "header.php";
?>

<?php
if (isset($_GET['id']) || isset($_SESSION['last_id'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    } else if (isset($_SESSION['last_id'])) {
        $id = $_SESSION['last_id'];
    }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
    if (!isset($_SESSION['id'][$id])) {
        $_SESSION['id'][$id] = $id;
    }
    $_SESSION['id'] = $_GET['id'];
}
$total_price = 0;
$getAll = $product->getAllProducts();


if (isset($_SESSION['cart'])) :

    if ($_SESSION['cart'] == null) :
?>


        <div class="container" style="text-align: center; padding: 100px;">
            <h1>YOUR CART IS EMPTY!</h1>
            <a class="primary-btn cta-btn" href="index.php">Shop now</a>
        </div>
        <?php else : if (isset($_SESSION['cart'])) : ?>


            <table id="cart" class="table table-hover table-condensed" style="padding-top: 100px;">
                <thead>
                    <tr>
                        <th style="width:20%">Image</th>
                        <th style="width:30%">Name</th>
                        <th style="width:20%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <!-- <th style="width:22%" class="text-center">Total</th> -->
                        <th style="width:10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $key => $value) :
                        foreach ($getAll as $p) : if ($p['id'] == $key) : ?>
                                <tr data-id="">
                                    <td><img src="public/img/<?php echo $p['image'] ?>" width="100px" height="100px" class="img-responsive" /></td>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <strong>
                                                    <p><?php echo $p['name'] ?></p>
                                                </strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price"><?php echo number_format($p['price']) ?> VNĐ</td>
                                    <td data-th="Quantity">
                                        <!-- <input type="number" value="" class="form-control quantity cart_update" min="1" /> -->
                                        <!-- <input class="form-control quantity cart_update" type="number" name="quantity" value="" autocomplete="off" size="2"> -->
                                        <a class="cart_quantity_up" href="action/changequality.php?id=<?php echo $key ?>&control=1"> + </a>
                                        <input style="text-align: center; font-weight: bold;" class="cart_quantity_input" type="text" name="quantity" value="<?php echo $_SESSION['cart'][$key] ?>" autocomplete="off" size="3">
                                        <a class="cart_quantity_down" href="action/changequality.php?id=<?php echo $key ?>&control=2"> - </a>
                                    </td>
                                    <!-- <td data-th="Subtotal" class="text-center"><?php echo number_format($p['price']) *  $_SESSION['cart']["quantity"] ?> VNĐ</td> -->
                                    <td class="actions" data-th="">
                                        <button class="btn btn-danger btn-sm cart_remove"><a href="action/delete-each-product.php?id=<?php echo $key ?>" target="_self"><i class="fa fa-trash-o"></i> Delete</a></button>
                                    </td>
                                    <?php $total_price += ($p['price'] * $value); ?>
                                </tr>
                    <?php endif;
                        endforeach;
                    endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">
                            <h3><strong>Total: <?php echo number_format($total_price) ?> VNĐ</strong></h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="action/delete-each-product.php"><button class="btn btn-danger"> Delete All</button></a>
                            <a href="index.php" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            <a href="#"><button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button></a>
                        </td>
                    </tr>
                </tfoot>
            </table>

    <?php endif;
    endif;
else :
    ?>
    <div class="container" style="text-align: center; padding: 100px;">
        <h1>YOUR CART IS EMPTY!</h1>
        <a class="primary-btn cta-btn" href="index.php">Shop now</a>
    </div>
<?php endif; ?>

<?php
include "footer.php";
?>