<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: welcome.php");
        die();
    }

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    include 'config/dbcon.php';
    $msg = "";

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm-password']);
        $code = mysqli_real_escape_string($con, md5(rand()));

        if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE user_email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        }else{
            if ($password === $confirm_password) {  
                $sql = "INSERT INTO user (user_name, user_email, user_password, user_code) VALUES ('{$name}', '{$email}', '{$password}', '{$code}')";
                $result = mysqli_query($con, $sql);
                
                if($result) {
                    echo "<div style='display: none;'>";
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'thamalpathsathimantha3@gmail.com';                     //SMTP username
                        $mail->Password   = 'takvhjdawywhypli';                               //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('thamalpathsathimantha3@gmail.com');
                        $mail->addAddress($email);

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Verify your email addresss';
                        $mail->Body    = 'Here is the verification link <b> <a href="http://localhost/Projects/Websites/DaisyEcom/signin.php?verification='.$code.'">http://localhost/Projects/Websites/DaisyEcom/signin.php?verification='.$code.'</a> </b>';

                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
                }else{
                    $msg = "<div class='alert alert-danger'>Something wrong went.</div>"; 
                }
            }else{
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }   
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="assets/css/SigninStyle.css">
</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <img src="resources/Icons/1.1.png" class="img-fluid" alt="logo">
                </div>
                <?php echo $msg; ?>
                <form class="rounded bg-white shadow p-5" method="post">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Create an Account</h3>

                    <div class="fw-normal text-muted mb-4">
                        Already have an account? <a href="signin.php" class="text-primary fw-bold text-decoration-none">Sign in here</a>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control name" name="name" id="floatingFirstName" placeholder="name@example.com" value="<?php if(isset($_POST['submit'])) {echo $name;}?>" required>
                        <label for="floatingFirstName">User Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control email" name="email" id="floatingInput" placeholder="name@example.com" value="<?php if(isset($_POST['submit'])) {echo $email;}?>" required>
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control password" name="password" id="floatingPassword1" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control confirm-password" name="confirm-password" id="floatingPassword2" placeholder="Confirm Password" required>
                        <label for="floatingPassword">Confirm Password</label>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="gridCheck" required>
                        <label class="form-check-label ms-2" for="gridCheck">
                          I Agree <a href="#">Terms and conditions</a>.
                        </label>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary submit_btn w-100 my-4">Sign Up</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>