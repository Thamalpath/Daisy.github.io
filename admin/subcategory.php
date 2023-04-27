<?php 
    include('../functions/myfunctions.php');
    include('../config/dbcon.php');
    include('includes/header.php');
?>

<section id="subcategory">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Sub Category</h4>
                    </div>
                    <div class="card-body" id="categorys_table">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="text-color-red fw-bold">* Select Category</label>
                                    <select name="category_id" class="form-select mb-2">
                                        <option selected>Select Category</option>
                                        <?php
                                            $category = getAll("category");

                                            if(mysqli_num_rows($category) > 0)
                                            {
                                                foreach($category as $item) {
                                                    ?>
                                                        <option value="<?= $item['cat_id']; ?>"><?= $item['cat_name']; ?></option>
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
                                <div class="col-md-4">
                                    <label class="text-color-red fw-bold">* Sub Category Name</label>
                                    <input type="text" name="sub_category_name" placeholder="Enter Sub Category Name" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="fw-bold" style="color: #080808;">Status</label> <br>
                                    <input type="checkbox" name="sub_category_status"> <br>
                                    <label class="text-color-red">If Avalable Check the CheckBox</label>
                                </div>
                                <div class="col-md-12 pt-3">
                                    <button type="submit" class="btn btn-primary" name="add_sub_category_btn">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sub Categories</h4>
                    </div>
                    <div class="card-body" id="category_table">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Sub ID</td>
                                    <td>Sub Category Name</td>
                                    <td>Category Name</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sub_category = getSubCategoryDetail("sub_category");

                                if (mysqli_num_rows($sub_category) > 0) {
                                    foreach ($sub_category as $item) {
                                ?>
                                        <tr>
                                            <td> <?= $item['sub_cat_id']; ?></td>
                                            <td> <?= $item['sub_cat_name']; ?></td>
                                            <td> <?= $item['cat_name']; ?></td>
                                            <td> <?= $item['sub_cat_status'] == '1' ? "Visible" : "Hidden" ?></td>

                                            <td>
                                                <a href="managesubcategory.php?sub_cat_id=<?= $item['sub_cat_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <!--<button type="button" class="btn btn-danger delete_sub_category_btn" value="<?= $item['sub_cat_id']; ?>">Delete</button>-->
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<div class='alert alert-danger'role='alert'>No records found.</div>";
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('includes/footer.php'); ?>