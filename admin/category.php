<?php 

include('../config/dbcon.php');
include('../functions/myfunctions.php');
include('includes/header.php');
?>

<section id="category">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category</h4>
                    </div>
                    <div class="card-body" id="categorys_table">
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" name="cat_name" placeholder="Enter Category Name" class="form-control" required> <br>
                                    <label class="text-color-red">Important: If You are adding Special Character to Category Name, PLEASE ADD "\" BEFORE THE SPECIAL CHARACTER.</label>
                                    <label class="text-color-red">Exampel: Men\'s Wear</label>
                                </div>
                                <div class="col-md-6">
                                    <label>Status</label> <br>
                                    <input type="checkbox" name="cat_status"> <br>
                                    <label class="text-color-red mt-3">If Avalable Check the CheckBox</label>
                                </div>
                                <div class="col-md-12 pt-3">
                                    <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
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
                        <h4>Categories</h4>
                    </div>
                    <div class="card-body" id="category_table">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>Cat ID</td>
                                    <td>Cat Name</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $category = getAll("category");

                                if (mysqli_num_rows($category) > 0) {
                                    foreach ($category as $item) {
                                ?>
                                        <tr>
                                            <td> <?= $item['cat_id']; ?></td>
                                            <td> <?= $item['cat_name']; ?></td>
                                            <td> <?= $item['cat_status'] == '1' ? "Visible" : "Hidden" ?></td>

                                            <td>
                                                <a href="managecategory.php?cat_id=<?= $item['cat_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <!--<button type="button" class="btn btn-danger delete_category_btn" value="<?= $item['id']; ?>">Delete</button>-->
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