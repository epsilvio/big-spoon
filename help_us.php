<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Big Spoon | Help us</title>

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
                            <li><a href="home.php">Home</a></li>
                            <li><a href="" class="active">Help us</a></li>
                            <li><a href="about_us.php">About</a></li>
			    <li><a href="post_food.php">Share your food</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="my_profile.php">My Profile</a>
				    <a class="dropdown-item" href="notifications.php">Notifications</a>
                                    <a class="dropdown-item" id="logoutBtn" href="javascript:void(0)">Logout</a>
                                </div>
                            </li>
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

    <!-- ***** Our Classes Start ***** -->
 <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Help<em>Us</em></h2>
                        <p>Making food-sharing a norm in our community!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Our Classes Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <br>
          
            <section class='tabs-content'>
              <article>
                <h4>Join Us</h4>
                <p>Here at Big Spoon, we gathered the best people to cater every person's eating needs. Now you made the first step of signing in, the next step is to become part of this
				awesome community that lets you feed the hungry and be fed.</p>

                <br>
                    
                <h4>Lessen the Food Waste</h4>
                <p>Dagitab is committed to reducing food waste and providing food with the hungry, forming a strong interpersonal link. The importance of developing an app that reduces
				food waste and feeds the hungry is highly valued by the team. Your job is to take part in this endeavor with the help of Big Spoon by your side.</p>

                <br>
                
                <h4>Share Big Spoon to the World</h4>
                <p>Help us grow Big Spoon Community to the world to spread the name of Big Spoon to any social media platforms to promote giving of extra food for the people who are in need.</p>

                <br>
             
              </article>
            </section>
        </div>
    </section>
    <!-- ***** Our Classes End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Dagitab
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
    <script>
	window.onload = function() {
	var a = document.getElementById("logoutBtn");
		a.onclick = function logOutBtn(){
			firebase.auth().signOut().then(function() {
                		windows.location.replace("index.php");
        		}).catch(function(error) {
        				console.log("error");
        		});
       		}
	}
    </script>
  </body>
</html>