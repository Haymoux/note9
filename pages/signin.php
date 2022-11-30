<?php
//THE VERIFICATION CODE STARTS AT LINE 47
session_start();
include ('../includes/db-conn.php');

if ( isset($_SESSION ['logged_in'])){
	header ("location: ../user-dashboard/index.php");
	exit;
		}
?>


<!doctype html>
<html lang="en">
<head>
<title>Sign In</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../styles/bootstrap.min.css">
<link rel="stylesheet" href="../styles/signin.css">
<body>
    <!-- from https://colorlib.com/wp/template/login-form-15/-->
<section class="ftco-section" style="margin-top: -80px;">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Welcome to Note9</h2> 
</div>
</div>
<div class="row justify-content-center">
<div class="col-md-7 col-lg-5">
<div class="wrap">
<div class="img" style="background-image:url(https://source.unsplash.com/random/300x200)"></div>
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">




<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->


<?php

    if (isset($_POST['submit'])){
        $e_mail = $_POST['email-inp'];
        $p_assword = $_POST['passwd-inp'];

            //This is for the the normal email address and password check
            $email_check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$e_mail' and passwrd = '$p_assword'");
                        //This line fetches the result from mysql as an array
            $email_check_array = mysqli_fetch_array($email_check);

            //This is for the the normal email address and password check
            $user_check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$e_mail' and passwrd = '$p_assword'");
                        //This line fetches the result from mysql as an array
            $user_check_array = mysqli_fetch_array($user_check);
                            
                         

        if (empty($e_mail) || empty($p_assword) ){
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Kindly fill in your login details.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }

        else if (is_array($email_check_array)){
        //set session variables
            $_SESSION['logged_in'] = true; 
            $_SESSION['user_id'] = $email_check_array['id']; 
            $_SESSION['f_name'] = $email_check_array['first_name'];
            $_SESSION['u_name'] = $email_check_array['username'];
            $_SESSION['user_email'] = $email_check_array['email'];
            $_SESSION['ver_stat'] = $email_check_array['verified'];
            
            header ('location: ../user-dashboard/index.php' );
        }


        else if (is_array($user_check_array)){
        //set session variables
            $_SESSION['logged_in'] = true; 
            $_SESSION['user_id'] = $user_check_array['id']; 
            $_SESSION['f_name'] = $user_check_array['first_name'];
            $_SESSION['u_name'] = $user_check_array['username'];
            $_SESSION['user_email'] = $user_check_array['email'];
            $_SESSION['ver_stat'] = $user_check_array['verified'];
            
            header ('location: ../user-dashboard/index.php' );
        }



        

        else{
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                            <strong>Invalid!</strong> Incorrect email or password.
                                                            <button type="button" class="btn-close"
                                                            data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                            </div> ';
        }

       

        
    }
?>



<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OFVERIFICATION -->











<h3 class="mb-4">Sign In to continue</h3>
</div>
<!--
<div class="w-100">
<p class="social-media d-flex justify-content-end">
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
</p>
</div>
-->
</div>

<form action="" class="signin-form" method="POST">
<div class="form-group mt-3">
<input type="text" class="form-control" required placeholder="Username or email" name="email-inp" maxlength="55">
<label class="form-control-placeholder"></label>
</div>
<div class="form-group">
<input type="password" class="form-control" placeholder="Password" required minlength="8" maxlength="15" name="passwd-inp">
<label class="form-control-placeholder" for="password"></label>
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group">
<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
</div>
<!--
<div class="form-group d-md-flex">
<div class="w-50 text-left">
<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
<input type="checkbox" checked>
<span class="checkmark"></span>
</label>
</div>
-->
<div class="w-50 text-md-left" style="float:left;">
<a href="signup.php">Sign Up instead?</a>
</div>

<div class="w-50 text-md-right" style="float:right;">
<a href="forgot-password/">Forgot Password</a>
</div>
<!--
</div>

</form>
<p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>

-->
</div>
</div>
</div>
</div>
</div>
</section>
<script type="text/javascript">

</script>
<script src="../styles/bootstrap.min.js"></script>
</body>
</html>
