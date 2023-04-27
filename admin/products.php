<?php 
include('../functions/myfunctions.php');
include('includes/header.php'); 
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Products</h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Pro ID</td>
                                <td>Product Name</td>
                                <td>Image</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $products = getAll("product");

                                if(mysqli_num_rows($products) > 0)
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                                            <tr>
                                                <td> <?= $item['pro_id']; ?></td>
                                                <td> <?= $item['pro_name']; ?></td>
                                                <td>
                                                    <img src="../uploads/<?= $item['image']; ?>" width="80px" height="80px" alt="<?= $item['pro_name']; ?>">
                                                </td> 
                                                <td> <?= $item['pro_status'] == '1'? "Visible":"Hidden" ?></td>

                                                <td>
                                                    <a href="edit-product.php?pro_id=<?= $item['pro_id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <!-- <button type="button" class="btn btn-danger delete_product_btn" value="<?= $item['pro_id']; ?>">Delete</button> -->
                                                </td>            
                                            </tr>
                                        <?php
                                    }
                                }
                                else{
                                    echo "<div class='alert alert-danger 'role='alert'>No records found.</div>";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include('includes/footer.php'); ?>
