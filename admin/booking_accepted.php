<?php  
	include("admin_sessionhandler.php");
	include("../includes/dbhelper.php");
	$order_id = $_GET['id'];
	if($is_admin_logged_in){
		$admin_res_id = $_SESSION['admin_res_id'];
		$res_check_query = "SELECT * FROM tablebooking WHERE id = $order_id";
		$res_check = mysqli_fetch_assoc(mysqli_query($conn, $res_check_query));
		$order_res_id = $res_check['res_id'];
		if($admin_res_id == $order_res_id){
			$accept_query = "UPDATE tablebooking SET status = 2 WHERE id = $order_id";
			if(mysqli_query($conn, $accept_query)){
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