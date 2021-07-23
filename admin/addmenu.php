<?php 
include("admin_sessionhandler.php");
include("../includes/dbhelper.php");

if(isset($_POST['submit'])){
	$res_id = $_POST['res_id'];
	$menu_name = $_POST['menu_name'];
	$votes = 0;
	$price = $_POST['price'];
	$cuisine = $_POST['cuisine'];
	$description = $_POST['description'];
	$menu_img = $_FILES['image'];

	$menu_img_name = $menu_img['name'];
	$menu_img_tmpName = $menu_img['tmp_name'];
	$menu_img_fileSize = $menu_img['size'];
	$menu_img_error = $menu_img['error'];
	$menu_img_type = $menu_img['type'];
	$ext_arr = explode('.', $menu_img_name);
	if(count($ext_arr) > 2){
		echo "<script>alert('You cannot upload this file! Rename it without using any special characters like: . , / ? ; & etc.');</script>";
		header('Location:index.php');
		exit();
	}
	$actual_ext = strtolower(end($ext_arr));
	$allow = array('jpg', 'jpeg', 'png');
	//echo $menu_img_tmpName;
	//echo $menu_img_name;	

	if($is_admin_logged_in){

		

		$admin_res_id = $_SESSION['admin_res_id'];
		if($admin_res_id == $res_id){

			if (in_array($actual_ext, $allow)) {
				if($menu_img_error === 0){
					if ($menu_img_fileSize <= 1000000) {
						$actual_file_name = "res".$admin_res_id."_".uniqid('', true).".".$actual_ext;
						$actual_file_destination = "img/uploads/menu_img/".$actual_file_name;

						$insert_query = "INSERT INTO menu VALUES(NULL, '$menu_name', $admin_res_id, $votes, $price, '$cuisine', '$description', '$actual_file_destination')";
						if(mysqli_query($conn, $insert_query)){
							move_uploaded_file($menu_img_tmpName, '../'.$actual_file_destination);
							header('Location:admin_home.php?added');
							//echo $query;
						}else{
							echo "<script>alert('Some error occured. Try again.');</script>";
							header('Location:admin_home.php?couldntinsert');
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
}else{
	header('Location:index.php');
}
?>