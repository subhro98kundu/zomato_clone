<?php
	include("admin_sessionhandler.php");
	include("../includes/dbhelper.php");
	$menu_id = $_GET['menu_id'];
	if($is_admin_logged_in){
		$admin_res_id = $_SESSION['admin_res_id'];
		$res_check_query = "SELECT * FROM menu WHERE menu_id = $menu_id";
		$res_check = mysqli_fetch_assoc(mysqli_query($conn, $res_check_query));
		$menu_res_id = $res_check['res_id'];
		if($admin_res_id == $menu_res_id){
			$remove_query = "DELETE FROM menu WHERE menu_id=$menu_id";
			if(mysqli_query($conn, $remove_query)){
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