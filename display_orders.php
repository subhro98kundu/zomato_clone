<?php  
include("includes/header.php");
include("includes/dbhelper.php");
include("includes/cart_status.php");
if ($is_logged_in == 0) {
	echo "<div class='container'><h1>You are not logged in!!</h1></div>";
	exit();
}
?>
<hr>
<div class="container pb-5 bg-light">
	<div class="container" style="width: 50%;">
		<h2 class="text-black mb-3 pt-5" style="font-family: verdana;"><b>My Orders</b></h2>
		<div class="col-12" align="center">
				<hr>
				
				<ul class="list-group">
				<?php 
					$user_id = $_SESSION['user_id'];
					$query_orders = "SELECT * FROM orders WHERE user_id = $user_id";
					$order_requests = mysqli_query($conn, $query_orders);
					$order_no = 0;

					while ($row = mysqli_fetch_assoc($order_requests)) {
						$status = $row['status'];
						if($status == '1' or $status == '2'){
							$status = ($status == '1')? 'Waiting for Confirmation from Restaurant' : 'Confirmed. Preparing for dispatch.';
						}
						if ($status == '-1') {
							$status = 'Declined/Cancelled';
						}
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
							  		<p class="text-success">Status: '.$status.'</p>
							  		<a href="order_again.php?res_id='.$res_id.'&order_id='.$order_id.'" class="btn btn-danger btn-lg reorder-btn" data-id="'.$order_id.'">Order Again</a>
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
</body>
</html>
<style type="text/css">
	hr{
		border-top: 1px solid #ccc;
	}
</style>
<script type="text/javascript">
	$('.remove').click(function(){
		var res_id = $(this).attr('data-id');
		$.ajax({
			url: 'remove_bookmark.php?res_id='+res_id,
			method: 'GET',
			success: function(data){
				$('#'+res_id).remove();
			},
			error: function(error){
				alert('Something wrong occured. Try again.');
			}
		})
	})
</script>
<?php  
if (array_key_exists('error', $_GET)) {
	if($_GET['error'] == 100){
		echo('<script>alert("Empty your cart to order again!");</script>');
	}else{
		echo('<script>alert("Some error occured. Try again.");</script>'); 
	}
}
?>