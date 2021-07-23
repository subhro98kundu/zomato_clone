<?php  
include("includes/dbhelper.php");
include("includes/sessionhandler.php");
if($is_logged_in == 0){
	header('Location:restaurant_details.php?error=10&res_id='.$_POST['res_id']);
	exit();
}
date_default_timezone_set('Asia/Kolkata');

$inthenameof = $_POST['inthenameof'];
$res_id = $_POST['res_id'];
$timing = $_POST['timing'];
$table_no = $_POST['table_no'];
$booking_id = uniqid();
$user_id = $_SESSION['user_id'];
$duration = $_POST['duration'];
// 3. generate date
$datetime = date("Y/m/d h/i");
$total = 1000*$table_no;

$book_request = "INSERT INTO tablebooking VALUES(NULL, '$booking_id', $user_id, '$inthenameof', $table_no, '$timing', $duration, $total, 0, '$datetime', $res_id)";
if (mysqli_query($conn, $book_request)) {
	header('Location:table_payment.php?id='.$booking_id);
	exit();
}else{
	echo $book_request;
	//header('Location:restaurant_details.php?error=0&res_id='.$res_id);
}
?>