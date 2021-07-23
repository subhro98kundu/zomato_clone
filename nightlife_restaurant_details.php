<?php 
include("includes/dbhelper.php");
//include("includes/sessionhandler.php");
include("includes/header.php");
//echo $is_logged_in;
 ?>
 <?php 
 	$res_id = $_GET['res_id'];
 	$num_cart_items = 0;
 	$query = "SELECT * FROM restaurants WHERE restaurant_id = $res_id";
 	//echo($query);
 	if($is_logged_in == 1){
 		$user_id = $_SESSION['user_id'];
 		$query_cart_check = "SELECT * FROM cart WHERE user_id = $user_id";
	  	$cart_check_result = mysqli_query($conn, $query_cart_check);
	  	$num_cart_items = mysqli_num_rows($cart_check_result);

	  	$query_check_bookmarks = "SELECT * FROM bookmarks WHERE user_id=$user_id AND res_id=$res_id";
	  	$result = mysqli_query($conn, $query_check_bookmarks);
	  	$num_rows_bookmarks = mysqli_num_rows($result);
 	}

 	$result = mysqli_query($conn, $query);
 	$num_rows = mysqli_num_rows($result);
 	if($num_rows==1){
 		$result_res_array = mysqli_fetch_assoc($result);
 		$res_name = $result_res_array['name'];
 		$res_img = $result_res_array['res_img'];
		$res_rating = $result_res_array['rating'];
		$res_cuisine = $result_res_array['cuisine'];
		$res_cost = $result_res_array['cost'];
		$res_timing = $result_res_array['timing'];
		$res_address = $result_res_array['address'];

		echo '
				 <div class="container mt-4"> 
				 	<div class="jumbotron p-0 jumbotron-bg" style="overflow: hidden;"> 
				 		<div>
				 			<div class="row" style="max-height: 100%;">
					 			<div class="col-6 pr-0">
					 				<img src="'.$res_img.'" style="width: 100%; height:100%;">
					 			</div>
					 			<div class="col-6 p-5">
					 				<div class="row mt-0">
					 					<div class="col-6">
					 					<img src="img/wall_1.jpg" style="max-width: 100%">
					 					</div>
					 					<div class="col-6">
					 					<img src="img/wall_2.png" style="max-width: 100%">
					 					</div>	
					 				</div>
					 				<div class="row mt-5">
					 					<div class="col-6">
					 					<img src="img/wall_3.jfif" style="max-width: 100%">
					 					</div>
					 					<div class="col-6">
					 					<img src="img/wall_4.jpg" style="max-width: 100%">
					 					</div>	
					 				</div>
					 				
					 			</div>	
				 			</div>
				 				
				 		</div>	
				 	</div>
					 	
				 </div>

				<div class="container">
  					<h1>'.$res_name.'<span style="float:right;"><button class="btn btn-lg btn-secondary">Book a Table</button></span></h1>
				  	<p class="text-muted">'.$res_cuisine.'</p>
				  	<p class="text-muted">'.$res_address.'</p>
				  	<p class="text-muted">'.$res_timing.'</p>

				  	<div>
				  		<button class="btn btn-danger" data-toggle="modal" data-target="#reviewModal"><i class="far fa-star"></i> Add review</button>
				  		<button id="bookmark" class="btn btn-light ml-2 btn-border"><i class="far fa-bookmark text-danger"></i> Bookmark</button>
				  		<button class="btn btn-light ml-2 btn-border" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-share text-danger"></i> Share</button>
				  	</div>
				  	<div class="mt-3">
				  	<h3>Bar Menu</h3>
				  		<a href="#" class="mb-5" data-toggle="modal" data-target="#barmenuModal">
				  		<div class="col-3 card mb-5">
				  		<img class="" style="height:400px;" src="img/bar/bar_1.png">
				  		<p class="text-muted mt-2"><span style="float:right;">5 pages</span></p>
				  		</div>
				  		</a>



						<div class="modal fade" id="barmenuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h2 class="modal-title text-danger" id="exampleModalLongTitle">Bar Menu</h2>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
								<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								  <ol class="carousel-indicators">
								    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								  </ol>
								  <div class="carousel-inner">
								    <div class="carousel-item active">
								      <img class="d-block w-100" src="img/bar/bar_1.png" alt="First slide">
								    </div>
								    <div class="carousel-item">
								      <img class="d-block w-100" src="img/bar/bar_2.png" alt="Second slide">
								    </div>
								    <div class="carousel-item">
								      <img class="d-block w-100" src="img/bar/bar_3.webp" alt="Third slide">
								    </div>
								    <div class="carousel-item">
								      <img class="d-block w-100" src="img/bar/bar_4.png" alt="Third slide">
								    </div>
								    <div class="carousel-item">
								      <img class="d-block w-100" src="img/bar/bar_5.png" alt="Third slide">
								    </div>
								  </div>
								  <a class="carousel-control-prev bg-secondary" href="#carouselExampleIndicators" role="button" data-slide="prev">
								    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
								    <span class="p-3 mb-5 bg-secondary" style="border-radius: 100px;"><span class="carousel-control-next-icon" style="border-radius: 100px;" aria-hidden="true"></span></span>
								    <span class="sr-only">Next</span>
								  </a>
								</div>

						      </div>
						    </div>
						  </div>
						</div>



				  	</div>
				</div>

				 
		';
 	}
 	//if($is_logged_in && $num_cart_items)
 	//include("includes/cart.php");


  ?>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Copy the Link below</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" align="center">
	        <p id="page-url" class="text-danger"></p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Review</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" align="center">
	        <form action="add_review.php" method="POST">
	        	<label>Write your Review</label>
	        	<textarea class="form-control mb-3" name="review"></textarea>
	        	<input type="hidden" name="res_id" value="<?php echo($res_id); ?>">
	        	<input type="submit" name="" value="Submit" class="btn btn-danger btn-lg">
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>
<script type="text/javascript">
	var bookmark = 0;
	if(<?php echo $num_rows_bookmarks; ?> > 0){
		//$('#bookmark').disabled = true;
		$('#bookmark').html('Bookmarked');
		bookmark = 1;
	}
	$('#page-url').html($(location).attr('href'));
	$('#bookmark').click(function(){
		if(bookmark == 0){
			$.ajax({
				url: 'bookmark.php?res_id='+<?php echo $res_id; ?>,
				method: 'GET',
				success: function(){
					$('#bookmark').html('Bookmarked');
					bookmark = 1;
				},
				error: function(){
					alert('Some error occured!!');
				}
			})
		}else if (bookmark){
			$.ajax({
				url: 'remove_bookmark.php?res_id='+<?php echo $res_id; ?>,
				method: 'GET',
				success: function(){
					$('#bookmark').html('<i class="far fa-bookmark text-danger"></i> Bookmarked');
					bookmark = 0;
				},
				error: function(){
					alert('Some error occured!!');
				}
			})
		}

	})

</script>
  				
  

