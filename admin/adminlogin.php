<?php

session_start();

include('../includes/dbhelper.php');

//step2
$admin_id = $_POST['admin_id'];
$password = $_POST['admin_password'];
$query = "SELECT * FROM admin WHERE admin_id LIKE '$admin_id' AND admin_password LIKE '$password'";

$result = mysqli_query($conn, $query);

$num_rows = mysqli_num_rows($result);

if($num_rows == 1){
	$result_arr = mysqli_fetch_assoc($result);
	$_SESSION['admin_res_id'] = $result_arr['res_id'];
	$_SESSION['admin_user_id'] = $result_arr['admin_id'];
	header('Location:admin_home.php');
}else{
	header('Location:index.php?error=2');
}
?>