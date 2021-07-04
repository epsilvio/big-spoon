<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <title>Big Spoon | About</title>
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
                            <li><a href="home.php" >Home</a></li>
                            <li><a href="help_us.php">Help us</a></li>
                            <li><a href="" class="active">About</a></li>
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

    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>About US</h2>
                        <p>What are our goals?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Blog Start ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <br>
            <br>
            <section class='tabs-content'>
              <article>
				<center>
                <div><img src="assets/images/dagitab.png" alt=""></div>
                <br>
				<h2>Our Goals <i class="fa fa-check" aria-hidden="true"></i></h2>
				<br>
				<a>
				One of the basic human needs includes food and water. To go on a day with an empty
				stomach could mean deteriorating metabolism, no vitamins, and no energy. What team Dagitab
				proposes is to create a web application, intended to minimize food waste in the Philippines and
				to feed the hungry; we present, Big Spoon. 
				</a>
				<br>
				<br>
                <a>The team is planning to create a web application where users can share their food to help
				those who are less fortunate. This is a way where people can help each other in times of need,
				especially this pandemic, the less fortunate suffer more in this kind of situation.
				</a>
				<br>
				<br>
				<a>
				With the same idea as community pantries, one of the differences of this project is that it
				also promotes a one-for-one sharing of food. This encourages people who only have a few extra
				foods to still share even just to an individual if they are willing to.</a>
				</center>
              </article>
            </section>
        </div>
	<br>
	<div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/elisha.png" alt="First One">
                            </div>
                            <div class="right-content">
                                <h4>Elisha Silvio</h4>
                                <p><b>Team Leader | Full-stack Developer. </b><em> As the team leader of Dagitab, Elisha's goals towards feeding the hungry is seen in his efforts through building Big Spoon.</em></p>
								<br>
								<p><i class="fas fa-envelope-square"></i> epsilvio@student.apc.edu.ph</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/veronica.png" alt="second one">
                            </div>
                            <div class="right-content">
                                <h4>Veronica Chua</h4>
                                <p><b>Documentations | Backend Developer. </b><em> Her background in Applied Projects gave her a sophistical grasp on how to effectively fulfill Big Spoon's goals for the people.</em></p>
                            <br>
							<p><i class="fas fa-envelope-square"></i> vdchua@student.apc.edu.ph</p>
							</div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/jeremy.png" alt="fourth muscle">
                            </div>
                            <div class="right-content">
                                <h4>Jeremy Zamuco</h4>
                                <p><b>Visuals & Design | Frontend Developer. </b><em> Attention to visual detail is one of Jeremy's strengths, this enabled him to work precisely as a backend developer.</em></p>
                            <br>
							<p><i class="fas fa-envelope-square"></i> jbzamuco@student.apc.edu.ph</p>
							</div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/renzy.png" alt="training fifth">
                            </div>
                            <div class="right-content">
                                <h4>Renzy Biron</h4>
                                <p><b>Design | Frontend Developer. </b><em> A hardworking member. Renzy often times produce great outputs for the frontend team, making him a good co-worker.</em></p>
                            <br>
							<p><i class="fas fa-envelope-square"></i> jdbiron@student.apc.edu.ph</p>
							</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog End ***** -->
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
    <script>
	var logoutBtn;
	window.onload = (function(){
		logoutBtn = document.getElementById("logoutBtn");
		logoutBtn.onclick = function(){
			firebase.auth().signOut().then(function() {
                		windows.location.replace("index.php");
        		}).catch(function(error) {
        			console.log("error");
        		});
		}	
	})
    </script>
    <script src="checkLoginHome.js"></script>
    
  </body>
</html>