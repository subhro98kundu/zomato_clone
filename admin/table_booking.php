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

			<div class="container mt-5" align="center">
				<h3>Table Booking Requests</h3>
				<hr>
				
				<ul class="list-group">
				<?php 
					$res_id = $_SESSION['admin_res_id'];
					$query_orders = "SELECT * FROM tablebooking t JOIN users u ON t.user_id = u.user_id  WHERE res_id = $res_id AND status = 1";
					$order_requests = mysqli_query($conn, $query_orders);
					$order_no = 0;

					while ($row = mysqli_fetch_assoc($order_requests)) {
						$order_no++;
						$booking_id = $row['booking_id'];
						$total = $row['total'];
						$inthenameof = $row['inthenameof'];
						$book_no = $row['id'];
						$num_tables = $row['table_no'];
						$timing = $row['timing'];
						$user_name = $row['name'];
						$duration = $row['duration'];

						//echo $query_order_details;
						
						echo '
							  <li class="list-group-item mb-3" id="'.$book_no.'">
							  	<div>
							  		<h5>Booking id: '.$booking_id.'</h5><hr>
							  		<p>Reserved in the name of:<b> '.$inthenameof.',</b> by '.$user_name.'</p>
							  		<p>No of tables:'.$num_tables.'</p>
							  		<p>Timing: '.$timing.'</p>
							  		<p>Duration: '.$duration.'</p>
							  		';
							  		
							  		
							  		echo '<hr><h6>Total: Rs. '.$total.'</h6>
							  		<button data-id="'.$book_no.'" class="btn btn-danger btn-block accept-btn">Accept</button><button class="btn btn-secondary btn-block decline-btn" data-id="'.$book_no.'">Decline</button>
							  	</div>
							  </li>
						';

					}
					if ($order_no == 0) {
						echo '<h6 class="text-muted">You do not have any requests for table booking.</h6>';
					}
				?>
				  
				  
				</ul>	
			</div>

</body>
</html>
<script type="text/javascript">
	$('.accept-btn').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: `booking_accepted.php?id=${id}`,
			method: 'GET',
			success: function(data){
				$('#'+id).remove();
				location.reload();
				//console.log(data);

			},
			error: function(error){
				alert('Sorry, unable to complete your request. Please try again.');
			}
		})
	})
	$('.decline-btn').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			url: `booking_declined.php?id=${id}`,
			method: 'GET',
			success: function(data){
				$('#'+id).remove();
				//location.reload();
				//console.log(data);

			},
			error: function(error){
				alert('Sorry, unable to complete your request. Please try again.');
			}
		})
	})
</script>