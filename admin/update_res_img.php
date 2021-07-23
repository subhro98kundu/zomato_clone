<?php 
include("admin_sessionhandler.php");
include("../includes/dbhelper.php");

if(isset($_POST['submit'])){
	$res_id = $_POST['res_id'];
	$res_img = $_FILES['image'];

	$res_img_name = $res_img['name'];
	$res_img_tmpName = $res_img['tmp_name'];
	$res_img_fileSize = $res_img['size'];
	$res_img_error = $res_img['error'];
	$res_img_type = $res_img['type'];
	$ext_arr = explode('.', $res_img_name);
	if(count($ext_arr) > 2){
		echo "<script>alert('You cannot upload this file! Rename it without using any special characters like: . , / ? ; & etc.');</script>";
		header('Location:index.php');
		exit();
	}
	$actual_ext = strtolower(end($ext_arr));
	$allow = array('jpg', 'jpeg', 'png');
	//echo $res_img_tmpName;
	//echo $res_img_name;	

	if($is_admin_logged_in){

		

		$admin_res_id = $_SESSION['admin_res_id'];
		if($admin_res_id == $res_id){

			if (in_array($actual_ext, $allow)) {
				if($res_img_error === 0){
					if ($res_img_fileSize <= 2000000) {
						$actual_file_name = "res".$admin_res_id."_profile_img.".$actual_ext;
						$actual_file_destination = "img/uploads/res_img/".$actual_file_name;

						$update_query = "UPDATE restaurants SET res_img = '$actual_file_destination' WHERE restaurant_id = $admin_res_id";
						if(mysqli_query($conn, $update_query)){
							move_uploaded_file($res_img_tmpName, '../'.$actual_file_destination);
							header('Location:admin_home.php?added');
							//echo $query;
						}else{
							//echo "<script>alert('Some error occured. Try again.');</script>";
							//header('Location:admin_home.php?couldntinsert');
							echo $update_query;
						}

					}else{
						echo "<script>alert('Upload file less than 900KB');</script>";
					header('Location:admin_home.php?bigsize');
					exit();		
					}

				}else{
					echo "<script>alert('There wa an error in uploading your file. Try again.');</script>";
					header('Location:admin_home.php?errorinfile');
					exit();	
				}
				
			}else{
				echo "<script>alert('You cannot upload file of this type!');</script>";
				header('Location:admin_home.php?othertype');
				exit();	
			}

			
		}else{
			echo("<script>alert('Invalid Request.');</script>");
			//header('Location:admin_home.php?invalidreq='.$res_id);
			echo $res_id;
		} 
	}else{
		//echo $is_admin_logged_in;
		header('Location:../index.php');
	} 
}
?>