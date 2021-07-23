<?php

include('includes/sessionhandler.php');
include("includes/dbhelper.php");
if($is_logged_in==0){
	header('Location:index.php');
}
date_default_timezone_set('Asia/Kolkata');

// add a new row to orders table
// 1. generate order id
$order_id = uniqid();
// 2. user_id
$user_id = $_SESSION['user_id'];
// 3. generate date
$order_date = date("Y/m/d h/i");
// 4. status == Pending
// 5. payment_method == None
// fetch amount
$query1 = "SELECT * FROM cart c JOIN menu m ON c.menu_id = m.menu_id WHERE c.user_id = $user_id";
$result = mysqli_query($conn,$query1);
$numrows = mysqli_num_rows($result);
if($numrows == 0){
	header('Location:index.php');
}
$amount = 0;
while($row = mysqli_fetch_assoc($result)){
	$amount = $amount +  $row['price']*$row['quantity'];
}
// 6. address = 0
$res_id = $_GET['res_id'];
$query = "INSERT INTO orders VALUES ('$order_id',$user_id,'$order_date','Pending','None',$amount,0,$res_id)";

if(mysqli_query($conn,$query)){
	// 
	// add order details
	$query3 = "SELECT * FROM cart c JOIN menu m ON c.menu_id = m.menu_id WHERE c.user_id = $user_id";
	$result1 = mysqli_query($conn,$query3);
	while($row1 = mysqli_fetch_assoc($result1)){
		$menu_id = $row1['menu_id'];
		$quantity = $row1['quantity'];
		$query2 = "INSERT INTO order_details VALUES (NULL,'$order_id',$menu_id,$quantity)";
		mysqli_query($conn,$query2);
		//echo "Added";
		header('Location:show_address.php?order_id='.$order_id);
	}
}else{
	header('Location:restaurant_details.php?error=0&res_id='.$_GET['res_id']);
	//echo $query;
}
?>