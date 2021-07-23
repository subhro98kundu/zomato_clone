<?php

session_start();

include('includes/dbhelper.php');

//step2
$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE email LIKE '$email' AND password LIKE '$password'";

$result = mysqli_query($conn, $query);

$num_rows = mysqli_num_rows($result);

if($num_rows == 1){
	$result_arr = mysqli_fetch_assoc($result);
	$_SESSION['name'] = $result_arr['name'];
	$_SESSION['user_id'] = $result_arr['user_id'];
	header('Location:index.php');
}else{
	header('Location:index.php?error=2');
}
?>