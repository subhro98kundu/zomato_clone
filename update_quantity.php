<?php
include("includes/dbhelper.php");
?>
<?php
	session_start();
	
	$menu_id = $_GET['menu_id'];
	$quantity = $_GET['quantity'];
	$sign = $_GET['sign'];
	$user_id = $_SESSION['user_id'];
	$res_id = $_GET['res_id'];
	if($sign === '-')
		$quantity-=1;
	else
		$quantity+=1;
	if($quantity == 0)
		$query = "DELETE FROM cart WHERE user_id = $user_id AND menu_id = $menu_id";
	else
		$query = "UPDATE cart SET quantity = $quantity WHERE user_id = $user_id AND menu_id = $menu_id";
	if(mysqli_query($conn, $query)){
		echo 1;
		//echo 1;
	}else{
		echo 0;
	}
	//echo($product_id);
?>