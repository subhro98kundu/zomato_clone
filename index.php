<?php 
include("includes/dbhelper.php");
//include("includes/sessionhandler.php");
include("includes/header.php");
 ?>


	<div class="container mt-5">
		<div class="row" style="font-size: 20px;">
			<div class="col-2">
				<div class="text-danger"><img src="img/scooter.png" width="30%"> Delivery<hr style="border-bottom: 2px solid red;"></div>							
			</div>
			<div class="col-2"><a href="dineout.php" style="text-decoration: none; color: black;">
				<div><img src="img/dinner-table.png" width="30%"> Dining Out<hr></div>
				</a>							
			</div>
			<div class="col-2"><a href="nightlife.php" style="text-decoration: none; color: black;">
				<div><img src="img/beer.png" width="30%"> Nightlife<hr></div>
				</a>							
			</div>
			<div class="col-2">
				<div><img src="img/scooter.png" width="30%"> Nutrition<hr></div>							
			</div>
		</div>	
	</div>
	<div>
		<div class="pt-4 pb-4" style="background-color: #F6F6F6;">
			<div class="container">
				<p style="font-size: 30px;" class="mt-3">Inspiration for your first order</p>
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
		            <div class="carousel-inner">
		                <div class="carousel-item active">
		                    <div class="row">
								<div class="col-3">
									<a href="browse.php?id=1" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/dish_images/173bc40a5058e328f998f55eed7b7a7f1612459047.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Momos</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=2" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/homepage_dish_data/4/eb2ef145c0fcad44dbb4ed26aad1527d.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Rolls</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=3" width="100%" style="text-decoration: none; color: black">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/homepage_dish_data/4/742929dcb631403d7c1c1efad2ca2700.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Chicken</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=4" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/homepage_dish_data/4/76d788a2600b609bb0a08443e03df95b.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Biriyani</p>
									</div>
									</a>
								</div>
							</div>
		                </div>
		                <div class="carousel-item">
		                    <div class="row">
		                        <div class="col-3">
		                        	<a href="browse.php?id=5" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/dish_images/aebeb88b78a4a83ea9e727f234899bed1602781186.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Desserts</p>
									</div></a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=6" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/homepage_dish_data/4/6e69685d22c94ffd42ccd7e70e246bd9.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Italian</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=7" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/homepage_dish_data/4/90cc74d5256f614fc6658cf7942dadd9.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Chinese</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=8" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/pictures/3/18812843/5b4eba735b19a367b4632b6c1489b128_o2_featured_v2.jpg?output-format=webp" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Mexican</p>
									</div>
									</a>
								</div>
		                    </div>
		                </div>
		                <div class="carousel-item">
		                    <div class="row">
		                        <div class="col-3">
		                        	<a href="browse.php?id=9" width="100%" style="text-decoration: none; color: black; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/pictures/chains/7/23847/b55799a90e6f335a5a781bd3278e6713_o2_featured_v2.jpg?output-format=webp" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">South Indian</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=10" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/homepage_dish_data/4/4de821b132e2c393f7c52bf6e41a4331.png" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Kebabs & Mughlai</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=11" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/images/cuisines/unlabelled/d645920e395fedad7bbbed0eca3fe2e0.jpg" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Fast Food</p>
									</div>
									</a>
								</div>
								<div class="col-3">
									<a href="browse.php?id=12" width="100%" style="text-decoration: none; color: black;">
									<div class="card" style="border: 0px; border-radius: 10px; background: #F6F6F6;">
										<img src="https://b.zmtcdn.com/data/images/cuisines/unlabelled_v2_1/35.jpg" class="card-img-top" style="height: 200px; width: auto; border-radius: 10px;">
										<p class="mt-2" style="font-size: 20px;">Continental</p>
									</div>
									</a>
								</div>
		                    </div>
		                </div>
		            </div>
		            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		                <span class="p-3 mb-5" style="background-color: black; border-radius: 100px;"><span class="carousel-control-prev-icon" aria-hidden="false"></span></span>
		                <span class="sr-only">Previous</span>
		            </a>
		            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		            	<span class="p-3 mb-5" style="background-color: black; border-radius: 100px;"><span class="carousel-control-next-icon" aria-hidden="false"></span></span>
		                
		                <span class="sr-only">Next</span>
		            </a>
		        </div>
			</div>
		</div>


		<div class="container pt-5 pb-5">
			<p style="font-size: 30px;" class="mb-4">Top brands in spotlight</p>
			<div class="row">
				<div class="col-2">
					<a href="restaurant_details.php?res_id=44" width="100%">
					<div class="card" style="border-radius: 10px;">
						<img src="https://b.zmtcdn.com/data/brand_creatives/logos/e6a0dc9d06256ffdc331a7d7245fbcc5_1617879709.png?output-format=webp" class="card-img-top" style="border-radius: 10px; height: 150px;">
					</div>
					</a>
				</div>

				<div class="col-2">
					<a href="restaurant_details.php?res_id=6" width="100%">
					<div class="card" style="border-radius: 10px;">
						<img src="https://b.zmtcdn.com/data/brand_creatives/logos/560b209a689eefa9feb367b5d5604097_1611382952.png?output-format=webp" class="card-img-top" style="border-radius: 10px; height: 150px;">
					</div>
					</a>
				</div>

				<div class="col-2">
					<a href="restaurant_details.php?res_id=31" width="100%">
					<div class="card" style="border-radius: 10px;">
						<img src="https://cdn.freelogovectors.net/wp-content/uploads/2018/04/Dominospizzalogo-800x813.png" class="card-img-top" style="border-radius: 10px; height: 150px;">
					</div>
					</a>
				</div>

				<div class="col-2">
					<a href="restaurant_details.php?res_id=31" width="100%">
					<div class="card" style="border-radius: 10px;">
						<img src="https://b.zmtcdn.com/data/brand_creatives/logos/7945054647011e72582f29d863967d5e_1621579455.png?output-format=webp" class="card-img-top" style="border-radius: 10px; height: 150px;">
					</div>
					</a>
				</div>

				<div class="col-2">
					<a href="restaurant_details.php?res_id=8" width="100%">
					<div class="card" style="border-radius: 10px;">
						<img src="https://b.zmtcdn.com/data/brand_creatives/logos/fe5db95ae85292933996d4043f600d3b_1611320738.png?output-format=webp" class="card-img-top" style="border-radius: 10px; height: 150px;">
					</div>
					</a>
				</div>

				<div class="col-2">
					<a href="restaurant_details.php?res_id=139" width="100%">
					<div class="card" style="border-radius: 10px;">
						<img src="https://b.zmtcdn.com/data/brand_creatives/logos/d00a24a136119a27c909d7efc1490661_1560948950.png?output-format=webp" class="card-img-top" style="border-radius: 10px; height: 150px;">
					</div>
					</a>
				</div>
			</div>

			<p style="font-size: 30px;" class="mt-5">Best Food in Kolkata</p>
			<div class="row mt-4">
				<?php
					$res_query = "SELECT * FROM `restaurants` WHERE rating > 3.8 LIMIT 30";
					$result_res = mysqli_query($conn, $res_query);
					while ($result_res_array = mysqli_fetch_assoc($result_res)) {
						$res_id = $result_res_array['restaurant_id'];
						$res_name = $result_res_array['name'];
						$res_rating = $result_res_array['rating'];
						$res_img = $result_res_array['res_img'];
						$res_cuisine = $result_res_array['cuisine'];
						$res_cost = $result_res_array['cost'];
						echo '
							<div class="col-4"><a href="restaurant_details.php?res_id='.$res_id.'" style="text-decoration:None; color:black;">
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
</html>
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