<?php

include('../config/dbcon.php');
include('../functions/myfunctions.php');


// Add Category
if(isset($_POST['add_category_btn']))
{

    $cat_name = $_POST['cat_name'];
    $cat_status = isset($_POST['cat_status']) ? '1':'0';

    
    $cate_query = "INSERT INTO category (cat_name,cat_status) VALUE ('$cat_name','$cat_status')";
    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        redirect("category.php", "Category Added Successfully");
    }else{
        redirect("category.php", "Something Went Wrong");
    }

}

// Update Category
else if(isset($_POST['update_category_btn']))
{
    $cat_id = $_POST['cat_id'];
    $cat_name = $_POST['cat_name'];
    $cat_status = isset($_POST['cat_status']) ? '1':'0';

    $update_query = "UPDATE category SET cat_name='$cat_name', cat_status='$cat_status' WHERE cat_id='$cat_id' ";

    $update_query_run = mysqli_query($con, $update_query);
    
    if($update_query_run)
    {
        redirect("category.php", "Category Updated Successfully");
    }
    else
    {
        redirect("category.php", "Something Went Wrong");
    }

}

// Delete Category
// else if(isset($_POST['delete_category_btn']))
// { 
//     $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

//     $category_query = "SELECT * FROM categories WHERE id='$category_id' ";
//     $category_query_run = mysqli_query($con, $category_query);
//     $category_data = mysqli_fetch_array($category_query_run);
//     $image = $category_data['image'];

//     $delete_query = "DELETE FROM categories WHERE id='$category_id' ";
//     $delete_query_run = mysqli_query($con, $delete_query);

//     if($delete_query_run)
//     {
//         if(file_exists("../uploads/".$old_image))
//         {
//             unlink("../uploads/".$old_image);
//         }
//         //redirect("category.php", "Category deleted Successfully");
//         echo 200;
//     }
//     else{
//         //redirect("category.php", "Something went wrong");
//         echo 500;
//     }
// }


//Add Sub Category
else if(isset($_POST['add_sub_category_btn'])){

    $category_id = $_POST['category_id'];
    $sub_cat_name = $_POST['sub_category_name'];
    $sub_cat_status = isset($_POST['sub_category_status']) ? '1':'0';

    $sub_category_query = "INSERT INTO sub_category (cat_id,sub_cat_name,sub_cat_status) VALUE ($category_id,'$sub_cat_name','$sub_cat_status')";
    $sub_category_query_run = mysqli_query($con, $sub_category_query);

    if($sub_category_query_run)
    {
        redirect("subcategory.php", "Subcategory Added Successfully");
    }else{
        redirect("subcategory.php", "Something Went Wrong");
    }

}

//Update Sub Category
else if(isset($_POST['update_sub_category_btn']))
{
    $sub_cat_id = $_POST['sub_cat_id'];
    $cat_id = $_POST['category_id'];
    $sub_cat_name = $_POST['sub_cat_name'];
    $sub_cat_status = isset($_POST['sub_cat_status']) ? '1':'0';

    $update_query = "UPDATE sub_category SET cat_id='$cat_id', sub_cat_name='$sub_cat_name', sub_cat_status='$sub_cat_status' WHERE sub_cat_id='$sub_cat_id' ";

    $update_query_run = mysqli_query($con, $update_query);
    
    if($update_query_run)
    {
        redirect("subcategory.php", "Category Updated Successfully");
    }
    else
    {
        redirect("subcategory.php", "Something Went Wrong");
    }

}


