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
<script src="https://www.gstatic.com/firebasejs/8.6.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/ui/4.8.0/firebase-ui-auth.js"></script>
<link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/4.8.0/firebase-ui-auth.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.css" />
<script src="https://cdn.firebase.com/libs/firebaseui/3.1.1/firebaseui.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
<script src="https://cdn.firebase.com/js/client/2.4.0/firebase.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase-messaging.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase-functions.js"></script>
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
	<div class="modal" tabindex="-1" id="submitModal" role="dialog">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title">Confirm Submission?</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
        				<p>Do you wish to confirm the registration of your account?</p>
      				</div>
      				<div class="modal-footer">
        				<button type="button" id="confirmBtn" class="btn btn-primary">Confirm</button>
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     				</div>
    			</div>
 	 	</div>
	</div>
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
                <h6></h6>
                <h2> <em>Join us today!</em> </h2>
                    <center>
				  <div class="textbox">
					<i class="fas fa-user" color="white"></i>
					<input type="text" id = "fname" placeholder="First name">
				  </div>
					</center>
				  
				  <center>
				  <div class="textbox">
					<i class="far fa-user"></i>
					<input type="text" id = "lname" placeholder="Last name">
				  </div>
					</center>
					
				  <center>
					<div class="textbox">
					<i class="fas fa-phone"></i>
					<input type="text" id = "cnum" placeholder="Contact # (+63)">
					</div>
					<div>
						<p>By submitting this form, you state that you have read and agreed to Big Spoon's <a href="eula.php">Terms and Condition</a>.</p>
					</div>
					<div>
				        <input type="button" class="createAcct_btn" id="submitBtn" value="SIGN UP">
					</div>
				   </center>
          <h1>	
          </h1>
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
    <script src="firebase.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="checkLoginHome.js"></script>
    <script src="createAcc.js"></script>

  </body>
</html>