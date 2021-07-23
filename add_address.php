<?php
	session_start();
	if(empty($_SESSION)){
		header('Location:index.php');
	}else{
		$is_logged_in = 1;
		$user_id = $_SESSION['user_id'];
		//echo $user_id;
	}
	
?>



<?php 

	//session_start();
	include('includes/dbhelper.php');
	$user_id = $_SESSION['user_id'];
	$street_address = $_POST['street_address'];
	$landmark = $_POST['landmark'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$pin = $_POST['pin'];
	$contact_number = $_POST['contact_number'];


	$query = "INSERT INTO address VALUES (NULL, $user_id, '$street_address', '$landmark', '$city', '$state', '$pin', '$contact_number')";
	//echo $query;
	if(mysqli_query($conn, $query)){
		if(array_key_exists('order_id', $_POST)){
			$order_id = $_POST['order_id'];
			header('Location:show_address.php?order_id='.$order_id);
		}else{
			header('Location:settings.php');
		}
	}else{
		if(array_key_exists('order_id', $_POST)){
			$order_id = $_POST['order_id'];
			echo '<script>alert("Some error occured! Try again.");</script>';
			header('Location:show_address.php?order_id='.$order_id);
		}else{
			header('Location:settings.php?error=0');
		}
		
	}
 ?>