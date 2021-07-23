<?php 
	include("admin_sessionhandler.php");
	if($is_admin_logged_in){
		header('Location:admin_home.php');
	}
?>
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
		<form action="adminlogin.php" method="POST">
			<label>Admin User Id</label><br>
			<input type="text" name="admin_id" class="form-control">
			<label>Password</label><br>
			<input type="password" name="admin_password" class="form-control"><br>
			<input type="submit" name="" value="Log In" class="btn btn-danger btn-block">
			<br>
			<hr>
			Sign up here as <a href="adminsignuppage.php">admin.</a>
		</form>
	</div>
</body>
</html>
<?php  
	if (array_key_exists('error', $_GET)) {
		echo "<script>alert('Invalid Credentials');</script>";
	}
?>