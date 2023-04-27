<style>
    .small-img-group {
        display: flex;
        justify-content: space-between;
    }
    .small-img-col {
        flex-basis: 24%;
        cursor: pointer;
    }
    .stp{
        font-size: 18px;
    }
</style>


<?php
//include('functions/userfunction.php');
include('includes/header.php');
$msg = "";

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive('product', $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {
?>
        <div class="bg-light py-4">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img class="img-fluid w-100" src="uploads/<?= $product['image']; ?>" id="MainImg" alt="Product Image" style="max-height: 600px;">
                        </div>
                        <div class="small-img-group mt-1">
                            <div class="small-img-col">
                                <img class="small-img img-fluid" src="uploads/<?= $product['image']; ?>" alt="Product Image">
                            </div>
                            <div class="small-img-col">
                                <img class="small-img img-fluid" src="uploads/<?= $product['image2']; ?>" alt="Product Image">
                            </div>
                            <div class="small-img-col">
                                <img class="small-img img-fluid" src="uploads/<?= $product['image3']; ?>" alt="Product Image">
                            </div>
                            <div class="small-img-col">
                                <img class="small-img img-fluid" src="uploads/<?= $product['image4']; ?>" alt="Product Image">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8 mt-4 ps-5">
                        <h4 class="fw-bold" style="font-size: 30px;"><?= $product['pro_name']; ?>
                            <span class="text-danger ms-5 mt-5 ps-2"><?php if ($product['pro_trending']) {echo "Trending";} ?></span>
                        </h4>
                        <div class="row">
                            <div class="col-md-3 mt-2">
                                <h4> LKR <span class="text-success fw-bold"> <?= $product['pro_selling_price']; ?>.00</span></h4>
                            </div>
                            <div class="col-md-5 mt-2">
                                <h4> LKR <s class="text-danger"> <?= $product['pro_original_price']; ?>.00</s></h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mt-2">
                                <div class="input-group mb-3" style="width: 140px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="qty_input" class="form-control text-center bg-white input-qty" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>

                            <!-- <div>
                                <p class="stp">(<?php echo $product['pro_qty']; ?> Available) </p>
                            </div> -->

                            <div class="row mt-3">
                                <button class="buy-btn AddToCartBtn" value="<?= $product['pro_id']; ?>">Add To Cart</button>
                            </div>
                        </div>

                        <hr>
                        <h4 style="font-size: 25px;">Product Details</h4>
                        <p><?= $product['pro_description']; ?></p>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Product Not Found";
    }
} else {
    echo "Something Went Wrong";
}
?>

<style>
    h4 {
        font-size: 24px;
        color: #080808;
    }

    h3 {
        color: gray;
        font-size: 21px;
    }

    .h4 {
        font-size: 25px;
        color: #080808;
        font-weight: 700;
        transition: all 0.3s ease 0s;
    }

    .h4:hover{
        color: #ff6961;
    }

    .h3 {
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
                $sql = "SELECT * FROM product WHERE pro_trending ORDER by rand() LIMIT 3";
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
                                            <h4 class="text-center mt-3 h4"> <?=  $row['pro_name'] ?></h4>
                                            <h3 class="text-center h3">LKR  <?= $row['pro_selling_price'] ?>.00</h3>
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

<script>
    var MainImg = document.getElementById('MainImg');
    var smallimg = document.getElementsByClassName('small-img');

    smallimg[0].onclick = function() {
        MainImg.src = smallimg[0].src
    }
    smallimg[1].onclick = function() {
        MainImg.src = smallimg[1].src
    }
    smallimg[2].onclick = function() {
        MainImg.src = smallimg[2].src
    }
    smallimg[3].onclick = function() {
        MainImg.src = smallimg[3].src
    }
</script>

<?php
//include('functions/userfunction.php');
include('includes/footer.php');
?>