<?php
session_start();

include("../includes/dbhelper.php");

//step2
$admin_id = $_POST['admin_id'];
$email = $_POST['admin_email'];
$password = $_POST['admin_password'];
$name = $_POST['restaurant_name'];
$address = $_POST['restaurant_address'];
$cuisine = $_POST['restaurant_cuisine'];
$cost = $_POST['restaurant_cost'];
$night = $_POST['nightlife'];
$dine = $_POST['dining'];
$timing = $_POST['timing'];
$res_insert_query = "INSERT INTO restaurants VALUES(NULL, '$name', 0, '$address', '$cuisine', '$cost', '$timing', $night, $dine, DEFAULT)";
echo $res_insert_query;
if(mysqli_query($conn, $res_insert_query)){
$res_query = "SELECT * FROM restaurants ORDER BY restaurant_id DESC";
$res_query_result = mysqli_query($conn,$res_query);
$res_query_result = mysqli_fetch_assoc($res_query_result);
$res_id = $res_query_result['restaurant_id'];
}else{
	header('Location:adminsignuppage.php?error=0');
	exit();
}



//step 3
$query = "INSERT INTO admin VALUES ('$admin_id', $res_id,'$password', '$email')";
$query1 = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
$result = mysqli_query($conn,$query1);
//$result = mysqli_fetch_assoc($result);
$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
if(mysqli_query($conn,$query)){
	$query2 = "SELECT * FROM admin WHERE admin_id LIKE '$admin_id'";
	$result2 = mysqli_query($conn, $query2);
	$result2_arr = mysqli_fetch_assoc($result2);
	$_SESSION['admin_res_id'] = $result2_arr['res_id'];
	$_SESSION['admin_user_id'] = $result2_arr['admin_id'];

	header('Location:admin_home.php');
}else{
	//echo "Error occured";
	$delete_query = "DELETE FROM restaurants WHERE restaurant_id = $res_id";
	mysqli_query($conn, $delete_query);
	header('Location:adminsignuppage.php?error=0');
	exit();
}
}else{
	//echo("already registered");
	$delete_query2 = "DELETE FROM restaurants WHERE restaurant_id = $res_id";
	mysqli_query($conn, $delete_query2);
	header('Location:adminsignuppage.php?error=1');
}
?>