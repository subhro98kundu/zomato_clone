<?php  
include("includes/header.php");
include("includes/dbhelper.php");
if ($is_logged_in == 0) {
	echo "<div class='container'><h1>You are not logged in!!</h1></div>";
	exit();
}
?>
<hr>
<div class="container pb-5 bg-danger">
	<div class="container" style="width: 50%;">
		<h2 class="text-white mb-3 pt-5" style="font-family: verdana;"><b>Bookmarks</b></h2><hr>
		<?php  
			$user_id = $_SESSION['user_id'];
			$query = "SELECT * FROM bookmarks b JOIN restaurants r ON b.res_id = r.restaurant_id WHERE b.user_id = $user_id";
			$result = mysqli_query($conn, $query);
			$count = 0;
			while($row = mysqli_fetch_assoc($result)){
				$res_id = $row['res_id'];
				$res_name = $row['name'];
				$rating = $row['rating'];
				$cuisine = $row['cuisine'];
				$address = $row['address'];
				$res_img = $row['res_img'];
				echo '
						
						<div id="'.$res_id.'" class="card mb-5" style="border: 1px solid red; border-radius: 10px; padding:0px;">
						<a href="restaurant_details.php?res_id='.$res_id.'" style="text-decoration: none;">
							<img src="'.$res_img.'" style="height: 400px; border-radius: 10px;" class="card-img-top">
							<div class="card-body">
								<h3 class="text-danger">'.$res_name.'</h3>
								<h6 class="text-muted">Rating: '.$rating.'</h4>
								<h5 class="text-muted">'.$cuisine.'</h5>
								<h6 class="text-muted">'.$address.'</h6>
								</div></a>
								<button data-id="'.$res_id.'" class="btn btn-danger btn-block remove">Remove Bookmark</button>
						</div>	
						</a>
				';
				$count++;
			}
			if($count == 0){
				echo '<h4 class="text-white mb-5 pb-5">You have not bookmarked any restaurants.</h4>';
			}
		?>
		
		
	</div>
	
</div>
<style type="text/css">
	hr{
		border-top: 1px solid #ccc;
	}
</style>
<script type="text/javascript">
	$('.remove').click(function(){
		var res_id = $(this).attr('data-id');
		$.ajax({
			url: 'remove_bookmark.php?res_id='+res_id,
			method: 'GET',
			success: function(data){
				$('#'+res_id).remove();
			},
			error: function(error){
				alert('Something wrong occured. Try again.');
			}
		})
	})
</script>