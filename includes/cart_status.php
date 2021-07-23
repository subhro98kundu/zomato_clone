<?php  
//include("includes/sessionhandler.php");
include("includes/dbhelper.php");
if($is_logged_in){
	$user_id = $_SESSION['user_id'];
	$cart_status_query = "SELECT * FROM cart c JOIN menu m ON c.menu_id = m.menu_id WHERE c.user_id = $user_id";
	$cart_status = mysqli_query($conn, $cart_status_query);
	$cart_count = mysqli_num_rows($cart_status);
	if($cart_count > 0){
		$cart_status = mysqli_fetch_assoc($cart_status);
		$existing_cart_res_id = $cart_status['res_id'];
	}else{
		$existing_cart_res_id = 0;
	}
}else{
	$cart_count = -1;
	$existing_cart_res_id = -1;
}
?>