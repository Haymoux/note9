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
<title>Sign Up</title>
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
<!-- <div class="img" style="background-image:url(https://source.unsplash.com/random/300x200)"></div> -->
<div class="login-wrap p-4 p-md-5">
<div class="d-flex">
<div class="w-100">




<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->
<!-- THIS IS THE VERIFICATION -->


<?php

    if (isset($_POST['submit'])){
        $f_name = $_POST['first-n-inp'];
        $u_name = $_POST['username-inp'];
        $e_mail = $_POST['email-inp'];
        $p_assword = $_POST['passwd-inp'];
        $p_assword2 = $_POST['passwd-inp2'];
        $ver_stat = "no";

            //This code checks if username and email exists already
            $email_check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$e_mail' ");
                        //This line fetches the number of rows
           $email_check_Row = mysqli_num_rows($email_check);

           $username_check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$u_name' ");
           //This line fetches the number of rows
            $username_check_Row = mysqli_num_rows($username_check);

                if ($email_check_Row> 0){
                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                                        <strong>Invalid!</strong> A user with this email already exist.
                                                                        <button type="button" class="btn-close"
                                                                        data-bs-dismiss="alert"
                                                                        aria-label="Close"></button>
                                                                        </div> ';
                    }

                else if ($username_check_Row> 0){
                        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                                            <strong>Invalid!</strong> Username already taken, kindly choose another one.
                                                                            <button type="button" class="btn-close"
                                                                            data-bs-dismiss="alert"
                                                                            aria-label="Close"></button>
                                                                            </div> ';
                        }
                        //END


                //This code checks if all has been inputted.
                    else if (empty($f_name) || empty($u_name) || empty($e_mail) || empty($p_assword) || empty($p_assword2) ){
                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                                    <strong>Invalid!</strong> Kindly fill in all details.
                                                                    <button type="button" class="btn-close"
                                                                    data-bs-dismiss="alert"
                                                                    aria-label="Close"></button>
                                                                    </div> ';
                }


                //Checks if password are thesame
                else  if ($p_assword != $p_assword2){
                    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"">
                                                                    <strong>Invalid!</strong> Passwords do not match!.
                                                                    <button type="button" class="btn-close"
                                                                    data-bs-dismiss="alert"
                                                                    aria-label="Close"></button>
                                                                    </div> ';
                    }




                else {
            
                    mysqli_query($conn, "INSERT INTO users (id, first_name, username, email, passwrd, verified)
                    VALUES ('', '$f_name', '$u_name', '$e_mail', '$p_assword', '$ver_stat')");
                    
                    


                    //This Code generates random 5 digit number
                    $random_number = (rand(10000,99999));

                    //This code sends mail to the user's email address
                    $toEmail = $e_mail;       //The email address entered by the user
                    $uname = 'Verify your email address';    //Email Subjesct
                    $mailHeaders = "Kindly enter the code below in Note9 Website Verification Page."  .
                    "\r\n OTP: ". $random_number ;

                    if(mail($toEmail, $uname, $mailHeaders)) {
                        $message = "Done";   //Useless piece of code
                    }

                //set session variables, I am supposed to put this where $message is, but I like it this way...
                    $_SESSION['ve-status'] = 'true';          //This is for securing the verification page
                    $_SESSION['user_email'] = $e_mail;    //thissss..
                    $_SESSION['expected_code'] = $random_number;        //Expected OTP Code to be used in "verify" page
                    
                    header ('location: verify.php' );


                    
                    }

        
    }
?>



<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OF VERIFICATION -->
<!-- THIS IS THE END OFVERIFICATION -->











<h3 class="mb-4">Fill in the required details to continue</h3>
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
<input type="text" class="form-control" required placeholder="First Name" name="first-n-inp" maxlength="50">
<label class="form-control-placeholder"></label>
</div>
<div class="form-group mt-3">
<input type="text" class="form-control" required placeholder="Username" name="username-inp" maxlength="50">
<label class="form-control-placeholder"></label>
</div>
<div class="form-group mt-3">
<input type="email" class="form-control" required placeholder="Email" name="email-inp" maxlength="50">
<label class="form-control-placeholder"></label>
</div>
<div class="form-group">
<input type="password" class="form-control" placeholder="Password" required minlength="8" maxlength="15" name="passwd-inp">
<label class="form-control-placeholder" for="password"></label>
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group">
<input type="password" class="form-control" placeholder="Enter password again" required minlength="8" maxlength="15" name="passwd-inp2">
<label class="form-control-placeholder" for="password"></label>
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group">
<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
</div>


<div class="w-50 text-md-right" style="float:right;">
<a href="signin.php">Sign In instead?</a>
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
