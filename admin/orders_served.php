<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

	<nav class="navbar bg-danger p-2 text-white">
		<h2 class="nav-header">zomato Admin</h2>
		<span>
		<span class="mr-3"><a style="font-size: 20px;" class="btn btn-danger btn-lg text-white" href="admin_home.php">Home</a></span>
		<span class="mr-3"><a style="font-size: 20px;" class="btn btn-danger btn-lg text-white" href="orders_served.php">Orders Served</a></span>
		<span class="mr-3"><a style="font-size: 20px;" class="btn btn-danger btn-lg text-white" href="table_booking.php">Table Booking</a></span>
		<span class="mr-3"><a style="font-size: 20px;" class="btn btn-danger btn-lg text-white" href="../logout.php">Logout</a></span>
		</span>
	</nav>
<?php  
	include("../includes/dbhelper.php");
	include("admin_sessionhandler.php");
	if($is_admin_logged_in == 0){
		header('Location:../index.php');
		exit();
	}
?>



<div class="container pb-5 bg-light">
	<div class="container" style="width: 50%;">
		<h2 class="text-black mb-3 pt-5" style="font-family: verdana;"><b>My Orders</b></h2>
		<div class="col-12" align="center">
				<hr>
				
				<ul class="list-group">
				<?php 
					$admin_res_id = $_SESSION['admin_res_id'];
					$query_orders = "SELECT * FROM orders WHERE res_id = $admin_res_id AND status LIKE 'Delivered!'";
					$order_requests = mysqli_query($conn, $query_orders);
					$order_no = 0;

					while ($row = mysqli_fetch_assoc($order_requests)) {
						$order_no++;
						$order_id = $row['order_id'];
						$total = $row['amount'];
						$res_id = $row['res_id'];
						$res_name_query = "SELECT * FROM restaurants WHERE restaurant_id = $res_id";
						$res_name = mysqli_fetch_assoc(mysqli_query($conn, $res_name_query))['name'];
						$query_order_details = "SELECT * FROM order_details d JOIN menu m ON d.menu_id = m.menu_id WHERE d.order_id = '$order_id'";
						//echo $query_order_details;
						$order_details = mysqli_query($conn, $query_order_details);

						echo '
							  <li class="list-group-item mb-3 bg-dark text-white" id="'.$order_id.'" style="border-radius:20px;">
							  	<div>
							  		<h5>Order id: '.$order_id.'</h5><h4>'.$res_name.'</h4><hr>';
							  		while ($row_1 = mysqli_fetch_assoc($order_details)) {
							  			$item_name = $row_1['menu_name'];
							  			$quantity = $row_1['quantity'];
							  			echo '
									  		<div class="row">
									  			<div class="col-8">
									  				<p>'.$item_name.'</p>
									  			</div>
									  			<div class="col-4">
									  				<p>X '.$quantity.'</p>
									  			</div>
									  		</div>	
							  			';
							  		}
							  		
							  		echo '<hr><h6>Total: Rs. '.$total.'</h6>
							  		<h6>Status: <span class="text-success">Delivered</span></h6>
							  	</div>
							  </li>
						';

					}
					if ($order_no == 0) {
						echo '<h6 class="text-muted">You do not have any orders.</h6>';
					}
				?>
			</ul>
		</div>
		
		
	</div>
	
</div>