<?php
session_start();
require('../config/dbcon.php');
$msg='';
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
	$sql="SELECT * FROM admin_user WHERE admin_username='$username' AND admin_password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		if($row['admin_status']=='0'){
            $msg = "<div class='alert alert-danger'>Account Deactivated.</div>";
		}else{
			$_SESSION['ADMIN_LOGIN']='yes';
			$_SESSION['ADMIN_ID']=$row['id'];
			$_SESSION['ADMIN_USERNAME']=$username;
			//$_SESSION['ADMIN_ROLE']=$row['role'];
			header('location:home.php');
			die();
		}
	}else{
        $msg = "<div class='alert alert-danger'>Username or password do not match.</div>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signin Page</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="../assets/css/SigninStyle.css">
</head>

<body>

    <section class="wrapper">
        <div class="container">
            <div class=" col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center ">
                <div class="logo ">
                    <img src="../resources/Icons/1.1.png " class="img-fluid " alt="Logo ">
                </div>
                <?php echo $msg; ?>
                <form class="rounded bg-white shadow py-5 px-4" method="post">
                    <h3 class="text-dark fw-bolder fs-4 mb-4">Sign In to <span>DAISY’S ADMIN</span> </h3>
                    <div class="form-floating mb-3">
                        <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating">
                        <input  name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword ">Password</label>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary submit_btn w-100 my-4">Sign In</button>
                </form>
            </div>
        </div>
    </section>

</body>

</html>