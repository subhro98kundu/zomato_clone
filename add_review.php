<?php  

//session_start();
include("includes/sessionhandler.php");
if ($is_logged_in == 0) {
	header('Location:restaurant_details.php?error=10&res_id='.$_POST['res_id']);
	exit();
}
include("includes/dbhelper.php");
date_default_timezone_set('Asia/Kolkata');
$order_date = date("Y/m/d h/i");

$res_id = $_POST['res_id'];
$review = $_POST['review'];
$user_id = $_SESSION['user_id'];

$query = "INSERT INTO reviews VALUES(NULL, $user_id, $res_id, '$review', '$order_date')";

if(mysqli_query($conn, $query)){
	header('Location:restaurant_details.php?res_id='.$res_id);
}else{
	echo "error";
}

?>