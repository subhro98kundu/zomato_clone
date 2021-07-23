<?php  
$order_id = $_GET['order_id'];
include("includes/sessionhandler.php");
if ($is_logged_in == 0) {
	header('Location:index.php');
}
include("includes/dbhelper.php");
include("includes/cart_status.php");
if($cart_count == 0){
	$order_details_query = "SELECT * FROM order_details WHERE order_id = '$order_id'";
	//echo $order_details_query;
	$order_details = mysqli_query($conn, $order_details_query);
	while ($row = mysqli_fetch_assoc($order_details)) {
		$menu_id = $row['menu_id'];
		$quantity = $row['quantity'];
		$insert_query = "INSERT INTO cart VALUES(NULL, $user_id, $menu_id, $quantity)";
		if (mysqli_query($conn, $insert_query)) {
			header('Location:place_order.php?res_id='.$_GET['res_id']);
		}else{
			header('Location:display_orders.php?error=0');
		}
	}

}else{
	header('Location:display_orders.php?error=100');
}
?>