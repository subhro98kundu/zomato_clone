<?php
	include("includes/header.php");
	if ($is_logged_in == 0) {
		header('Location:index.php');
		exit();
 	}	
?>

<?php
 include("includes/dbhelper.php");
 	
 
 ?>

 <div class="container mt-5">
 	<h1 class="mt-5 mb-4 text-danger">Select Payment Mode</h1>
 	<hr>
 	<form action="payment_confirmation.php" method="post">
 		<input type="radio" name="payment" value="Credit Card" class="mr-3">Credit Card<br><br><br>
 		<hr>
 		<input type="radio" name="payment" value="Debit Card" class="mr-3">Debit Card<br><br><br>
 		<hr>
 		<input type="radio" name="payment" value="UPI" class="mr-3">UPI<br><br><br>
 		<hr>
 		<input type="radio" name="payment" value="Net Banking" class="mr-3">Net Banking<br><br><br>
 		<hr>

 		<input type="radio" name="payment" value="Cash on Delivery" class="mr-3">Cash on Delivery<br><br>

 		<input type="hidden" name="order_id" value="<?php echo($_GET['order_id']); ?>"><br>
 		<input type="submit" name="" class="btn btn-danger btn-lg mb-5" value="Proceed to Pay" style="float: right;">
 		
 	</form>
 </div>

</body>
</html>