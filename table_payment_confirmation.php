<?php 
include("includes/dbhelper.php");
session_start();
$payment_method = $_POST['payment'];
$order_id = $_POST['id'];
$user_id = $_SESSION['user_id'];
$query = "UPDATE tablebooking SET status = 1 WHERE booking_id = '$order_id'";
if($payment_method == 'Debit Card'){
if(mysqli_query($conn,$query)){
			header('Location:success_page_table.php?id='.$order_id);
}else{
		header('Location:table_payment.php?error=0&id='.$orde_id);
}
}
?>