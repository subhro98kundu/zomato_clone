<?php
	include("includes/header.php");
	if(empty($_SESSION)){
		header('Location:index.php');
	}else{
		$is_logged_in = 1;
		$user_id = $_SESSION['user_id'];
		//echo $user_id;
	}
	
?>

<?php
 include("includes/dbhelper.php");
 
 $booking_id = $_GET['id'];
 $query="SELECT * FROM tablebooking WHERE booking_id='$booking_id' AND user_id=$user_id";
 $result = mysqli_query($conn, $query);
 //print_r($result);
 $num_rows = mysqli_num_rows($result);
 if($num_rows == 0){
 	header('Location:index.php');
 }
 ?>

 <div class="container mt-5 p-5" align="center">
 	<h1><i class="fa fa-check-circle" style="font-size: 100px; color: green" aria-hidden="true"></i></h1>
 	<h1 style="color:green;">Your request has been successfully sent to the restaurant. Waiting for confirmation from restaurant side. If not accepted your money will be refunded to you within 7 working days if you have already paid.</h1>
 </div>

 </body>
 </html>