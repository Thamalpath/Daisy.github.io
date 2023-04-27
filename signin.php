<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: index.php");
        die();
    }

    include 'config/dbcon.php';
    $msg = "";
    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE user_code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($con, "UPDATE user SET code='' WHERE user_code='{$_GET['verification']}'");

            if($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed</div>";
            }
        }else{
            header("Location: signin.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        // get query from users
        $sql = "SELECT * FROM user WHERE user_email='{$email}' AND user_password='{$password}'";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if(empty($row['code'])) {
                $_SESSION['username'] = $row['user_name'];
                $_SESSION['userid'] = $row['user_id'];

                header("Location: index.php");
            }else{
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        }else{
            $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin Page</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="assets/css/SigninStyle.css">
</head>

<body>

    <section class="wrapper">
        <div class="container">
            <div class=" col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center ">
                <div class="logo ">
                    <img src="resources/Icons/1.1.png " class="img-fluid " alt="Logo ">
                </div>
                <?php echo $msg; ?>
                <form class="rounded bg-white shadow py-5 px-4" method="post">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Sign In to <span>DAISY’S WARDROBE</span> </h3>
                    <div class="fw-normal text-muted mb-4"> New Here?
                        <a href="signup.php" class="text-primary fw-bold text-decoration-none">Create an Account</a>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating">
                        <input  name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword ">Password</label>
                    </div>
                    <div class="mt-2 text-end ">
                        <a href="ForgetPassword.php" class="text-primary fw-bold text-decoration-none">Forget Password?</a>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary submit_btn w-100 my-4">Sign In</button>
                    <div class="text-center text-muted text-uppercase mb-3 ">or</div>
                    <a href="# " class="btn btn-light login_with w-100 mb-3 ">
                        <img alt="Logo" src="resources/Icons/google-icon.svg " class="img-fluid me-3">Continue with Google
                    </a>
                    <a href="# " class="btn btn-light login_with w-100 mb-3 ">
                        <img alt="Logo" src="resources/Icons/facebook-icon.svg " class="img-fluid me-3">Continue with Facebook
                    </a>
                    <a href="# " class="btn btn-light login_with w-100 mb-3 ">
                        <img alt="Logo" src="resources/Icons/instagram.png " class="img-fluid me-3">Continue with Instagram
                    </a>
                </form>
            </div>
        </div>
    </section>

</body>

</html>