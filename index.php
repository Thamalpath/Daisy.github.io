<?php
include('config/dbcon.php');
//include('functions/userfunction.php');
include('includes/header.php');

// search_product();

?>

<!-- ======================= Slider ======================= -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="resources/Banner/banner-1.jpg" class="d-block w-100 container-fluid" alt="">
            <div class="carousel-caption text-left d-none d-md-flex">
                <p class="banner-subtitle">Welcome to </p>
                <h2 class="banner-title">Daisy's Wardrobe</h2>
                <p class="banner-text">Your one - stop fashion and lifestyle shopping experience</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="resources/Banner/banner-2.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-flex">
                <p class="banner-subtitle">Trending item</p>
                <h2 class="banner-title">Women's latest fashion sale</h2>
            </div>
        </div>
        <div class="carousel-item">
            <img src="resources/Banner/banner-3.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-flex">
                <p class="banner-subtitle">Sale offer</p>
                <h2 class="banner-title">New Fashion summer sale</h2>
                </p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<!-- ======================= Services ======================= -->
<section class="service">
    <div class="service-container">
        <ul class="service-list">
            <li class="service-item">
                <div class="service-item-icon">
                    <img src="resources/Services/service-icon-1.svg" alt="Service icon">
                </div>
                <div class="service-content">
                    <p style="margin-bottom: 0px;">Iland-wide <br> Delivery</p>
                </div>
            </li>

            <li class="service-item">
                <div class="service-item-icon">
                    <img src="resources/Services/service-icon-2.svg" alt="Service icon">
                </div>
                <div class="service-content">
                    <p style="margin-bottom: 0px;">Fast returns <br> 30 Day returns <br> policy</p>
                </div>
            </li>

            <li class="service-item">
                <div class="service-item-icon">
                    <img src="resources/Services/service-icon-3.svg" alt="Service icon">
                </div>
                <div class="service-content">
                    <p style="margin-bottom: 0px;">Secure Payment<br> 100% Secure gaurantee</p>
                </div>
            </li>

            <li class="service-item">
                <div class="service-item-icon">
                    <img src="resources/Services/service-icon-4.svg" alt="Service icon">
                </div>
                <div class="service-content">
                    <p style="margin-bottom: 0px;">Special Support <br> Anytime</p>
                </div>
            </li>
        </ul>
    </div>
</section>


<!-- ======================= Main Categories ======================= -->
<div class="category">
    <div class="container">
        <div class="row">
            <!-- Men Category -->
            <div class="col-sm-6 col-lg-3 mb-lg-0 mb-4">
                <a href="menswear.php?category=1">
                    <div class="category-box text-center position-relative">
                        <div class="category-inner">
                            <div class="category-image position-relative overflow-hidden" style="border-radius: 10px;">
                                <img src="resources/Category/Men4.jpg" alt="Offers" class="img-fluid">
                                <div class="category-overlay"></div>
                            </div>
                            <div class="category-info">
                                <div class="category-info-inner">
                                    <p class="heading-bigger text-capitalize">Men's <br> Wear</p>
                                    <button type="button" class="btn btn-sm btn-outline-danger text-uppercase mt-4">Shop Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Women Category -->
            <div class="col-sm-6 col-lg-3 mb-lg-0 mb-4">
                <a href="womenswear.php?category=2">
                    <div class="category-box text-center position-relative">
                        <div class="category-inner">
                            <div class="category-image position-relative overflow-hidden" style="border-radius: 10px;">
                                <img src="resources/Category/Women2.jpg" alt="Offers" class="img-fluid">
                                <div class="category-overlay"></div>
                            </div>
                            <div class="category-info">
                                <div class="category-info-inner">
                                    <p class="heading-bigger text-capitalize">Women's Wear</p>
                                    <button type="button" class="btn btn-sm btn-outline-danger text-uppercase mt-4">Shop Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Kids Category -->
            <div class="col-sm-6 col-lg-3 mb-lg-0 mb-4">
                <a href="kidswear.php?category=3">
                    <div class="category-box text-center position-relative">
                        <div class="category-inner">
                            <div class="category-image position-relative overflow-hidden" style="border-radius: 10px;">
                                <img src="resources/Category/Kid1.jpg" alt="Offers" class="img-fluid">
                                <div class="category-overlay"></div>
                            </div>
                            <div class="category-info">
                                <div class="category-info-inner">
                                    <p class="heading-bigger text-capitalize">Kid's <br> Wear</p>
                                    <button type="button" class="btn btn-sm btn-outline-danger text-uppercase mt-4">Shop Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Foot Category -->
            <div class="col-sm-6 col-lg-3 mb-lg-0 mb-4">
                <a href="footwear.php?category=4">
                    <div class="category-box text-center position-relative">
                        <div class="category-inner">
                            <div class="category-image position-relative overflow-hidden" style="border-radius: 10px;">
                                <img src="resources/Category/Foot2.jpg" alt="Offers" class="img-fluid">
                                <div class="category-overlay"></div>
                            </div>
                            <div class="category-info">
                                <div class="category-info-inner">
                                    <p class="heading-bigger text-capitalize">Foot <br> Wear</p>
                                    <button type="button" class="btn btn-sm btn-outline-danger text-uppercase mt-4">Shop Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- ======================= Product ======================= -->

<?php
include "productfeatured.php";
?>


<!-- ======================= Product Offer ======================= -->

<div class="banner-container">

    <div class="banner">
        <div class="shoe">
            <img src="resources/Product/shoe.png" alt="">
        </div>
        <div class="content">
            <span>upto</span>
            <h3>20% 0ff</h3>
            <p>offer ends after 5 days</p>
            <a href="productview.php?product_id=21" class="btn">veiw offer</a>
        </div>
        <div class="women">
            <img src="resources/Product/women.png" alt="">
        </div>
    </div>

</div>


<!-- ======================= Our Brands ======================= -->
<section class="brands">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="headline text-center">
                    <h2 class="pb-3 position-relative d-inline-block">OUR BRANDS</h2>
                </div>
            </div>
        </div>
        <div class="brand-container">
            <ul class="brand-list">
                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/1.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/2.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/3.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/4.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/5.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/10.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/7.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/8.png" alt="Brand icon">
                    </div>
                </li>

                <li class="brand-item">
                    <div class="brand-item-icon">
                        <img src="resources/Brands/9.png" alt="Brand icon">
                    </div>
                </li>
            </ul>
        </div>
</section>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissable fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>