<?php
include('config/dbcon.php');
//include('functions/userfunction.php');
include('includes/header.php');
?>

<style>
    .btn {
        background: #ff6961;
        color: #080808;
        border-radius: 10px;
        font-weight: 500;
    }

    .btn:hover {
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

    h3 {
        color: gray;
        font-size: 22px;
        font-weight: 600;
    }
</style>

<div class="py-3">
    <div class="container">
        <div class="row">

        <div class="row">
        <div class="col-sm-12 mt-3">
            <div class="headline text-center mb-3">
                <h2 class="pb-3 position-relative d-inline-block">WOMEN'S WEAR</h2>
            </div>
        </div>
        </div>


            <!-- Sub category List -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Men's Wear
                                <button type="submit" class="btn btn-sm float-end">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                            <h6>Categories</h6>
                            <hr>
                            <?php
                            $subcategory_query = "SELECT * FROM sub_category WHERE cat_id = '2' AND sub_cat_status='1' ";
                            $subcategory_query_run = mysqli_query($con, $subcategory_query);

                            if (mysqli_num_rows($subcategory_query_run) > 0) {
                                foreach ($subcategory_query_run as $subcategory) {
                                    $checked = [];
                                    if (isset($_GET['subcategory'])) {
                                        $checked = $_GET['subcategory'];
                                    }

                            ?>
                                    <div>
                                        <input type="checkbox" name="subcategory[]" value="<?= $subcategory['sub_cat_id']; ?>" <?php if (in_array($subcategory['sub_cat_id'], $checked)) {echo "checked";} ?> />
                                        <?= $subcategory['sub_cat_name']; ?>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No sub category found";
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Products -->
            <div class="col-md-9">
                <!-- <div class="card"> -->
                <div class="card-body row">
                    <?php
                    if (isset($_GET['subcategory'])) {
                        $subcategorychecked = [];
                        $subcategorychecked = $_GET['subcategory'];
                        foreach ($subcategorychecked as $rowsubcat) {
                            //echo $rowsubcat;
                            $product = "SELECT * FROM product WHERE sub_cat_id IN ($rowsubcat)";
                            $product_run = mysqli_query($con, $product);
                            if (mysqli_num_rows($product_run) > 0) {
                                foreach ($product_run as $proditems) :
                    ?>
                                <div class="col-sm-6 col-lg-4">
                                    <a href="productview.php?product=<?= $proditems['pro_slug']; ?>" class="text-decoration-none d-block text-center mb-4">
                                        <div class="product-list">
                                            <div class="product-image1 position-relative">
                                                <img src="uploads/<?= $proditems['image']; ?>" alt="Product Image" class="img-fluid product-image-first">
                                                <img src="uploads/<?= $proditems['image2']; ?>" alt="Product Image" class="img-fluid product-image-secondary">
                                                <h4 class="text-center mt-3"><?= $proditems['pro_name']; ?></h4>
                                                <h3 class="text-center">LKR <?= $proditems['pro_selling_price']; ?>.00</h3>
                                                <!-- <button type="button" class="btn add_to_Cart">ADD TO CART</button> -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php
                                endforeach;
                            } else {
                                echo "No Sub Categories Found";
                            }
                        }
                    } else {

                        $product = "SELECT * FROM product WHERE cat_id = '2' ";
                        $product_run = mysqli_query($con, $product);
                        if (mysqli_num_rows($product_run) > 0) {
                            foreach ($product_run as $proditems) :
                                ?>
                                <div class="col-sm-6 col-lg-4">
                                    <a href="productview.php?product=<?= $proditems['pro_slug']; ?>" class="text-decoration-none d-block text-center mb-4">
                                        <div class="product-list">
                                            <div class="product-image1 position-relative">
                                                <img src="uploads/<?= $proditems['image']; ?>" alt="Product Image" class="img-fluid product-image-first">
                                                <img src="uploads/<?= $proditems['image2']; ?>" alt="Product Image" class="img-fluid product-image-secondary">
                                                <h4 class="text-center mt-3"><?= $proditems['pro_name']; ?></h4>
                                                <h3 class="text-center">LKR <?= $proditems['pro_selling_price']; ?>.00</h3>
                                                <!-- <button type="button" class="btn AddToCartBtn">ADD TO CART</button> -->
                                            </div>
                                        </div>
                                    </a>
                                </div>
                    <?php
                            endforeach;
                        } else {
                            echo "No Sub Categories Found";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('includes/footer.php'); ?>