<?php 
    include('../functions/myfunctions.php');
    include('includes/header.php');
?>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(isset($_GET['cat_id']))
                    {
                        $id = $_GET['cat_id'];
                        $category = getByCatId("category", $id);

                        if(mysqli_num_rows($category) > 0)
                        {
                            $data = mysqli_fetch_array($category);
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Edit Category</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                            <div class="col-md-4">
                                                    <label>ID</label>
                                                    <input type="text" name ="cat_id" value="<?= $data['cat_id'] ?>" placeholder="Enter ID" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Name</label>
                                                    <input type="text" name ="cat_name" value="<?= $data['cat_name'] ?>" placeholder="Enter Category Name" class="form-control">
                                                    <label class="text-color-red">Important: If You are adding Special Character to Category Name, PLEASE ADD "\" BEFORE THE SPECIAL CHARACTER.</label>
                                                    <label class="text-color-red">Exampel: Men\'s Wear</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Status</label> <br>
                                                    <input class="col-md-1" type="checkbox" name ="cat_status" <?= $data['cat_status'] == '0'? '' : 'checked' ?>/>
                                                </div>
                                                <div class="col-md-12 pt-3">
                                                    <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
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