// Add Product
else if(isset($_POST['add_product_btn']))
{
    
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];
  
    $name = $_POST['name'];
    $slug = $_POST['pro_slug'];
    $original_price = $_POST['pro_original_price'];
    $selling_price = $_POST['pro_selling_price'];
    $qty = $_POST['pro_qty'];
    $small_description = $_POST['pro_small_description'];
    $description = $_POST['pro_description'];
    $meta_title = $_POST['pro_meta_title'];
    $meta_description = $_POST['pro_meta_description'];
    $meta_keywords = $_POST['pro_meta_keywords'];
    $status = isset($_POST['pro_status']) ? '1':'0';
    $trending = isset($_POST['pro_trending']) ? '1':'0';

    $image = $_FILES['image']['name'];
    $image2 = $_FILES['image2']['name'];
    $image3 = $_FILES['image3']['name'];
    $image4 = $_FILES['image4']['name'];
    // $image5 = $_FILES['image5']['name'];

    
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $image_ext2 = pathinfo($image2, PATHINFO_EXTENSION);
    $image_ext3 = pathinfo($image3, PATHINFO_EXTENSION);
    $image_ext4 = pathinfo($image4, PATHINFO_EXTENSION);
    // $image_ext5 = pathinfo($image5, PATHINFO_EXTENSION);
    
    $filename = 1+time().'.'.$image_ext;
    $filename2 = 2+time().'.'.$image_ext2;
    $filename3 = 3+time().'.'.$image_ext3;
    $filename4 = 4+time().'.'.$image_ext4;
    // $filename5 = 5+time().'.'.$image_ext5;

    $img_temp = $_FILES['image']['tmp_name'];
    $img_temp2 = $_FILES['image2']['tmp_name'];
    $img_temp3 = $_FILES['image3']['tmp_name'];
    $img_temp4 = $_FILES['image4']['tmp_name'];
    // $img_temp5 = $_FILES['image5']['tmp_name'];
    
    $message = "$category_id, $subcategory_id, $name, $slug, $original_price, $selling_price, $qty, $small_description, $meta_title, 
    $meta_title, $meta_description, $meta_keywords, $status, $trending, $filename, $filename2, $filename3, $filename4";
    echo "<script type='text/javascript'>alert('$message');</script>";

    if($name != "" && $slug != "" && $description != "")
    {
        // $product_query = "INSERT INTO product (cat_id,sub_cat_id,pro_name,pro_slug,pro_original_price,pro_selling_price,pro_qty,
        // image,image2,image3,image4,pro_small_description,pro_description,pro_meta_title,pro_meta_description,pro_meta_keywords,pro_trending,pro_status)
        // VALUES ('$category_id',$subcategory_id,'$name','$slug','$original_price','$selling_price','$qty','$filename','$filename2','$filename3',
        // '$filename4','$small_description','$description','$meta_title','$meta_description','$meta_keywords','$trending','$status')";
        
        $pq = "INSERT INTO `product`(`cat_id`, `sub_cat_id`, `pro_name`, `pro_slug`, `pro_original_price`, `pro_selling_price`, `pro_qty`,
                            `image`, `image2`, `image3`, `image4`, `pro_small_description`, `pro_description`, `pro_meta_title`,
                            `pro_meta_description`,`pro_meta_keywords`, `pro_trending`, `pro_status`)
                    VALUES ('$category_id','$subcategory_id','$name','$slug','$original_price','$selling_price','$qty',
                            '$filename','$filename2','$filename3','$filename4','$small_description','$description','$meta_title',
                            '$meta_description','$meta_keywords','$trending','$status')";

$product_query_run = mysqli_query($con, $pq);

        $message1 = "Sql Query Running";
        echo "<script type='text/javascript'>alert('$message1');</script>";
        
        
        if($product_query_run)
        {

            $message2 = "Sql Query Complete";
            echo "<script type='text/javascript'>alert('$message2');</script>";

            move_uploaded_file($img_temp, $path.'/'.$filename);
            move_uploaded_file($img_temp2, $path.'/'.$filename2);
            move_uploaded_file($img_temp3, $path.'/'.$filename3);
            move_uploaded_file($img_temp4, $path.'/'.$filename4);
            // move_uploaded_file($img_temp5, $path.'/'.$filename5);
            redirect("products.php", "Product Added Successfully");
        }
        else{
            redirect("manageproduct.php", "Something Went Wrong");
        }
    } 
    else{
        redirect("manageproduct.php", "All Fields Are Manadatory");
    } 
}


