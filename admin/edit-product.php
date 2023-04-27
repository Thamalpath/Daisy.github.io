<?php

use Mpdf\Tag\I;

include('../functions/myfunctions.php');
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <?php
                if(isset($_GET['pro_id']))
                {
                    $id = $_GET['pro_id'];
                    $product = getByProId("product", $id);

                    if(mysqli_num_rows($product) > 0)
                    {
                        $data = mysqli_fetch_array($product);
                        // echo json_encode($data)."\n";
                        ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Edit Product
                                        <a href="products.php" class="btn btn-primary float-end">Back</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="code.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="mb-0">Select Category</label>
                                                <select name="category_id" class="form-select mb-2">
                                                    <option selected>Select Category</option>
                                                    <?php
                                                        $categories = getAll("category");

                                                        if(mysqli_num_rows($categories) > 0)
                                                        {
                                                            foreach($categories as $item) {
                                                                ?>
                                                                    <option value="<?= $item['cat_id']; ?>" <?= $data['cat_id'] == $item['cat_id']?'selected':'' ?> ><?= $item['cat_name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "No Category Available";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="mb-0">Select Sub Category</label>
                                                <select name="subcategory_id" class="form-select mb-2">
                                                    <option selected>Select Sub Category</option>
                                                    <?php
                                                        $sub_categories = getAll("sub_category");

                                                        if(mysqli_num_rows($sub_categories) > 0)
                                                        {
                                                            foreach($sub_categories as $item) {
                                                                echo $item['sub_cat_id'];
                                                                ?>
                                                                    <option value="<?= $item['sub_cat_id']; ?>" <?= $data['sub_cat_id'] == $item['sub_cat_id']?'selected':'' ?> ><?= $item['sub_cat_name']; ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            echo "No Sub Category Available";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?= $data['pro_id']; ?>">
                                            <div class="col-md-4">
                                                <label class="mb-0">Name</label>
                                                <input type="text" name="name" value="<?= $data['pro_name']; ?>" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="mb-0">Slug</label>
                                                <input type="text" name="slug" value="<?= $data['pro_slug']; ?>" class="form-control mb-2">
                                                <label class="text-color-red">* Enter product name here</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="mb-0">Original Price</label>
                                                <input type="text" name="original_price" value="<?= $data['pro_original_price']; ?>" class="form-control mb-2">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="mb-0">Selling Price</label>
                                                <input type="text" name="selling_price" value="<?= $data['pro_selling_price']; ?>" class="form-control mb-2">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="mb-0">Upload Image</label>
                                                    <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                                    <input type="file" name="image" class="form-control mb-2">
                                                    <label class="mb-0">Current Image</label>
                                                    <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="50px" width="50px">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Upload Image</label>
                                                    <input type="hidden" name="old_image2" value="<?= $data['image2']; ?>">
                                                    <input type="file" name="image2" class="form-control mb-2">
                                                    <label class="mb-0">Current Image</label>
                                                    <img src="../uploads/<?= $data['image2']; ?>" alt="Product Image" height="50px" width="50px">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Upload Image</label>
                                                    <input type="hidden" name="old_image3" value="<?= $data['image3']; ?>">
                                                    <input type="file" name="image3" class="form-control mb-2">
                                                    <label class="mb-0">Current Image</label>
                                                    <img src="../uploads/<?= $data['image3']; ?>" alt="Product Image" height="50px" width="50px">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Upload Image</label>
                                                    <input type="hidden" name="old_image4" value="<?= $data['image4']; ?>">
                                                    <input type="file" name="image4" class="form-control mb-2">
                                                    <label class="mb-0">Current Image</label>
                                                    <img src="../uploads/<?= $data['image4']; ?>" alt="Product Image" height="50px" width="50px">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-0">Upload Image</label>
                                                    <input type="hidden" name="old_image5" value="<?= $data['image5']; ?>">
                                                    <input type="file" name="image5" class="form-control mb-2">
                                                    <label class="mb-0">Current Image</label>
                                                    <img src="../uploads/<?= $data['image5']; ?>" alt="Product Image" height="50px" width="50px">
                                                </div> -->
                                                <div class="col-md-3">
                                                    <label class="mb-0">Quantity</label>
                                                    <input type="number" name="qty" value="<?= $data['pro_qty']; ?>" class="form-control mb-2" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="mb-0">Status</label> <br>
                                                    <input type="checkbox" name="pro_status" <?= $data['pro_status'] == '0'? '' : 'checked' ?>>
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="mb-0" for="">Trending</label>
                                                    <input type="checkbox" name="trending" <?= $data['pro_trending'] == '0'? '' : 'checked' ?>>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Small Description</label>
                                                <textarea rows="3" name="small_description" value="<?= $data['pro_small_description']; ?>" class="form-control mb-2"><?= $data['pro_small_description']; ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Description</label>
                                                <textarea rows="3" name="pro_description" value="<?= $data['pro_description']; ?>" class="form-control mb-2" required><?= $data['pro_description']; ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Title</label>
                                                <input type="text" name="meta_title" value="<?= $data['pro_meta_title']; ?>" class="form-control mb-2" required> 
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Description</label>
                                                <textarea rows="3" name="meta_description" class="form-control mb-2"><?= $data['pro_meta_description']; ?></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="mb-0">Meta Keywords</label>
                                                <textarea rows="3" name="meta_keywords" class="form-control mb-2" required><?= $data['pro_meta_keywords']; ?></textarea>
                                            </div>
                                            <div class="col-md-12 pt-3">
                                                <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    else
                    {
                        echo "Product Not Found For Given ID";  
                    }
                } 
                else
                {
                    echo "ID Missing From URL";
                }
            ?>
        </div>  
    </div>
</div>


<?php include('includes/footer.php'); ?>