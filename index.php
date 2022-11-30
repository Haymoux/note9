<?php
    session_start();
    ?>
<!doctype html>
<html lang="en">
    <head>
        <title>Note9</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/bootstrap.min.css">
        <link rel="stylesheet" href="styles/home-hero.css">
   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    


    </head>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success p-3">
<div class="container-fluid">
  <a class="navbar-brand" href="#">Note9</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class=" collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto ">
    <?php
        if (isset($_SESSION['logged_in'])){
         echo '
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="#">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link mx-2" href="user-dashboard/index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="includes/logout.php">Log Out <i class="fa fa-sign-out" aria-hidden="true"></i></a>
                </li>
      ';}
      else{
        echo '
                    <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="pages/signup.php">Sign Up</a>
                </li>
                
                    <li class="nav-item">
                    <a class="nav-link mx-2" href="pages/signin.php">Sign In</a>
                </li>
        
        ';
      }
      ?>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Company
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="#">Blog</a></li>
          <li><a class="dropdown-item" href="#">About Us</a></li>
          <li><a class="dropdown-item" href="#">Contact us</a></li>
        </ul>
      </li> -->
    </ul>
  </div>
</div>
</nav>
    </header>

    <body>

    <div class="hero-part">
          <div class="container">
      
            <div class="row">
              <div class="col-md-6">

              	<h1 class="animate__animated  animate__fadeIn">Welcome to Note9!</h1>
              	<h3 class="animate__animated  animate__slideInLeft">Write on the go without fear of data loss</h3>
	      	<p>
			<a href="pages/signup.php"><button class="btn btn-tertiary    animate__animated animate__bounce">Get Started Now</button></a>
	      	</p> <br />
              </div> 

              <div class="col-md-6 ">
              <img id="hero-img" class="d-none d-lg-block       animate__animated  animate__fadeIn"src="img/note-st.png" alt="picture-illutration">
              </div> 

            </div>
          
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,133.3C672,139,768,213,864,202.7C960,192,1056,96,1152,74.7C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
        </div>




        <script src="styles/bootstrap.min.js"></script>


       

    </body>
</html>
