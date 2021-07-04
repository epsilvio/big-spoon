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
                        <h2>View <em>Profile</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
	<!-- ***** Profile Picture Start ***** -->
	<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
       					<h5 class="modal-title" id="exampleModalLongTitle">Report User</h5>
       					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
        				<form>
						<div class="alert alert-danger" role="alert" id="reportErr">
  							Please select the reason for report!
						</div>
  						<fieldset>
    							<span class="star-cb-group" id="ratingStar">
								<label for="message-text" class="col-form-label">Report this user for:</label><br>
       								<input type="radio" name="report" value="Spoilage/Contamination"/><label for="rating-1"><p>&nbsp;Spoiled/Contaminated Food</p></label>
								<br>
      								<input type="radio" name="report" value="Catfishing"/><label for="rating-2"><p>&nbsp;Catfishing</p></label>
								<br>
      								<input type="radio" name="report" value="Fraud"/><label for="rating-3"><p>&nbsp;Fraud</p></label>
								<br>
      								<input type="radio" name="report" value="Inappropriate Post"/><label for="rating-4"><p>&nbsp;Inappropriate Post</p></label>
								<br>
      								<input type="radio" name="report" value="Others"/><label for="rating-5"><p>&nbsp;Others</p></label>
    							</span>
  						</fieldset>
						<div class="form-group">
            						<label for="message-text" class="col-form-label">Explain to us what happened:</label>
            						<textarea class="form-control" id="reportComm" placeholder="255 Maximum Characters"></textarea>
          					</div>
					</form>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				<button type="button" id="submitBtn" class="btn btn-primary">Submit Report</button>
      				</div>
    			</div>
 		</div>
	</div>

	<section class="section" id="trainers">
        <div class="container">
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
							<p><strong>Contact Num:</strong><p id="cnum"></p></p>					
						</div>
						<div class="row">
							<div class="col-md-6">
							</div>
						</div>
						<br>
						<div class="main-button">
							<a href="#" id="reportBtn">Report User</a>
						</div>
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
	<!-- ***** User Feeback ***** -->
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
<!-- ***** Active Posts ***** -->
    
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
    <script src="getProfile.js"></script>   
  </body>
</html>
