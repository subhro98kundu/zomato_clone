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
	<div class="container mt-5">
		<?php
				session_start();
				//include("admin_sessionhandler.php");
				include("../includes/dbhelper.php");
				  if(array_key_exists('admin_user_id', $_SESSION)){
				    $is_admin_logged_in =1;
				    $res_id = $_SESSION['admin_res_id'];
				    $query = "SELECT * FROM restaurants WHERE restaurant_id = $res_id";
				    $result = mysqli_query($conn, $query);
				    $result = mysqli_fetch_assoc($result);
				    $name = $result['name'];
				    $address = $result['address'];
				    $res_img = $result['res_img'];

				  }else{
				    $is_admin_logged_in =0;
				    header('Location:index.php');
				  }
		?>

		<div class="modal fade" id="profileImgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Upload Restaurant Profile Image</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form action="update_res_img.php" method="POST" enctype="multipart/form-data">
		        	<small class="text-danger">* Image size must be less than 1.5 MB.</small><br><br>
		        	<input type="file" name="image" class="btn btn-light"><br>
					<input type="hidden" name="res_id" value="<?php echo($res_id); ?>"><br>
		        	<button type="submit" name="submit" class="btn btn-danger" style="float: right;">Upload</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

		<div class="row">
			<div class="col-8">
				<div class="col-4 ml-0 pl-0">
					<img src="<?php echo '../'.$res_img; ?>" style="width: 100%">
					<button class="btn btn-block btn-secondary" data-toggle="modal" data-target="#profileImgModal">Change Photo</button>
				</div>
				<h2 class="mt-3">Welcome to, <?php echo $name; ?></h2>
				<p><?php echo $address; ?></p>	
			</div>
			<div class="col-4">
				<div class="row">
					<div id="menu_no" class="col-4 p-3 text-white bg-dark" align="center">
						<h6>Menu</h6>
					</div>
					<div id="review_no" class="col-4 p-3 text-white bg-primary" align="center">
						<h6>Requests</h6>
					</div>
					<div id="pending_no" class="col-4 p-3 text-white bg-danger" align="center">
						<h6>Pending</h6>
					</div>
				</div>
			</div>
				
		</div>
		
		<hr>
		<div class="row mb-5">

			
			<div class="col-6" align="center">
				<h3>Order Requests</h3>
				<hr>
				
				<ul class="list-group">
				<?php 
					$query_orders = "SELECT * FROM orders WHERE res_id = $res_id AND status = '1'";
					$order_requests = mysqli_query($conn, $query_orders);
					$order_no = 0;

					while ($row = mysqli_fetch_assoc($order_requests)) {
						$order_no++;
						$order_id = $row['order_id'];
						$total = $row['amount'];
						$query_order_details = "SELECT * FROM order_details d JOIN menu m ON d.menu_id = m.menu_id WHERE d.order_id = '$order_id'";
						//echo $query_order_details;
						$order_details = mysqli_query($conn, $query_order_details);

						echo '
							  <li class="list-group-item mb-3" id="'.$order_id.'">
							  	<div>
							  		<h5>Order id: '.$order_id.'</h5><hr>';
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
							  		<button data-id="'.$order_id.'" class="btn btn-light btn-lg accept-btn">Accept</button><button class="btn btn-secondary btn-lg decline-btn" data-id="'.$order_id.'">Decline</button>
							  	</div>
							  </li>
						';

					}
					if ($order_no == 0) {
						echo '<h6 class="text-muted">You do not have any pending orders.</h6>';
					}
				?>
				  
				  
				</ul>	
			</div>
			<div class="col-6" align="center">
				<h3>Pending Orders</h3>
				<hr>
				<ul class="list-group">
				<?php 
					$query_orders = "SELECT * FROM orders WHERE res_id = $res_id AND status = '2'";
					$order_requests = mysqli_query($conn, $query_orders);
					$pending_order_no = 0;
					while ($row = mysqli_fetch_assoc($order_requests)) {
						$pending_order_no++;
						$order_id = $row['order_id'];
						$total = $row['amount'];
						$query_order_details = "SELECT * FROM order_details d JOIN menu m ON d.menu_id = m.menu_id WHERE d.order_id = '$order_id'";
						//echo $query_order_details;
						$order_details = mysqli_query($conn, $query_order_details);

						echo '
							  <li class="list-group-item mb-3" id="dispatch-'.$order_id.'">
							  	<div>
							  		<h5>Order id: '.$order_id.'</h5><hr>';
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
							  		<button data-id="'.$order_id.'" class="btn btn-danger btn-block dispatch-btn">Dispatch</button>
							  	</div>
							  </li>
						';

					}
					if ($pending_order_no == 0) {
						echo '<h6 class="text-muted">You do not have any pending orders.</h6>';
					}
				?>
				  
				  
				</ul>
			</div>
		</div>

		<hr>

		<div class="" align="center">
			<div class="col-8" align="center">
				<h3>Menu</h3>
				<hr class="mb-2">

				<ul class="list-group">
				<?php 
					$query_menu = "SELECT * FROM menu WHERE res_id = $res_id";
					$res_menu = mysqli_query($conn, $query_menu);
					$menu_no = 0;
					echo '<hr><button class="btn btn-block btn-dark" data-toggle="modal" data-target="#addMenuModal">Add Menu</button><hr>';
					while ($row_menu = mysqli_fetch_assoc($res_menu)) {
						$menu_no++;
						$menu_id = $row_menu['menu_id'];
						$menu_name = $row_menu['menu_name'];
						$menu_img = $row_menu['menu_img'];
						$menu_cuisine = $row_menu['cuisine'];
						$menu_description = $row_menu['description'];
						$menu_price = $row_menu['price'];
						$menu_votes = $row_menu['votes'];
						echo '
							  <li class="list-group-item mb-3" id="'.$menu_id.'">
							  	<div>
							  		<h5>Menu: '.$menu_no.'</h5><hr>
									  		<div class="row">
									  			<div class="col-4">
									  				<img src="../'.$menu_img.'" style="width:100%">
									  			</div>
									  			<div class="col-8">
									  				<h5>'.$menu_name.'</h5>
									  				<p class="text-muted">'.$menu_votes.' votes</p>
									  				<p class="text-muted">'.$menu_cuisine.' votes</p>
									  				<p class="text-muted">'.$menu_description.' votes</p>
									  				<p class="text-muted">'.$menu_price.' votes</p>
									  			</div>
									  		</div>	
							  			<hr>
							  		<button data-id="'.$menu_id.'" class="btn btn-danger btn-block remove-menu-btn">Remove</button>
							  	</div>
							  </li>
						';

					}
					
				?>
				  
				  
				</ul>

				<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Menu Details</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <form action="addmenu.php" method="POST" enctype="multipart/form-data">
				        	<input type="hidden" name="res_id" value="<?php echo($_SESSION['admin_res_id']); ?>">
				        	<input type="text" name="menu_name" class="form-control" placeholder="Menu Name"><br>
				        	<input type="number" name="price" class="form-control" placeholder="Price"><br>
				        	<input type="text" name="cuisine" class="form-control" placeholder="Cuisine"><br>
				        	<input type="text" name="description" class="form-control" placeholder="Menu Description (in short)"><br>
				        	<label>Upload Menu Image (Size < 900 KB)</label>
				        	<input type="file" name="image" class="form-control"><br><br>
				        	<button type="submit" name="submit" class="btn btn-danger btn-block">Add Menu Item</button>
				        </form>
				      </div>
				    </div>
				  </div>
				</div>

			</div>
		</div>
	</div>
