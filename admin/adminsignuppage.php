<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
	<nav class="nav-bar bg-danger p-2 text-white">
		<h2>zomato Admin</h2>
	</nav>
	<div class="container mt-5" style="max-width: 30%">
		<h3>Sign Up</h3><br>
		<form action="adminsignup.php" method="POST">
			<label>Admin User Id</label><br>
			<input type="text" name="admin_id" class="form-control">
			<label>Restaurant Name</label><br>
			<input type="text" name="restaurant_name" class="form-control">
			<label>Address</label><br>
			<input type="text" name="restaurant_address" class="form-control">
			<label>Cuisines</label><br>
			<input type="text" name="restaurant_cuisine" class="form-control">
			<label>Cost per people</label><br>
			<input type="number" name="restaurant_cost" class="form-control">
			<label>Night Life allowed?</label><br>
			<input type="radio" name="nightlife" class="" value="1">Yes
			<input type="radio" name="nightlife" class="" value="0">No<br><br>
			<label>Dining allowed?</label><br>
			<input type="radio" name="dining" class="" value="1">Yes
			<input type="radio" name="dining" class="" value="0">No<br><br>
			<label>Email Id</label>
			<input type="email" name="admin_email" class="form-control">
			<label>Password</label><br>
			<input type="password" name="admin_password" class="form-control"><br>
			<label>Timing</label>
			<input type="text" name="timing" placeholder="10:00 AM - 10:00 PM (MON-SUN)" value="10:00 AM - 10:00 PM (MON-SUN)" class="form-control"><br>
			<input type="submit" name="" value="Register" class="btn btn-danger btn-block">
			<br>
			<hr>
			Log In here as <a href="index.php">admin.</a>
		</form>
	</div>
</body>
</html>
<?php 
	if(array_key_exists('error', $_GET)){
		$error = $_GET['error'];
		if ($error = 1) {
			echo "<script>alert('Admin ID already exists.');</script>";
		}else{
			echo "<script>alert('Some error occured. Try again.');</script>";
		}
	}
?>