<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<title>Big Spoon | Foods</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="shortcut icon" type="image/x-icon" href="assets/images/BS_icon.png">
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
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
                            <li><a href="" class="active">Home</a></li>
                            <li><a href="help_us.php">Help us</a></li>
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
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/4.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Posted <em>Products</em></h2>
                        <p id="upTime"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
	
	<!-- ***** Search bar and button ***** -->
	<center>
	<p>WHAT ARE YOU CRAVING?</p>
		<div class="example" style="margin:auto;max-width:500px">
		  <input type="text" placeholder="Search" id="searchField">
		  <button type="submit" id="searchBtn"><i class="fa fa-search"></i></button>
		</div>
	</center>
	<!-- ***** Search end ***** -->
	<style>
	p{font-size: 15px; font-style: italic; color: black;}
	</style>


    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
	<div class="alert alert-warning" role="alert" id="noPost">
  		There are no foods currently available :( Click <a href="post_food.php" class="alert-link">here</a> to share your food!
	</div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item" id="food1" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" alt="" id="foodPic1">
                        </div>
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="postId1" style="display:none"></p>
			<p id="ownerId1" style="display:none"></p>
			</div>
                            <span>
								<h4 id="foodName1"></h4>
								<a href="view_profile?id=" id="postOwner1"></a>
                            </span>
				
				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category1"></label><br>
				<i class="fas fa-clock"></i><label id="post1"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location1"></label>
							
                            <p id="description1"></p>

                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="reqBtn1">+ Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="food2" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" alt="" id="foodPic2">
                        </div>
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="postId2" style="display:none"></p>
			<p id="ownerId2" style="display:none"></p>
			</div>
                            <span>
								<h4 id="foodName2"></h4>
								<a href="view_profile?id=" id="postOwner2"></a>
                            </span>
				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category2"></label><br>
				<i class="fas fa-clock"></i><label id="post2"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location2"></label>


                            <p id="description2"></p>

                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="reqBtn2"">+ Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="food3" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" alt="" id="foodPic3">
                        </div>
                        <div class="down-content">
                        <div class="hidden" id="hiddenData">
			<p id="postId3" style="display:none"></p>
			<p id="ownerId3" style="display:none"></p>
			</div>
			<span>
								<h4 id="foodName3"></h4>
								<a href="view_profile?id=" id="postOwner3"></a>
                            </span>

				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category3"></label><br>
				<i class="fas fa-clock"></i><label id="post3"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location3"></label>

                            <p id="description3"></p>
				
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="reqBtn3">+ Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="trainer-item" id="food4" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" alt="" id="foodPic4">
                        </div>
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="postId4" style="display:none"></p>
			<p id="ownerId4" style="display:none"></p>
			</div>
                            <span>
								<h4 id="foodName4"></h4>
								<a href="view_profile?id=" id="postOwner4"></a>
                            </span>

					
				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category4"></label><br>
				<i class="fas fa-clock"></i><label id="post4"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location4"></label>


                            <p id="description4"></p>

                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="reqBtn4">+ Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="food5" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" alt="" id="foodPic5">
                        </div>
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="postId5" style="display:none"></p>
			<p id="ownerId5" style="display:none"></p>
			</div>
                           <span>
								<h4 id="foodName5"></h4>
								<a href="view_profile?id=" id="postOwner5"></a>
                            </span>
				
				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category5"></label><br>
				<i class="fas fa-clock"></i><label id="post5"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location5"></label>


                            <p id="description5"></p>

                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="reqBtn5">+ Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="food6" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" alt="" id="foodPic6">
                        </div>
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="postId6" style="display:none"></p>
			<p id="ownerId6" style="display:none"></p>
			</div>
                            <span>
								<h4 id="foodName6"></h4>
								<a href="view_profile?id=" id="postOwner6"></a>
                            </span>

				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category6"></label><br>
				<i class="fas fa-clock"></i><label id="post6"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location6"></label>

                            <p id="description6" data-status="None"></p>

                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="reqBtn6">+ Request</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <br>
                
            <nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" id="prevBtn" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" id="nxtBtn" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>

        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
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
    <script src="logout.js"></script>
    <script src="req_food.js"></script>
    <script src="getPosts.js"></script>
    <script src="checkNewAcc.js"></script>
    

  </body>
</html>
