<?php

session_start();
include('../config/dbcon.php');

if (isset($_SESSION['username']))
{
    if(isset($_POST['scope']))
    {
        $scope = $_POST['scope'];
        switch ($scope)
        {
            case "add":
                $pro_id = $_POST['pro_id'];
                $pro_qty = $_POST['pro_qty'];

                $user_id = $_SESSION['userid'];
                // $user_id = 1;

                $chk_existing_cart = "SELECT * FROM cart WHERE cart_pro_id='$pro_id' AND cart_user_id='$user_id' ";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

                // if(mysqli_num_rows($chk_existing_cart_run) > 0)
                // {
                //     echo "existing";
                // }
                // else
                // {
                    $insert_query = "INSERT INTO cart (cart_user_id, cart_pro_id, cart_pro_qty) VALUES ('$user_id','$pro_id','$pro_qty')";
                    $insert_query_run = mysqli_query($con, $insert_query);
                    
                    if($insert_query_run)
                    {
                        
                    }
                    else
                    {
                        
                    }
                // }
                break;

            case "update":
                $pro_id = $_POST['pro_id'];
                $pro_qty = $_POST['pro_qty'];

                $user_id = $_SESSION['userid'];

                $chk_existing_cart = "SELECT * FROM cart WHERE cart_pro_id='$pro_id' AND cart_user_id='$user_id' ";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

                if(mysqli_num_rows($chk_existing_cart_run) > 0)
                {
                    $update_query = "UPDATE cart SET cart_pro_qty='$prod_qty' WHERE cart_pro_id='$pro_id' AND cart_user_id='$user_id' ";
                    $update_query_run = mysqli_query($con, $update_query);
                    if($update_query_run){
                        
                    }else{
                        
                    }
                }
                else
                {
                    echo "Something went wrong";
                }

                break;

            case "delete":
                $cart_id = $_POST['cart_id'];

                $user_id = $_SESSION['userid'];

                $chk_existing_cart = "SELECT * FROM cart WHERE cart_id='$cart_id' AND cart_user_id='$user_id' ";
                $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

                // if(mysqli_num_rows($chk_existing_cart_run) > 0)
                // {
                    $delete_query = "DELETE FROM cart WHERE cart_id='$cart_id' ";
                    $delete_query_run = mysqli_query($con, $delete_query);
                    if($delete_query_run){
                        echo 200;
                    }else{
                        echo "Something went wrong";
                    }
                // }
                // else
                // {
                //     echo "Something went wrong";
                // }

                break;

            default:
                     
        }
    }
}
else
{
    
}

?>