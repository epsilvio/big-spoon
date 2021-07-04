<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Big Spoon | Rate user</title>

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
	<style>
	a{font-size: 40px;}
	h2{font-size: 18px; font-style: italic;}
	h1{font-size: 20px; color: #C9E265;}
	</style>
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
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
                            <li><a href="home.php" class="active">Home</a></li>
                            <li><a href="help_us.php">Help us</a></li>
                            <li><a href="about_us.php">About</a></li>
							<li><a href="announcements.php">Announcements</a></li>
							<li><a href="post_food.php">Share your food</a></li>
                            

                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/rate_user.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>2 pcs. Chicken ni Joy</h2>
						<h1>Posted by Elisha Silvio</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
	
	<br>

    <!-- ***** Rating fleet Starts ***** -->
	<center>
		<div class="rate">
			<input type="radio" id="star5" name="rate" value="5" />
			<label for="star5" title="text">5 stars</label>
			<input type="radio" id="star4" name="rate" value="4" />
			<label for="star4" title="text">4 stars</label>
			<input type="radio" id="star3" name="rate" value="3" />
			<label for="star3" title="text">3 stars</label>
			<input type="radio" id="star2" name="rate" value="2" />
			<label for="star2" title="text">2 stars</label>
			<input type="radio" id="star1" name="rate" value="1" />
			<label for="star1" title="text">1 star</label>
		</div>
		<br><br><br>
		<h2>Comments:</h2>
		<form action="/action_page.php">
			<textarea name="message" rows="10" cols="30" placeholder=""></textarea>
		</form>
		<div class="main-button">
            <a href="">Submit</a>
        </div>
	</center>
	<!-- ***** rating fleet ends ***** -->
    
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
    <script src="firebase.js"></script>
    <script src="checkLoginHome.js"></script>
    </body>
</html>