</body>
</html>
<?php 
	
?>
<script type="text/javascript">
	$('.remove-menu-btn').click(function(){
		var menu_id = $(this).attr('data-id');
		$.ajax({
			url: `remove_menu.php?menu_id=${menu_id}`,
			method: 'GET',
			success: function(data){
				$('#'+menu_id).remove();
				//console.log(data);
			},
			error: function(error){
				alert('Sorry, some error occured!! Try again.');
			}
		})
	})
	$('.accept-btn').click(function(){
		var order_id = $(this).attr('data-id');
		$.ajax({
			url: `order_accepted.php?order_id=${order_id}`,
			method: 'GET',
			success: function(data){
				$('#'+order_id).remove();
				location.reload();
				console.log(data);

			},
			error: function(error){
				alert('Sorry, unable to complete your request. Please try again.');
			}
		})
	})
	$('.decline-btn').click(function(){
		var order_id = $(this).attr('data-id');
		$.ajax({
			url: `order_declined.php?order_id=${order_id}`,
			method: 'GET',
			success: function(data){
				$('#'+order_id).remove();
				//location.reload();
				//console.log(data);

			},
			error: function(error){
				alert('Sorry, unable to complete your request. Please try again.');
			}
		})
	})
	$('.dispatch-btn').click(function(){
		var order_id = $(this).attr('data-id');
		$.ajax({
			url: `order_dispatched.php?order_id=${order_id}`,
			method: 'GET',
			success: function(data){
				$('#dispatch-'+order_id).remove();
				//location.reload();
				//console.log(data);

			},
			error: function(error){
				alert('Sorry, unable to complete your request. Please try again.');
			}
		})
	})
	$(document).ready(function(){
		//alert('ready');
		$('#menu_no').append('<h5>'+<?php echo($menu_no); ?>+'</h5>');
		$('#review_no').append('<h5>'+<?php echo($order_no); ?>+'</h5>');
		$('#pending_no').append('<h5>'+<?php echo($pending_order_no); ?>+'</h5>');
	})
</script>