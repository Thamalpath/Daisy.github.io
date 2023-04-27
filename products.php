<?php

//include('functions/userfunction.php');
include('includes/header.php');

if (isset($_GET['category'])) {

    $category_id = $_GET['category'];
    $subcategory = getAllSubCatActive("sub_category", $category_id);
    $products = getProActive("product", $category_id);
    //$filterpro = getFilterProActive("product",$category_id,$subcategory);

    if ($products) {
        $catname = getCatName('category', $category_id);
?>
        <div class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col text-center my-4">
                        <?php
                        if (mysqli_num_rows($catname) > 0) {
                            $catdata = mysqli_fetch_array($catname);

                        ?>
                            <h1 class="fs-2"><?= $catdata['cat_name']; ?></h1>
                            <div class="underline mx-auto mt-3"></div>
                        <?php
                        } else {
                            echo "<div class='alert alert-danger'role='alert'>No Category Founded.</div>";
                        }
                        ?>

                        <div class="row mt-3 mb-4 button-group filter-button-group">
                            <div class="col d-flex justify-content-center">
                                <?php

                                if (mysqli_num_rows($subcategory) > 0) {
                                    foreach ($subcategory as $item) {
                                ?>
                                        <button type="button" data-filter="*" class="btn btn-primary mx-1 text-dark"><?= $item['sub_cat_name']; ?></button>
                                <?php
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'role='alert'>No Sub Category Founded.</div>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <?php
                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="productview.php?product=<?= $item['pro_slug']; ?>" class="text-decoration-none">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                                    <h4 class="text-center"><?= $item['pro_name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<div class='alert alert-danger'role='alert'>No Product Founded.</div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <?php
    } else {
        echo "Something Went Wrong";
    }
    ?>
<?php
} else {
    echo "isset cateegory Something Went Wrong";
}
?>
<!-- <div>
    <div class="row mt-3 mb-4 button-group filter-button-group">
        <div class="col d-flex justify-content-center">
            <button type="button" data-filter="*" class="btn btn-primary mx-1 text-dark">All</button>
            <button type="button" data-filter=".mens" class="btn btn-primary mx-1 text-dark">Men's Wear</button>
            <button type="button" data-filter=".womens" class="btn btn-primary mx-1 text-dark">Women's Wear</button>
            <button type="button" data-filter=".kids" class="btn btn-primary mx-1 text-dark">Kid's Wear</button>
            <button type="button" data-filter=".foot" class="btn btn-primary mx-1 text-dark">Foot Wear</button>
        </div>
    </div>

    <div class="row justify-content-center g-4" id="product-list">
        <div class="col-lg-4 col-md-6 mens">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_1.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-lg-4" id="product-list">
            <a href="#" class="d-block text-center mb-4">
                <div class="product-list">
                    <div class="product-image position-relative">
                        <img src="#" alt="products" class="img-fluid product-image-first">
                        <img src="#" alt="products" class="img-fluid product-image-secondary">
                    </div>
                    <div class="product-name pt-3">
                        <h3 class="text-capitalize">women totes lady handbag</h3>
                        <p class="mb-0 amount">$300.00</p>
                        <button type="button" class="add_to_Cart">ADD TO CART</button>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-6 womens">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_2.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 kids">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_3.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 foot">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_4.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 electronic">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_5.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 furniture">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_6.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 electronic">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_7.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 clothing">
            <div class="product-item">
                <div class="product-img">
                    <img src="images/product_img_8.jpg" class="img-fluid d-block mx-auto">
                </div>
                <div class="product-content text-center py-3">
                    <span class="d-block text-uppercase fw-bold">product name</span>
                    <span class="d-block">$ 68.00</span>
                </div>
            </div>
        </div>
    </div>

</div> -->