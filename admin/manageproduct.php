<?php
include('../config/dbcon.php');
include('../functions/myfunctions.php');
include('includes/header.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="mb-0">Select Category</label>
                                <select name="category_id" class="form-select mb-2">
                                    <option selected>Select Category</option>
                                    <?php
                                    $categories = getAll("category");

                                    if (mysqli_num_rows($categories) > 0) {
                                        foreach ($categories as $item) {
                                    ?>
                                            <option value="<?= $item['cat_id']; ?>"><?= $item['cat_name']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No Category Available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Select Sub Category</label>
                                <select name="subcategory_id" class="form-select mb-2">
                                    <option selected>Select Sub Category</option>
                                    <?php
                                    $sub_categories = getAll("sub_category");
                                    echo json_encode($sub_categories)."\n";

                                    if (mysqli_num_rows($sub_categories) > 0) {
                                        foreach ($sub_categories as $subitem) {
                                    ?>
                                            <option value="<?= $subitem['sub_cat_id']; ?>"><?= $subitem['sub_cat_name']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No Sub Category Available";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-0">Name</label>
                                <input type="text" name="name" placeholder="Enter Category Name" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-4">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="pro_slug" placeholder="Enter Category Name" class="form-control mb-2" required>
                                <label class="text-color-red">* Enter product name here</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-0">Quantity</label>
                                <input type="number" name="pro_qty" placeholder="Enter Quantity" class="form-control mb-2" required>
                            </div>

                            <div class="col-md-5">
                                <label class="mb-0">Original Price</label>
                                <input type="text" name="pro_original_price" placeholder="Enter Original Price" class="form-control mb-2">
                            </div>
                            <div class="col-md-5">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" name="pro_selling_price" placeholder="Enter Selling Price" class="form-control mb-2" required>
                            </div>

                            <div class="col-md-1">
                                <label class="mb-0">Status</label> <br>
                                <input type="checkbox" name="pro_status">
                            </div>

                            <div class="col-md-1">
                                <label class="mb-0" for="">Trending</label> <br>
                                <input type="checkbox" name="pro_trending">
                            </div>

                            <div class="col-md-6" id="image_box">
                                <label class="mb-0">Upload Image </label>
                                <input type="file" name="image" class="form-control mb-2" required>
                                <label class="text-color-red">* Add 4 Images</label>
                            </div>

                            <div class="col-md-6" id="image_box">
                                <label class="mb-0">Upload Image </label>
                                <input type="file" name="image2" class="form-control mb-2" required>
                            </div>

                            <div class="col-md-6" id="image_box">
                                <label class="mb-0">Upload Image </label>
                                <input type="file" name="image3" class="form-control mb-2" required>
                            </div>

                            <div class="col-md-6" id="image_box">
                                <label class="mb-0">Upload Image </label>
                                <input type="file" name="image4" class="form-control mb-2" required>
                            </div>

                            <!-- <div class="col-md-2 mt-4">
                                <button type="button" class="btn btn-lg btn-primary btn-block" onclick="add_more_images()">
                                    <span>Add Image</span>
                                </button>
                            </div> -->
                            
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" name="pro_small_description" placeholder="Enter Small Description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" name="pro_description" placeholder="Enter Description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" name="pro_meta_title" placeholder="Enter Meta Title" class="form-control mb-2" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" name="pro_meta_description" placeholder="Enter Meta Description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" name="pro_meta_keywords" placeholder="Enter Meta Keywords" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-12 pt-3">
                                <button type="submit" id="btnId" class="btn btn-primary" name="add_product_btn">Save</button>
                                <!-- disabled="disabled" -->
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- <script>
    var btn = document.getElementById('btnId');
    btn.disabled = true;
    var total_image=1;
    function add_more_images() {
        total_image++;
        if(total_image==4) {
            btn.disabled = false;
        }
        else
        {
            btn.disabled = true;
        }
        var html='<div class="col-md-6" id="add_image_box_'+total_image+'"><label class="mb-0">Upload Image </label><input type="file" name="image'+total_image+'" class="form-control mb-2"><button type="button" class="btn btn-lg btn-danger btn-block" onclick=remove_image("'+total_image+'")><span>Remove</span></button></div>';
        jQuery('#image_box').append(html);
    }

    function remove_image(id) {
        jQuery('#add_image_box_'+id).remove();
    }
    
</script> -->


<?php include('includes/footer.php'); ?>