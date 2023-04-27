<style>
  .bi{
    color: gray;
  }
  .bi:hover{
    color: #ff6961;
  }
  td{
    font-size: 20px;
    font-weight: 500;
  }
</style>

<?php
include('includes/header.php');
include('config/dbcon.php');
?>

<div class="pt-2 mt-2 container">
  <h2 class="font-weight-bold pt-5">Shopping Cart</h2>
  <hr>
</div>

<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
    <table class="table table-bordered table-hover">
      <thead class="tbl text-center">
        <tr style="background: #ff6961; color: #fff;">
          <th scope="col" class="col-sm-1">No</th>
          <th scope="col" class="col-sm-2">Product</th>
          <th scope="col" class="col-sm-3">Name</th>
          <th scope="col" class="col-sm-2">Price</th>
          <th scope="col" class="col-sm-1">QTY</th>
          <th scope="col" class="col-sm-2">Total (LKR)</th>
          <th scope="col" class="col-sm-1">Remove</th>
        </tr>
      </thead>

      <?php
      if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($con, "DELETE FROM `cart` WHERE cart_id = '$remove_id'");
        mysqli_query($con, "ALTER TABLE cart AUTO_INCREMENT = 1");
        header('location:cart.php');
      };
      ?>

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
                <tr>
                  <td class='text-center'><?= $row['cart_id'] ?> </td>
                  <td scope='row' class='text-center'><img src="uploads/<?= $row['image']; ?>" width="50"></td>
                  <td><?= $row['pro_name'] ?></td>
                  <td class='text-center'>LKR <?= $row['pro_selling_price'] ?>.00</td>
                  <td class='text-center'> <?= $row['cart_pro_qty'] ?></td>
                  <td class='text-center'>LKR <?= $row['cart_pro_qty'] * $row['pro_selling_price'] ?>.00</td>
                  <td class='text-center'><a href='cart.php?remove=<?=$row['cart_id']?>&cart_id=<?=$row['cart_pro_id']?>' class='btn btn-sm deleteItems' name='remove'><i class='bi bi-trash-fill'></i></a></td>
                </tr>
              </form>

        <?php
            }
          } else {
            echo "";
          }
        } else {
          echo "Cart is empty";
        }
        ?>

        <tr>
          <!-- <th scope="row"></th> -->
          <td colspan="5" style="font-weight: bold;">TOTAL (LKR)</td>
          <td style="font-weight: bold;"  class="text-center">LKR <?php echo $cartTotal; ?>.00</td>
          <td></td>
        </tr>
        <tr>
          <!-- <th scope="row"></th> -->
          <td colspan="7"><a href='checkout.php' class='btn btn-sm w-100' style="background: #ff6961; color: #fff; font-weight: 500;">
            Proceed To Checkout</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>

<?php include('includes/footer.php'); ?>