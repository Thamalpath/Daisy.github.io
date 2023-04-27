<style>
    td{
        font-weight: 500;
    }
</style>

<?php
include('includes/header.php');
include('config/dbcon.php');
?>

<div class="pt-1 mt-1 container">
    <h2 class="font-weight-bold pt-5">Checkout</h2>
    <hr>
</div>

<div class="py-3">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row"> 
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold mb-2">Name</label>
                                    <input type="text" name="name" placeholder="Enter your full name" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold mb-2">E-mail</label>
                                    <input type="text" name="email" placeholder="Enter your email" class="form-control" required>
                                </div>
                                    <label class="fw-bold mb-2">Phone</label>
                                    <input type="text" name="phone" placeholder="Enter your phone number" class="form-control" required>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label class="fw-bold mb-2">Pin Code</label>
                                    <input type="text" name="pincode" placeholder="Enter your pin code" class="form-control" required>
                                </div> -->
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold mb-2">Address</label>
                                    <textarea name="address" class="form-control" rows="5" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <table class="table table-bordered table-hover">
                                <thead class="tbl text-center">
                                    <tr style="background: #ff6961; color: #fff;">
                                        <th scope="col" class="col-sm-2">Product</th>
                                        <th scope="col" class="col-sm-3">Name</th>
                                        <th scope="col" class="col-sm-2">Price</th>
                                        <th scope="col" class="col-sm-1">QTY</th>
                                        <th scope="col" class="col-sm-2">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $user_id = $_SESSION ? $_SESSION['userid'] : 0;
                                    $cartTotal = 0;
                                    $products = array();
                                    $sql = "SELECT * FROM cart LEFT JOIN product ON cart.cart_pro_id=product.pro_id WHERE cart_user_id=$user_id";
                                    if ($result = mysqli_query($con, $sql)) {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $cartTotal += $row['cart_pro_qty'] * $row['pro_selling_price'];
                                    ?>
                                                <form method=POST>
                                                    <tr style="font-size: 17px;">
                                                        <td scope='row' class='text-center'><img src="uploads/<?= $row['image']; ?>" width="50"></td>
                                                        <td><?= $row['pro_name'] ?></td>
                                                        <td class='text-center'>LKR <?= $row['pro_selling_price'] ?>.00</td>
                                                        <td class='text-center'> <?= $row['cart_pro_qty'] ?></td>
                                                        <td class='text-center'>LKR <?= $row['cart_pro_qty'] * $row['pro_selling_price'] ?>.00</td>
                                                    </tr>
                                                </form>
                                    <?php
                                            }
                                        } else {
                                        }
                                    } else {
                                    }
                                    ?>

                                    <tr style="font-size: 17px;">
                                        <td colspan="4" style="font-weight: bold;">TOTAL (LKR)</td>
                                        <td style="font-weight: bold;"  class="text-center">LKR <?php echo $cartTotal; ?>.00</td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <td colspan="5"><button type="submit" name="placeOrderBtn" class='btn btn-sm w-100' style="background: #ff6961; color: #fff; font-weight: 500;"><a href="payment.php"> Confirm and Place order</a></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>