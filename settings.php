<?php  
	include("includes/header.php");
	include("includes/dbhelper.php");
	if($is_logged_in === 0){
		header('Location:index.php');
		exit();
	}else{
		$user_id = $_SESSION['user_id'];
	}

?>
<hr>
<div class="container mt-5">
	<div class="row">
		<div class="col-3">
			<?php  
			$query = "SELECT * FROM users u JOIN address a ON u.user_id = a.user_id WHERE u.user_id = $user_id";
			//echo($query);
			$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
			echo '
			<img src="img/user/user.png" class="mb-3" style="width: 100%;"><br><hr>
			<h3>'.$name.'</h3>
			<h6 class="text-muted">'.$result['email'].'</h6><hr>
			<button class="btn btn-block btn-danger mt-3" data-toggle="modal" data-target="#editProfileModal">Edit</button>
			';
			?>
			
		</div>
		<div class="col-8">
			<h3>Addresses</h3><hr>

			<ul id="address_list" class="list-group mt-3">
				<?php  
				$result2 = mysqli_query($conn, $query);
				while ($row = mysqli_fetch_assoc($result2)) {
					echo '
						<li class="list-group-item text-muted">'.$row['street_address'].', '.$row['landmark'].', '.$row['city'].',<br>'.$row['state'].' - '.$row['pin'].'<br>Contact Number: '.$row['contact_number'].'</li>		
					';
				}
					
				?>
			  
			</ul>
			<hr>
			<button class="btn btn-danger btn-block" data-toggle="modal" data-target="#addAddressModal"><i class="fas fa-plus text-white"></i> Add New Address</button>

		</div>	
	</div>
	
</div>


			<div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form action="add_address.php" method="POST">
			        	<label>Street Address</label>
			        	<textarea name="street_address" class="form-control"></textarea><br>
			        	<label>Landmark</label>
			        	<textarea class="form-control" name="landmark"></textarea>
			        	<label>City</label>
			        	<input  class="form-control" type="text" name="city">
			        	<label>State</label>
			        	<input class="form-control" type="text" name="state"><br>
			        	<label>Pin</label>
			        	<input class="form-control" type="text" name="pin"><br>
			        	<label>Contact Number</label>
			        	<input class="form-control" type="text" name="contact_number"><br>
			        	<input type="submit" value="Add Address" class="btn btn-primary btn-lg" name="">
			        </form>
			      </div>
			    </div>
			  </div>
			</div>


<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="updateuserprofile.php" method="POST">
        	<label>Full Name</label>
        	<input type="text" class="form-control" name="name" value="<?php echo($name); ?>"><br>
        	<label>Email</label>
        	<input type="emaill" name="email" value="<?php echo($result['email']); ?>" class="form-control">
        	<label>Old Password</label>
        	<input type="password" name="old_password" class="form-control"><br>
        	<label>New Password</label>
        	<input type="password" name="new_password"><br>
        	<input type="submit" name="">
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>