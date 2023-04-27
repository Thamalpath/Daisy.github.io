<?php

session_start();
include('../config/dbcon.php');

if (isset($_SESSION['username'])) {
    if (isset($_POST['placeOrderBtn'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
        $payment_id = "1"; //mysqli_real_escape_string($con, $_POST['payment_id']);

        if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
            $_SESSION['message'] = "All fields are mandatory";
            header('Location: ../checkout.php');
            exit(0);

            $user_id = $_SESSION ? $_SESSION['userid'] : 0;
            $cartTotal = 0;
            $sql = "SELECT * FROM cart LEFT JOIN product ON cart.cart_pro_id=product.pro_id WHERE cart_user_id=$user_id";
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $cartTotal += $row['cart_pro_qty'] * $row['pro_selling_price'];
                    } 
                } else {
                }
            } else {
                echo $cartTotal;
            }

            $tracking_no = "daisywardrobe" . rand(1111, 9999) . substr($phone, 2);
            // $user_id = $_SESSION ? $_SESSION['userid'] : 0;

            $insert_query = "INSERT INTO orders (tracking_no, user_id,	name, email, phone,	address, pincode, total_price,
             payment_mode, payment_id) VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address',
              '$pincode', '$cartTotal', '$payment_mode', '$payment_id')";

            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run)
            {
                $order_id = mysqli_insert_id($con);
                while ($row = mysqli_fetch_array($result))
                {
                    $pro_id = $row['pro_id'];
                    $pro_qty = $row['cart_pro_qty'];
                    $price = $row['pro_selling_price'];

                    $insert_items_query = "INSERT INTO order_items (order_id, pro_id, qty, price) VALUES 
                    ('$order_id', '$pro_id', '$pro_qty', '$price')";
                    $insert_items_query_run = mysqli_query($con, $insert_items_query);
                }

                $deleteCartQuery = "DELETE FROM cart WHERE cart_user_id'$user_id' ";
                $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);

                $_SESSION['message'] = "Order placed successfully";
                header('Location: ../index.php');
                die();
            }
        }
    }
} else {
    header('Location: ../cart.php');
}

?>