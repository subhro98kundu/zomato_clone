<?php
	include("includes/header.php");
	if(empty($_SESSION)){
		header('Location:index.php');
	}else{
		$is_logged_in = 1;
		$user_id = $_SESSION['user_id'];
		//echo $user_id;
	}
	
?>

<?php
 include("includes/dbhelper.php");
 
 ?>

 <div class="container">
 	<div class="row">
 		<div class="col-6">
 			<h2 class="mb-5 mt-5 text-danger"><b>Your Addresses</b></h2>
 			<form action="update_order_address.php" method="POST">
 			<?php 
 				$query = "SELECT * FROM address WHERE user_id = $user_id";
 				$result = mysqli_query($conn, $query);
 				$count = 0;
 				while ($row = mysqli_fetch_assoc($result)) {
 					echo '<p><input type="radio" name="address" value='.$row['address_id'].' class="mr-3">
			 			 	'.$row['street_address'].' 
			 			 	'.$row['landmark'].'<br>
			 			 	'.$row['city'].', '.$row['state'].' - 
			 			 	'.$row['pin'].'<br>
			 			 	'.$row['contact_number'].'
			 			 </p>';
			 			 $count++;

 				}
 				if($count){
 				echo '<input type="hidden" name="order_id" value="'.$_GET['order_id'].'">
 					<input type="submit" class="btn btn-danger btn-lg" value="Make Payment" style="float: right;">;
 				';
 				}else{
 					echo "<h4>Sorry, you do not have any saved addresses. Click on the button to add new address.</h4>";
 				}

 			 ?>

 			</form>
 			<button class="btn btn-danger btn-lg mt-5" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus text-white"></i> Add New Address</button>

			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="add_address.php" method="POST">
			        	<label>Street Address</label>
			        	<textarea name="street_address" class="form-control"></textarea><br>
			        	<label>Landmark</label>
			        	<textarea class="form-control" name="landmark"></textarea>
			        	<label>City</label>
			        	<input  class="form-control" type="text" name="city">
			        	<label>State</label>
			        	<input class="form-control" type="text" name="state"><br>
			        	<label>Pin</label>
			        	<input class="form-control" type="text" name="pin"><br>
			        	<label>Contact Number</label>
			        	<input class="form-control" type="text" name="contact_number"><br>
			        	<?php echo '<input type="hidden" name="order_id" value="'.$_GET['order_id'].'">'; ?>
			        	<input type="submit" value="Add Address" class="btn btn-primary btn-lg" name="">
			        </form>
			      </div>
			    </div>
			  </div>
			</div>
 		</div>
 		<div class="col-6">
 			<div class="container ml-5 mt-5">
 				<h2 class="text-danger mb-5">Order Details</h2>
	 			<?php  
	 				include("includes/show_bill.php");
	 			?>
 			</div>
 			
 		</div>
 	</div>
 </div>