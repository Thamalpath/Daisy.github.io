<?php 
    include('../functions/myfunctions.php');
    include('includes/header.php');
?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(isset($_GET['sub_cat_id']))
                    {
                        $id = $_GET['sub_cat_id'];
                        $subcategory = getBySubCatId("sub_category", $id);
                        $subcategorydetail = getSubCategoryDetail("sub_category");

                        if(mysqli_num_rows($subcategory) > 0)
                        {
                            $data = mysqli_fetch_array($subcategory);
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Sub Category</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                            <div class="col-md-3">
                                                    <label>Sub Category ID</label>
                                                    <input type="text" name ="sub_cat_id" value="<?= $data['sub_cat_id'] ?>" placeholder="Enter ID" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Name</label>
                                                    <input type="text" name ="sub_cat_name" value="<?= $data['sub_cat_name'] ?>" placeholder="Enter Category Name" class="form-control"> <br>
                                                    <label class="text-color-red">Important: If You are adding Special Character to Sub Category Name, PLEASE ADD "\" BEFORE THE SPECIAL CHARACTER.</label>
                                                    <label class="text-color-red">Exampel: Men\'s Wear</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="text-color-red">* Select Category</label>
                                                    <select name="category_id" class="form-select mb-2">
                                                        <option>Select Category</option>
                                                        <?php
                                                            $category = getAll("category");

                                                            if(mysqli_num_rows($category) > 0)
                                                            {
                                                                foreach($category as $item) {
                                                                    ?>
                                                                        <option value="<?= $item['cat_id']; ?>"> <?= $item['cat_name']; ?></option>
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
                                                <div class="col-md-1">
                                                    <label>Status</label> <br>
                                                    <input class="col-md-1" type="checkbox" name ="sub_cat_status" <?= $data['sub_cat_status'] == '0'? '' : 'checked' ?>/>
                                                </div>
                                                <div class="col-md-12 pt-3">
                                                    <button type="submit" class="btn btn-primary" name="update_sub_category_btn">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }else
                        {
                            echo "<div class='alert alert-danger'role='alert'>Category not found.</div>";
                        }
                    }else
                    {
                        echo "<div class='alert alert-danger'role='alert'>Id missing from url.</div>";
                    }
                    ?>
                
            </div>  
        </div>
    </div>


    <?php include('includes/footer.php'); ?>