<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Big Spoon | Share your food</title>

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
                            <li><a href="help_us.php">Help us</a></li>
                            <li><a href="about_us.php">About</a></li>
			    <li><a href="" class="active">Share your food</a></li>
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
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/3.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Share your food today with Big<em>Spoon</em></h2>
                        <p>It takes less than a minute to feed the hungry</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
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
        				<p>Do you wish to post your food?</p>
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
						<p>&#25; Post name is not blank<br>&#25; Location is not blank.<br>&#25; Description is not blank.</p>
      					</div>
      					<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     					</div>
    				</div>
    			</div>
  		</div>
	</div>

    <!-- ***** Fleet Starts ***** -->
    <section class="section">
        <div class="container">
            <br>
          
              <div class="col-md-4">
                <div class="contact-form">
                  <form action="" id="contact">
                    <div class="form-group">
                      <label>Big Spoon is committed to reducing food waste and sharing food with the hungry, forming strong interpersonal bonds in the process.</label>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label>Item name</label>
                        <input type="text" id="foodName" placeholder="ex. 'adobo'">
                      </div>
                    </div>
					
					<label>Food Category</label><br>
					  <select name="food_category" id="foodCategory">
						<option value="Viand">Food - Viands</option>
						<option value="Instant Meal">Food - Instant Meal</option>
						<option value="Vegetarian">Food - Vegetarian</option>
						<option value="Dessert">Food - Dessert</option>
						<option value="Breakfast">Food - Breakfast</option>
						<option value="Others">Food - Others</option>
						<option value="Water">Drinks - Mineral / Distilled Water</option>
						<option value="Soda">Drinks - Soda</option>
						<option value="Dairy">Drinks - Dairy</option>
						<option value="Juice">Drinks - Juice</option>
						<option value="Others">Drinks - Others</option>
						
					  </select>	
					
                    <div class="row">
                      <div class="col-md-6">
					  <br>
                        <label>Description</label>
						<form action="">
						  <textarea name="message" id="foodDesc" rows="10" cols="30" placeholder="(250 Characters Max.)"></textarea>
						</form>
                      </div>
                    </div>
					
					<div class="row">
                      <div class="col-md-6">
                        <label>Location</label>

                        <input type="text" id="foodLoc" placeholder="ex. 'Parañaque'">
                      </div>
                    </div>		
			<br>						
			<form action="">
			<label for="img">Select image (16:9 Recommended Ratio):</label>
			<input type="file" id="img-food" name="img" accept="image/*">
			</form>
			<div class="alert alert-success" role="alert">
  				Due to limited server storage, you can only post 1 image per food so <strong>choose the best one!</strong>
			</div>							
			<div>
			<p>By submitting this form, you state that you have read and agreed to Big Spoon's <a href="eula.php">Terms and Condition</a>.</p>
			</div>
                    <div class="main-button">
                        <a id="postBtn" href="#">Share now</a>
                    </div>
                  </form>
                </div>
                <br>
              </div>
            </div>
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
		<br><input type="hidden" id="uid"></input>
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
    <script src="post_food.js"></script>
  </body>
</html>
