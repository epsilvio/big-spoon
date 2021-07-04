<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<title>Big Spoon | Notifications</title>
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
                            <li><a href="home.php">Home</a></li>
                            <li><a href="help_us.php">Help us</a></li>
                            <li><a href="about_us.php">About</a></li>
			    <li><a href="post_food.php">Share your food</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="my_profile.php">My Profile</a>
				    <a class="dropdown-item" href="">Notifications</a>
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
                        <h2>Your <em>Notifications</em></h2>
                        <p id="upTime"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
	<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="emptyNotif" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered">
    			<div class="modal-content">
      				<center><p>You currently have no notifications. Please come back later or click <a href="post_food.php">here</a> to share a food!</p></center>
    			</div>
  		</div>
	</div>
	<div class="modal fade" id="rateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  		<div class="modal-dialog modal-dialog-centered" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
       					<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
       					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
        				<form>
  						<fieldset>
    							<span class="star-cb-group" id="ratingStar">
								<label for="message-text" class="col-form-label">Rating:</label><br>
       								<input type="radio" class="fas fa-star" name="rating" value="1"/><label for="rating-1"> 1</label>
      								<input type="radio" class="fas fa-star" name="rating" value="2"/><label for="rating-2"> 2</label>
      								<input type="radio" class="fas fa-star" name="rating" value="3"/><label for="rating-3"> 3</label>
      								<input type="radio" class="fas fa-star" name="rating" value="4"/><label for="rating-4"> 4</label>
      								<input type="radio" class="fas fa-star" name="rating" value="5"/><label for="rating-5"> 5</label>
    							</span>
  						</fieldset>
						<div class="form-group">
            						<label for="message-text" class="col-form-label">Comment/s (Optional):</label>
            						<textarea class="form-control" id="ratingComm" placeholder="255 Maximum Characters"></textarea>
          					</div>
					</form>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				<button type="button" id="rateBtn" class="btn btn-primary">Submit Rating</button>
      				</div>
    			</div>
 		</div>
	</div>
	<div class="modal" tabindex="-1" role="dialog" id="confirmAction">
		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title">Confirm Response</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body">
        				<p id="notifAction">Choosing this action will </p>
      				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-primary" id="confirmBtn">Confirm</button>
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      				</div>
    			</div>
  		</div>
	</div>

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>

            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item" id="notif1" data-status="None">
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="notifId1" style="display:none"></p>
			<p id="postId1" style="display:none"></p>
			<p id="senderId1" style="display:none"></p>
			</div>
                            <span>
								<h4 id="notifName1"></h4>
								<p id="notifType1"><a href="" id="notifSender1"></a></p>
								<p id="notifDate1"></p>

                            </span>
	
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="acceptBtn1">+ Accept</a></li>
				<li><a href="javascript:void(0)" id="rejectBtn1">- Reject</a></li>
				<li><a href="javascript:void(0)" id="rateBtn1">Rate User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="notif2" data-status="None">
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="notifId2" style="display:none"></p>
			<p id="postId2" style="display:none"></p>
			<p id="senderId2" style="display:none"></p>
			</div>
                            <span>
								<h4 id="notifName2"></h4>
								<p id="notifType2"><a href="" id="notifSender2"></a></p>
								<p id="notifDate2"></p>

                            </span>
	
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="acceptBtn2">+ Accept</a></li>
				<li><a href="javascript:void(0)" id="rejectBtn2">- Reject</a></li>
				<li><a href="javascript:void(0)" id="rateBtn2">Rate User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="notif3" data-status="None">
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="notifId3" style="display:none"></p>
			<p id="postId3" style="display:none"></p>
			<p id="senderId3" style="display:none"></p>
			</div>
                            <span>
								<h4 id="notifName3"></h4>
								<p id="notifType3"><a href="" id="notifSender3"></a></p>
								<p id="notifDate3"></p>
                            </span>
	
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="acceptBtn3">+ Accept</a></li>
				<li><a href="javascript:void(0)" id="rejectBtn3">- Reject</a></li>
				<li><a href="javascript:void(0)" id="rateBtn3">Rate User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="trainer-item" id="notif4" data-status="None">
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="notifId4" style="display:none"></p>
			<p id="postId4" style="display:none"></p>
			<p id="senderId4" style="display:none"></p>
			</div>
                            <span>
								<h4 id="notifName4"></h4>
								<p id="notifType4"><a href="" id="notifSender4"></a></p>
								<p id="notifDate4"></p>

                            </span>
	
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="acceptBtn4">+ Accept</a></li>
				<li><a href="javascript:void(0)" id="rejectBtn4">- Reject</a></li>
				<li><a href="javascript:void(0)" id="rateBtn4">Rate User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="notif5" data-status="None">
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="notifId5" style="display:none"></p>
			<p id="postId5" style="display:none"></p>
			<p id="senderId5" style="display:none"></p>
			</div>
                            <span>
								<h4 id="notifName5"></h4>
								<p id="notifType5"><a href="" id="notifSender5"></a></p>
								<p id="notifDate5"></p>
                            </span>
	
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="acceptBtn5">+ Accept</a></li>
				<li><a href="javascript:void(0)" id="rejectBtn5">- Reject</a></li>
				<li><a href="javascript:void(0)" id="rateBtn5">Rate User</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item" id="notif6" data-status="None">
                        <div class="down-content">
			<div class="hidden" id="hiddenData">
			<p id="notifId6" style="display:none"></p>
			<p id="postId6" style="display:none"></p>
			<p id="senderId6" style="display:none"></p>
			</div>
                            <span>
								<h4 id="notifName6"></h4>
								<p id="notifType6"><a href="" id="notifSender6"></a></p>
								<p id="notifDate6"></p>
                            </span>
	
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)" id="acceptBtn6">+ Accept</a></li>
				<li><a href="javascript:void(0)" id="rejectBtn6">- Reject</a></li>
				<li><a href="javascript:void(0)" id="rateBtn6">Rate User</a></li>
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
    <script src="notifications.js"></script>
    </body>
</html>

