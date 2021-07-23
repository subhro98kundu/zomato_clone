<?php  
include("includes/sessionhandler.php");
include("includes/dbhelper.php");
if($is_logged_in){
	$user_id = $_SESSION['user_id'];
	$check_query = "SELECT * FROM users WHERE user_id = $user_id";
	$result_check_query = mysqli_fetch_assoc(mysqli_query($conn, $check_query));
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$full_name = $_POST['name'];
	$email = $_POST['email'];
	if ($old_password and $new_password and $full_name and $email) {
		if($old_password == $result_check_query['password']){
			$email_check_query = "SELECT * FROM users WHERE email LIKE '$email'";
			$email_check_result = mysqli_num_rows(mysqli_query($conn, $email_check_query));
			if($email_check_result == 0){
				$update_query = "UPDATE users SET email = '$email', name = '$full_name', password = '$new_password' WHERE user_id = $user_id";
				if(mysqli_query($conn, $update_query)){
					$_SESSION['name'] = $full_name;
					header('Location:settings.php');
				}else{
					//echo $update_query;
					header('Location:settings.php?error=0');
				}
			}else{
					//echo $update_query;
					header('Location:settings.php?error=0');
			}
		}else{
			header('Location:settings.php?error=0');
		}
	}else{
		header('Location:settings.php?error=0');
	}

}else{
	header('Location:index.php?error=10');
}
?>