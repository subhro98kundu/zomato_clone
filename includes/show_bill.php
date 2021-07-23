<?php 
$order_id=$_GET['order_id']; 
$query_bill = "SELECT * FROM order_details d JOIN menu m ON d.menu_id=m.menu_id WHERE d.order_id = '$order_id'";
$result_bill = mysqli_query($conn, $query_bill);
$counter = 1;
while($row = mysqli_fetch_assoc($result_bill)){
	echo '
		<div class="row">
			<div class="col-10">
				<h5>'.$counter.'. '.$row['menu_name'].' </h5>		
			</div>
			<div class="col-2">
				<p>'.$row['quantity'].'</p>
			</div>
		</div>
	';
	$counter++;
}
?>

