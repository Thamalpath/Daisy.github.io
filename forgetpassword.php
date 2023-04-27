<?php
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

include 'config/dbcon.php';
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['user_email']);
    $code = mysqli_real_escape_string($con, md5(rand()));

    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE user_email='{$email}'")) > 0) {
        $query = mysqli_query($con, "UPDATE user SET user_code='{$code}' WHERE user_email='{$email}'");

        if ($query) {
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
                $mail->Subject = 'Change Your Password';
                $mail->Body    = 'Here is the verification link <b> <a href="http://localhost/Projects/Websites/DaisyEcom/forgetpasssword.php?reset='.$code.'">http://localhost/Projects/Websites/DaisyEcom/forgetpasssword.php?reset='.$code.'</a> </b>';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        }   
    }else{
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="assets//css/SigninStyle.css">

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
                    <img src="resourcees/Icons/1.1.png" class="img-fluid" alt="logo">
                </div>
                <?php echo $msg; ?>
                <form class="rounded bg-white shadow p-5" method="post">
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Forget Password ?</h3>

                    <div class="fw-normal text-muted mb-4">
                        Enter your email to reset your password.
                    </div>

                    <div class="form-floating mb-3">
                        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email address</label>
                    </div>

                    <button name="submit" type="submit" class="btn submit_btn my-4">Send Reset Link</button>
                </form>
            </div>
        </div>
    </section>
</body>

</html>