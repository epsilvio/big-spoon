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
               		<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Settings</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" id="cpBtn" href="#">Update Credentials</a>
                                    <a class="dropdown-item" id="logoutBtn" href="#">Logout</a>
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
	<div class="modal fade" id="cpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
      				<div class="modal-body" id="cpContent">
					<center>
					<i class="fas fa-user" color="white"></i>
					<input type="username" id = "username" placeholder="">
					<br>
      					<i class="fas fa-key"></i>
					<input type="password" id = "password" placeholder="Current Password">
					<br>
					<br>
					<br>
      					<i class="fas fa-key"></i>
					<input type="password" id = "nPass1" placeholder="New Pass">
					<br>
      					<i class="fas fa-key"></i>
					<input type="password" id = "nPass2" placeholder="Confirm New Pass">
					</center>
				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				<button type="button" id="cpSave" class="btn btn-primary">Update Password</button>
      				</div>
    			</div>
  		</div>
	</div>
	<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLongTitle">User Reports</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
				<div class="alert alert-warning" role="alert" id="emptyRep">
  					There are currently no user reports to manage.
				</div>
      				<div class="modal-body" id="reportContent">
      					
				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				<button type="button" id="repSave" class="btn btn-primary">Save changes</button>
      				</div>
    			</div>
  		</div>
	</div>
	<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLongTitle">Posted Foods</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
				<div class="alert alert-warning" role="alert" id="emptyPost">
  					There are currently no posted foods to manage.
				</div>
      				<div class="modal-body" id="postContent">
      			
				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				<button type="button" id="postSave" class="btn btn-primary">Save changes</button>
      				</div>
    			</div>
  		</div>
	</div>
	<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h5 class="modal-title" id="exampleModalLongTitle">User Accounts</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          					<span aria-hidden="true">&times;</span>
        				</button>
      				</div>
				<div class="alert alert-warning" role="alert" id="emptyAcc">
  					There are currently no user accounts to manage.
				</div>
      				<div class="modal-body" id="accContent">
      			
				</div>
      				<div class="modal-footer">
        				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        				<button type="button" id="accSave" class="btn btn-primary">Save changes</button>
      				</div>
    			</div>
  		</div>
	</div>
    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/4.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Admin <em>Dashboard</em></h2>
                        <p id="upTime"></p>
                    </div>
                </div>
            </div>
        </div>
	<center>
	<div class="row-admin">
  		<div class="col-4" id="navMenus">
    			<div class="list-group" id="list-tab" role="tablist">
      				<a class="list-group-item list-group-item-action" id="reportBtn" data-toggle="list" href="#list-home" role="tab">Review User Reports
					<span class="badge badge-primary badge-pill" id="reportPill">0</span>
				</a>
      				<a class="list-group-item list-group-item-action" id="postBtn" data-toggle="list" href="#list-profile" role="tab">Manage Posted Foods
					<span class="badge badge-primary badge-pill" id="postPill">0</span>
				</a>
      				<a class="list-group-item list-group-item-action" id="accountBtn" data-toggle="list" href="#list-settings" role="tab">Manage Registered Accounts
					<span class="badge badge-primary badge-pill" id="accPill">0</span>
				</a>
    			</div>
  		</div>
	</div>
	</center>
    </section>
    <!-- ***** Call to Action End ***** -->
	
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
    <script src="admin.js"></script>     

  </body>
</html>
