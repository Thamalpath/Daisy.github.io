<style>
    .btns {
        background: #ff6961;
        color: #080808;
        border-radius: 10px;
        font-weight: 500;
        outline: none;
        border: none;
        font-size: 20px;
        padding: 5px 10px;
    }

    .btns:hover {
        color: #fff;
    }

    h4 {
        font-size: 25px;
        color: #080808;
        font-weight: 700;
        transition: all 0.3s ease 0s;
    }

    h4:hover{
        color: #ff6961;
    }

    /* h3 {
        color: gray;
        font-size: 10px;
        font-weight: 600;
    } */
</style>


<?php
include('config/dbcon.php');
//include('functions/userfunction.php');
include('includes/header.php');
?>


<form method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                <div class="headline text-center mb-5">
                    <h2 class="pb-3 position-relative d-inline-block">All PRODUCTS</h2>
                </div>
            </div>
        </div>

        <div class="row">
        <?php
        global $con;
        if (!isset($_GET['category'])) {
            if (!isset($_GET['sub_category'])) {
                $select_query = "SELECT * FROM product order BY rand()";
                $select_query_run = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($select_query_run)) {
                    $product_name = $row['pro_name'];
                    $product_selling_price = $row['pro_selling_price'];
                    $product_image = $row['image'];
                    ?>

                        <div class="col-4">
                            <a href="productview.php?product=<?= $row["pro_slug"]?>" class="text-decoration-none d-block text-center mb-4">
                                <div class="product-list">
                                    <div class="product-image position-relative">
                                        <!-- <img src="./uploads/' . <?= $row['image'] ?> . '"alt="Product Image" class="img-fluid product-image-first" /> -->
                                        <img src="uploads/<?= $row['image']; ?>" alt="Product Image" class="img-fluid product-image-first">
                                        <img src="uploads/<?= $row['image2']; ?>" alt="Product Image" class="img-fluid product-image-secondary">
                                        <h4 class="text-center mt-3"> <?=  $row['pro_name'] ?></h4>
                                        <h3 class="text-center" style="color: gray; font-size: 22px; font-weight: 600;">LKR  <?= $row['pro_selling_price'] ?>.00</h3>
                                        <!-- <button type="button" class="btns add_to_Cart">ADD TO CART</button> -->
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php
                    }
                } else {
                    echo "No Products found";
                }
            } else {
                echo "Products not found";
            }

            ?>
            
        </div>
    </div>
</form>

<?php include('includes/footer.php'); ?>