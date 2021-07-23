<?php  
	include("admin_sessionhandler.php");
	include("../includes/dbhelper.php");
	$order_id = $_GET['order_id'];
	if($is_admin_logged_in){
		$admin_res_id = $_SESSION['admin_res_id'];
		$res_check_query = "SELECT * FROM orders WHERE order_id = '$order_id'";
		$res_check = mysqli_fetch_assoc(mysqli_query($conn, $res_check_query));
		$order_res_id = $res_check['res_id'];
		if($admin_res_id == $order_res_id){
			$decline_query = "UPDATE orders SET status='-1' WHERE order_id = '$order_id'";
			if(mysqli_query($conn, $decline_query)){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		} 
	}else{
		header('Location:../index.php');
	}
?>