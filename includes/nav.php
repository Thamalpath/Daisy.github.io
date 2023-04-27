<?php
if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  mysqli_query($con, "DELETE FROM `cart` WHERE cart_id = '$remove_id'");
  mysqli_query($con, "ALTER TABLE cart AUTO_INCREMENT = 1");
  header('location:cart.php');
};
?>

<!-- ======================= Header ======================= -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="w-100 ">
            <div class="px-3 d-flex w-100 justify-content-between align-items-center">
                <a class="navbar-brand d-block d-md-none" href="index.php">
                    <img src="resources/Icons/1.1.png" class="img-fluid" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse  " id="navbarSupportedContent">
                <ul class="navbar-nav px-3 px-md-0  mb-2 mb-lg-0">
                    <li class="nav-item d-none d-md-block">
                        <a class="navbar-brand ps-3" href="index.php">
                            <img src="resources/Icons/1.1.png" class="img-fluid" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">

                            <div>
                                <a href="menswear.php?category=1" class="text-decoration-none">
                                    <li class="dropdown-item">Men's wear</li>
                                </a>
                                <a href="womenswear.php?category=2" class="text-decoration-none">
                                    <li class="dropdown-item">Women's Wear</li>
                                </a>
                                <a href="kidswear.php?category=3" class="text-decoration-none">
                                    <li class="dropdown-item">Kid's Wear</li>
                                </a>
                                <a href="footwear.php?category=4" class="text-decoration-none">
                                    <li class="dropdown-item">Foot Wear</li>
                                </a>
                            </div>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store.php">Store</a>
                    </li>
                </ul>


                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 action-menu">
                    <form class="search-form" action="searchproduct.php" method="get">
                        <input type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" name="search_data_product">
                    </form>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <i class="bi bi-cart position-relative" id="cart-icon">
                                <!-- <span style="font-size: 12px;" class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-count">0</span> -->
                            </i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu border-0 shadow-lg" aria-labelledby="navbarDropdown2">
                            <?php
                            if ($isUserLogged) {
                                echo " <li><a class='dropdown-item' href='./logout.php'>Logout</a></li>";
                            } else {
                                echo "<li><a class='dropdown-item' href='./signin.php'>Sign In</a></li>";
                                echo "<li><a class='dropdown-item' href='./signup.php'>Sign Up</a></li>";
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>