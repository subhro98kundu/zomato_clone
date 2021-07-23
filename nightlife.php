<?php 
include("includes/dbhelper.php");
//include("includes/sessionhandler.php");
include("includes/header.php");
 ?>


	<div class="container mt-5">
		<div class="row" style="font-size: 20px;">
			<div class="col-2"><a href="index.php" style="text-decoration: none; color: black;">
				<div><img src="img/scooter.png" width="30%"> Delivery<hr></div>
				</a>							
			</div>
			<div class="col-2"><a href="dineout.php" style="text-decoration: none; color: black;">
				<div><img src="img/dinner-table.png" width="30%"> Dining Out<hr></div>							
				</a>
			</div>
			<div class="col-2">
				<div class="text-danger"><img src="img/beer.png" width="30%"> Nightlife<hr style="border-bottom: 2px solid red;"></div>							
			</div>
			<div class="col-2">
				<div><img src="img/scooter.png" width="30%"> Nutrition<hr></div>							
			</div>
		</div>	
	</div>
	<div>
		
		<div class="container pt-5 pb-5">


			<p style="font-size: 30px;" class="mt-5">Best Nightlife Restaurants in Kolkata</p>
			<div class="row mt-4">
				<?php
					$res_query = "SELECT * FROM `restaurants` WHERE rating > 3.0 AND nightlife = 1 LIMIT 30";
					$result_res = mysqli_query($conn, $res_query);
					while ($result_res_array = mysqli_fetch_assoc($result_res)) {
						$res_id = $result_res_array['restaurant_id'];
						$res_name = $result_res_array['name'];
						$res_rating = $result_res_array['rating'];
						$res_img = $result_res_array['res_img'];
						$res_cuisine = $result_res_array['cuisine'];
						$res_cost = $result_res_array['cost'];
						echo '
							<div class="col-4"><a href="nightlife_restaurant_details.php?res_id='.$res_id.'" style="text-decoration:None; color:black;">
								<div class="card mb-4" style="border: 0px;">
									<img src="'.$res_img.'" class="card-img-top" style="border-radius: 10px; height:250px;">
									<h5 class="mt-3">'.$res_name.'</h5>
									<p>Rating: '.$res_rating.'</p>
									<p class="text-muted">'.$res_cuisine.'</p>
									<p class="text-muted">₹'.$res_cost.' for one</p>
								</div></a>
							</div>
						';

					}
					
					//print_r($result_res_array);
				  ?>
				
			</div>
		</div>
	</div>
</body>
<?php 
	//array_key_exists('error', $_GET);
	//echo ;
	if(array_key_exists('error', $_GET)){
	$error = $_GET['error'];
	if($error == 1){
		echo "<script>$(document).ready(function(){
			alert('Email already exists!! Try using something else.');
		})</script>";
	}
	elseif ($error == 2) {
			echo "<script>$(document).ready(function(){
			alert('Sorry! Invalid Credentials!!!');
		})</script>";		
		}
	}
		
 ?>