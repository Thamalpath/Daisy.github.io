<style>
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

<!-- ======================= Product ======================= -->
<section id="products" class="products">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="headline text-center mb-5">
                    <h2 class="pb-3 position-relative d-inline-block">FEATURED PRODUCTS</h2>
                </div>
            </div>
        </div>
        <form action="POST">
        <div class="row">
                <?php
                $sql = "SELECT * FROM product WHERE pro_trending ORDER by rand() LIMIT 6";
                if ($result = mysqli_query($con, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {

                            ?>

                            <div class="col-sm-6 col-lg-4 text-decoration-none d-block text-center mb-4">
                                <a href="productview.php?product=<?= $row["pro_slug"]?>" class="text-decoration-none d-block text-center mb-4">
                                    <div class="product-list">
                                        <div class="product-image position-relative">
                                            <!-- <img src="./uploads/' . <?= $row['image'] ?> . '"alt="Product Image" class="img-fluid product-image-first" /> -->
                                            <img src="uploads/<?= $row['image']; ?>" alt="Product Image" class="img-fluid product-image-first">
                                            <img src="uploads/<?= $row['image2']; ?>" alt="Product Image" class="img-fluid product-image-secondary">
                                            <h4 class="text-center mt-3"> <?=  $row['pro_name'] ?></h4>
                                            <h3 class="text-center">LKR  <?= $row['pro_selling_price'] ?>.00</h3>
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
        </form>
</section>