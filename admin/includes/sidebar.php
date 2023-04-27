<?php 
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="home.php" target="_blank">
                <span class="ms-1 font-weight-bold text-white" style="font-size: 30px;">Daisy Admin</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "home.php"? 'active bg-gradient-primary':'' ?>" href="home.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-list"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "category.php"? 'active bg-gradient-primary':'' ?>" href="category.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-dash-circle"></i>
                        </div>
                        <span class="nav-link-text ms-1">Manage Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "subcategory.php"? 'active bg-gradient-primary':'' ?>" href="subcategory.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-dash"></i>
                        </div>
                        <span class="nav-link-text ms-1">Manage Sub Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "manageproduct.php"? 'active bg-gradient-primary':'' ?>" href="manageproduct.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-app"></i>
                        </div>
                        <span class="nav-link-text ms-1">Manage Product</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?= $page == "products.php"? 'active bg-gradient-primary':'' ?>" href="products.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-app-indicator"></i>
                        </div>
                        <span class="nav-link-text ms-1">Product</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-primary mt-4 w-100" href="logout.php" type="button">Log Out</a>
            </div>
        </div>
    </aside>