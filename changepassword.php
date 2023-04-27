<?php

$msg ="";
include 'Connection.php';

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($con, $_POST['confirm-password']);

            if ($password === $confirm_password) {
                $query = mysqli_query($con, "UPDATE users SET password='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: Signin.php");
                }
            }else{
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
            }
        }      
    }else{
        $msg = "<div class='alert alert-danger'>Reset Link do not match.</div>";
    }
}else {
    header("Location: ForgetPassword.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="CSS/SigninStyle.css">

    <style>
        .btn{
            background: #ff6961;
            color: #fff;
            font-weight: 600;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <img src="Resourcees/Icons/1.1.png" class="img-fluid" alt="logo">
                </div>
                <?php echo $msg; ?>
                <form class="rounded bg-white shadow p-5" method="post">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Change Password ?</h3>

                    <div class="fw-normal text-muted mb-4">
                        Enter your new password.
                    </div>

                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="floatingInput" placeholder="Enter Your Password" required>
                        <label for="floatingInput">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control confirm-password" name="confirm-password" id="floatingPassword" placeholder="Enter Your Confirm Password" required>
                        <label for="floatingPassword">Confirm Password</label>
                    </div>

                    <button name="submit" type="submit" class="btn submit_btn my-4">Change Password</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>