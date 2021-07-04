<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<title>Big Spoon | Join today</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="shortcut icon" type="image/x-icon" href="assets/images/BS_icon.png">
</head>
<body>
    <!-- ***** Preloader Start ***** -->    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>

          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Big<em>Spoon</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" id="errModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 		<div class="modal-dialog modal-lg">
    			<div class="modal-content">
				<div class="modal-content">
      					<div class="modal-header">
        					<h5 class="modal-title"><strong>Error</strong></h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        					</button>
      					</div>
      					<div class="modal-body">
        					<p>There were errors in submitting your data. Make sure that your data complies to the following:</p>
						<p>&#25; First name must consist of 3 or more characters.<br>&#25; Last name must consist of 3 or more characters.<br>&#25; Contact number must start with '+63'.<br>&#25; Contact number must have 13 characters.<br>&#25; Contact number must consist of numbers.</p>
      					</div>
      					<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     					</div>
    				</div>
    			</div>
  		</div>
	</div>
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/login_createAcc_video.mp4" type="video/mp4" />
        </video>
        <form id="userInfo" action="#" method="post">
        	<div class="video-overlay header-text">
            		<div class="caption">
                		<h2> <em>Admin Login</em> </h2>
					<center>
						<div class="alert alert-danger" role="alert" id="err">
  							<strong>Invalid Credentials!</strong> Please try again.
						</div>
					</center>
                    			<center>
				  	<div class="textbox">
						<i class="fas fa-user" color="white"></i>
						<input type="username" id = "username" placeholder="Username">
				  	</div>
					</center>
				 	<center>
				  	<div class="textbox">
						<i class="fas fa-key"></i>
						<input type="password" id = "password" placeholder="Password">
				  	</div>
					</center>
					<center>
						<div class="main-button">
							<a href="#" id="loginBtn">Login</a>
						</div>
		 			</center>
            		</div>
        	</div>
        </form>
    </div>
    <!-- ***** Main Banner Area End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2021 Dagitab
                    </p>
                </div>
            </div>
        </div>
    </footer>
	
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script src="adminLogin.js"></script>

  </body>
</html>