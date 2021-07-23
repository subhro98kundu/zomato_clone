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
 	<form action="table_payment_confirmation.php" method="post">
 		<input type="radio" name="payment" required="true" value="Debit Card" class="mr-3">Debit Card<br><br><br>
 		<hr>
 		<input type="hidden" name="id" value="<?php echo($_GET['id']); ?>"><br>
 		<input type="submit" name="" class="btn btn-danger btn-lg mb-5" value="Proceed to Pay" style="float: right;">
 		
 	</form>
 </div>

</body>
</html>