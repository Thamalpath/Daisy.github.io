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
        font-size: 22px;
        font-weight: 600;
    } */
</style>

<?php
include('includes/header.php');
?>

<form method="POST">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
            </div>
        </div>

    <div class="row">
        <?php
        global $con;
        if (isset($_GET['search_data_product'])) {
            $search_data_value = $_GET['search_data'];
            $search_query = "SELECT * FROM  product WHERE (
                (pro_meta_keywords LIKE '%$search_data_value%'))";
            $search_query_run = mysqli_query($con, $search_query);
            $num_of_rows = 0;
            if ($search_query_run) {
                $num_of_rows = mysqli_num_rows($search_query_run);
            }
    
            if ($num_of_rows == 0) {
                echo "<h2 class='text-center text-danger'> No results match!</h2>";
            }
            if ($search_query_run) {
    
                while ($row = mysqli_fetch_assoc($search_query_run)) {
                    $product_id = $row['pro_id'];
                    $product_cat_id = $row['cat_id'];
                    $product_sub_cat_id = $row['sub_cat_id'];
                    $product_name = $row['pro_name'];
                    $product_slug = $row['pro_slug'];
                    $product_original_price = $row['pro_original_price'];
                    $product_selling_price = $row['pro_selling_price'];
                    $product_qty = $row['pro_qty'];
                    $product_image = $row['image'];
                    $product_description = $row['pro_description'];
                    $product_meta_title = $row['pro_meta_title'];
                    $product_meta_keywords = $row['pro_meta_keywords'];
                    $product_status = $row['pro_status'] ? '1' : '0';
                    //$product_trending = $row['trending'] ? '1' : '0';

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
            }
        }
        ?>
            
        </div>
    </div>
</form>

<?php
include('includes/footer.php');
?>