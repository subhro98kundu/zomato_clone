<?php 
include("includes/dbhelper.php");
include("includes/sessionhandler.php");

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Zomato</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
	<nav class="container navbar bg-nav">
		<div class="row" style="width: 100%;">
			<div class="col-3">
				<h2 style="font-family: verdana;"><b><i>zomato</i></b></h2>
			</div>
			<div class="col-6" style="padding: 0px;">
				<div class="row" style="border: 1px solid #ccc; border-radius: 5px; box-shadow: 2px 2px 5px #999;">
					<div class="col-4 dropdown" style="display: inline-block; padding: 0px;">
			  			<button class="btn btn-light btn-lg dropdown-toggle" type="button" data-toggle="dropdown" style="width: 100%;">Kolkata
			  			<span class="caret"></span></button>
			  			<ul class="dropdown-menu">
			    			<li><a href="index.php">Kolkata</a></li>
			  			</ul>
					</div>
					<div class="col-8" style="display: inline-block; padding: 0px;">
						<form action="search.php" method="POST" onsubmit="e.preventDefault();">
						<input class="form-control" type="text" name="search" placeholder="Search restaurants." style="display: inline-block; width: 100%; height: 47.6px;">
						</form>
					</div>
				</div>
			</div>
			<?php 
				if ($is_logged_in) {
					echo '<div class="col-3" align="center" style="font-size: 20px;">
							<div class="dropdown">
							  <button class="btn btn-danger dropdown-toggle mt-2" style="border-radius:10px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i>
							    '.$name_arr[0].'</i></button>
							  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							  	<a class="dropdown-item" href="index.php">Home</a>
							    <a class="dropdown-item" href="show_bookmarks.php">My Bookmarks</a>
							    <a class="dropdown-item" href="display_orders.php">Orders</a>
							    <a class="dropdown-item" href="settings.php">Account Settings</a>
							    <a class="dropdown-item" href="logout.php">Log Out</a>
							  </div>
							</div>
						</div>';
				}else{
					echo'
					<div class="col-3" align="center" style="font-size: 20px;">
						<a href="#" class="mr-3" data-toggle="modal" data-target="#signInModal" style="display: inline-block;">
		      				<span class="text-muted">Sign Up</span>
		      			</a>
		      			<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header pt-4 pl-4">
						        <h3 class="modal-title" id="exampleModalLabel">Sign Up</h3>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body p-4">
						        <form action="register.php" method="POST">
						        	<input class="form-control mb-4" style="height: 50px; font-size: 20px;" type="text" required="true" name="name" placeholder="Full Name">
						        	<input class="form-control mb-4" style="height: 50px; font-size: 20px;" type="email" required="true" name="email" placeholder="abc@xyz.com">
						        	<input class="form-control mb-4" style="height: 50px; font-size: 20px;" type="password" required="true" name="password" placeholder="Password">
						        	<input class="btn btn-secondary btn-block" style="height: 50px; font-size: 18px;" type="submit" name="" value="Create Account">
						        </form>
						      </div>
						      <div class="modal-footer">
						        <p class="text-muted" style="font-size: 16px;">Already have an account? <a href="index.php">Sign In</a>.</p>
						      </div>
						    </div>
						  </div>
						</div>
		      			<a href="#" style="display: inline-block;"  data-toggle="modal" data-target="#logInModal">
		      				<span class="text-muted">Log In</span>
		    			</a>
		    			<div class="modal fade" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header pt-4 pl-4">
						        <h3 class="modal-title" id="exampleModalLabel">Log In</h3>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body p-4">
						        <form action="login.php" method="POST">
						        	<input class="form-control mb-4" style="height: 50px; font-size: 20px;" type="email" required="true" name="email" placeholder="abc@xyz.com">
						        	<input class="form-control mb-4" style="height: 50px; font-size: 20px;" type="password" required="true" name="password" placeholder="Password">
						        	<input class="btn btn-secondary btn-block" style="height: 50px; font-size: 18px;" type="submit" name="" value="Log In">
						        </form>
						      </div>
						      <div class="modal-footer">
						        <p class="text-muted" style="font-size: 16px;">Do not have an account? <a href="index.php">Sign Up</a>.</p>
						      </div>
						    </div>
						  </div>
						</div>
				</div>
					';	
				}
			 ?>
			
		</div>
		
	</nav>