// Update Product
else if(isset($_POST['update_product_btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['subcategory_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $small_description = $_POST['small_description'];
    $description = $_POST['pro_description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['pro_status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';

    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $new_image2 = $_FILES['image2']['name'];
    $new_image3 = $_FILES['image3']['name'];
    $new_image4 = $_FILES['image4']['name'];
    // $new_image5 = $_FILES['image5']['name'];

    $old_image = $_POST['old_image'];
    $old_image2 = $_POST['old_image2'];
    $old_image3 = $_POST['old_image3'];
    $old_image4 = $_POST['old_image4'];
    // $old_image5 = $_POST['old_image5'];

    $img_temp = $_FILES['image']['tmp_name'];
    $img_temp2 = $_FILES['image2']['tmp_name'];
    $img_temp3 = $_FILES['image3']['tmp_name'];
    $img_temp4 = $_FILES['image4']['tmp_name'];
    // $img_temp5 = $_FILES['image5']['tmp_name'];

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $image_ext2 = pathinfo($new_image2, PATHINFO_EXTENSION);
        $image_ext3 = pathinfo($new_image3, PATHINFO_EXTENSION);
        $image_ext4 = pathinfo($new_image4, PATHINFO_EXTENSION);
        // $image_ext5 = pathinfo($new_image5, PATHINFO_EXTENSION);

        $update_filename = 1+time().'.'.$image_ext;
        $update_filename2 = 2+time().'.'.$image_ext2;
        $update_filename3 = 3+time().'.'.$image_ext3;
        $update_filename4 = 4+time().'.'.$image_ext4;
        // $update_filename5 = 5+time().'.'.$image_ext5;

    }
    else
    {
        $update_filename = $old_image;
        $update_filename2 = $old_image2;
        $update_filename3 = $old_image3;
        $update_filename4 = $old_image4;
        // $update_filename5 = $old_image5;
    }
    $update_product_query = "UPDATE product SET cat_id='$category_id',sub_cat_id='$subcategory_id',pro_name='$name',pro_slug='$slug',pro_original_price='$original_price',
    pro_selling_price='$selling_price',pro_qty='$qty',pro_small_description='$small_description',pro_description='$description',
    pro_meta_title='$meta_title',pro_meta_description='$meta_description',pro_meta_keywords='$meta_keywords',pro_status='$status',
    pro_trending='$trending',image='$update_filename',image2='$update_filename2',image3='$update_filename3'
    ,image4='$update_filename4' WHERE pro_id='$product_id' ";
    $update_product_query_run = mysqli_query($con, $update_product_query);

    if($update_product_query_run)
    {
        if($new_image != "")
        {
            move_uploaded_file($img_temp, $path.'/'.$update_filename);
            move_uploaded_file($img_temp2, $path.'/'.$update_filename2);
            move_uploaded_file($img_temp3, $path.'/'.$update_filename3);
            move_uploaded_file($img_temp4, $path.'/'.$update_filename4);
            // move_uploaded_file($img_temp5, $path.'/'.$update_filename5);

            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
                unlink("../uploads/".$old_image2);
                unlink("../uploads/".$old_image3);
                unlink("../uploads/".$old_image4);
                // sunlink("../uploads/".$old_image5);
            }
        }
        redirect("products.php", "Product Updated Successfully");
    }
    else
    {
        redirect("edit-product.php?pro_id=$product_id", "Something Went Wrong");
    }
}

// Delete Product
// else if(isset($_POST['delete_product_btn']))
// {
//     $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

//     $product_query = "SELECT * FROM products WHERE id='$product_id' ";
//     $product_query_run = mysqli_query($con, $product_query);
//     $product_data = mysqli_fetch_array($product_query_run);
//     $image = $product_data['image'];

//     $delete_query = "DELETE FROM products WHERE id='$product_id' ";
//     $delete_query_run = mysqli_query($con, $delete_query);

//     if($delete_query_run)
//     {
//         if(file_exists("../uploads/".$old_image))
//         {
//             unlink("../uploads/".$old_image);
//         }
//         //redirect("products.php", "Product Deleted Successfully");
//         echo 200;
//     }
//     else{
//         //redirect("products.php", "Something Went Wrong");
//         echo 500;
//     }


// }

else
{
    header('Location: ../index.php');
}
