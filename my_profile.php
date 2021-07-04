<!DOCTYPE html>
<html lang="en">
<!-- ***** PROFILE ***** -->
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>BigSpoon | Profile</title>

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
                        <a href="index.php" class="logo">Big <em>Spoon</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php">Home</a></li>
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
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>My <em>Profile</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
	<!-- ***** Profile Picture Start ***** -->
	<section class="section" id="trainers">
        <div class="container">
		<br>
		<br>
			<div class="row">
			<div class="trainer-item">
				<div class="left-icon">
					<img class="prof_pic" id="defPic" alt="">
				</div>
			</div>
				<div class="col-md-4">
					<div class="contact-form">
					  <form action="#" id="contact">
						<div class="form-group">
						<br>
							<h3 id="name"></h3>
							<br>
							<p><strong>Contact Num: </strong><p id="cnum"></p></p>
							<br>
							<p><strong>User ID: </strong><p id="uid"></p></p>						
						</div>
						<div class="row">
							<div class="col-md-6">
							</div>
						</div>
						<div class="main-button">
							<a href="edit_profile.php">Edit Profile</a>
						</div>
						<br>
					  </form>
					</div>
				</div>
					<div class="col-md-2">
					<br>
					<p><strong>Join Date: </strong><p id="joinDate"></p></p>
					<br>
					<p><strong>User Rating: </strong><h3 id="rating"></h3></p>
					</div>
			</div>
			
		</div>
    </section>
	<section class="section" id="trainers">
        <div class="container">
		<h2>User Reviews</h2>
		<div class="alert alert-dark" role="alert" id="emptyReview">
  			This user doesn't have any review with comments yet.
		</div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item" id="rate1" data-status="None">
                        <div class="down-content">
                            <span>
					<h4 id="stars1"></h4>
					<h4 style="display: inline;">"<p id="comment1" style="display: inline;"></p>"</h4>
					<p>Rated By: <a href="" id="rateFrom1"></a></p>
					<p id="rateDate1"></p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="rate2" data-status="None">
                        <div class="down-content">
                            <span>
					<h4 id="stars2"></h4>
					<h4 style="display: inline;">"<p id="comment2" style="display: inline;"></p>"</h4>
					<p>Rated By: <a href="" id="rateFrom2"></a></p>
					<p id="rateDate2"></p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="rate3" data-status="None">
                        <div class="down-content">
                            <span>
					<h4 id="stars3"></h4>
					<h4 style="display: inline;">"<p id="comment3" style="display: inline;"></p>"</h4>
					<p>Rated By: <a href="" id="rateFrom3"></a></p>
					<p id="rateDate3"></p>
                            </span>
                        </div>
                    </div>
                </div>
            <nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item">
                  <a class="page-link" id="prevBtn2" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item">
                  <a class="page-link" id="nxtBtn2" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
        </div>
    </section>

	<!-- ***** Profile Picture End ***** -->
	<div class="modal" tabindex="-1" role="dialog" id="deleteModal">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title">Confirm Action</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
       					</button>
      				</div>
      				<div class="modal-body">
        				<p>Doing this will delete your active post</p>
      				</div>
      				<div class="modal-footer">
        				<button type="button" id="deleteBtn" class="btn btn-primary">Delete Post</button>
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      				</div>
    			</div>
  		</div>
	</div>
    <!-- ***** Fleet Starts ***** --> 
    <section class="section" id="trainers">
        <div class="container">
	    <h2>Active Posts</h2>
	    <div id="emptyPost" style="display:none;">
            	<p>You currently have no active post, click <a href="post_food.php">here</a> to share a food!</p>
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
			</div>
                            <span>
								<h4 id="foodName1"></h4>
								<a id="postOwner1"></a>
                            </span>
				
				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category1"></label><br>
				<i class="fas fa-clock"></i><label id="post1"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location1"></label>
							
                            <p id="description1"></p>

                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="delBtn1">X Delete Post</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="food2" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" id="foodPic2" alt="">
                        </div>
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="postId2" style="display:none"></p>
			</div>
                            <span>
								<h4 id="foodName2"></h4>
								<a id="postOwner2"></a>
                            </span>
				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category2"></label><br>
				<i class="fas fa-clock"></i><label id="post2"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location2"></label>


                            <p id="description2"></p>

                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="delBtn2">X Delete Post</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="food3" data-status="None">
                        <div class="image-thumb">
                            <img class="food_pic" src="" id="foodPic3" alt="">
                        </div>
                        <div class="down-content">
                        <div class="hidden" id="hiddenData">
			<p id="postId3" style="display:none"></p>
			</div>
			<span>
								<h4 id="foodName3"></h4>
								<a id="postOwner3"></a>
                            </span>

				<br>
				<i class="fas fa-utensil-spoon"></i><label id="category3"></label><br>
				<i class="fas fa-clock"></i><label id="post3"></label><br>
				<i class="fas fa-map-marker-alt"></i><label id="location3"></label>

                            <p id="description3"></p>
				
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="delBtn3">X Delete Post</a></li>
                            </ul>
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
                <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
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
    <script src="getMyProfile.js"></script>   
  </body>
</html>
