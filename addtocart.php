<?php
include("includes/dbhelper.php");
?>
<?php
	//session_start();
	include("includes/sessionhandler.php");
	include("includes/cart_status.php");
	$res_id = $_GET['res_id'];
	if($existing_cart_res_id != $res_id and $cart_count != 0){
		echo 3;
		exit();
	}
	if($is_logged_in == 0){
		echo 0;
	}
	$menu_id = $_GET['menu_id'];
	$user_id = $_SESSION['user_id'];
	$check_query = "SELECT * FROM cart WHERE user_id = $user_id AND menu_id = $menu_id";
	$result = mysqli_query($conn, $check_query);
	$num_rows = mysqli_num_rows($result);
	if($num_rows == 0){
	$query = "INSERT INTO cart VALUES (NULL,$user_id,$menu_id,1)";
	if(mysqli_query($conn, $query)){
		echo 1;
	}else{
		echo 0;
	}
	}else{
		$result = mysqli_fetch_assoc($result);
		$quantity = $result['quantity'] + 1;
		$query = "UPDATE cart SET quantity = $quantity WHERE user_id = $user_id AND menu_id = $menu_id";
		if(mysqli_query($conn, $query)){
			echo 1;
		}else{
			echo 0;
		}
	}
	//echo($menu_id);
?>