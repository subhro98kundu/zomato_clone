<?php 
include("includes/dbhelper.php");
//include("includes/sessionhandler.php");
include("includes/header.php");
 ?>

 	<div class="container mt-5">
		<div class="row" style="font-size: 20px;">
			<div class="col-2">
				<div><img src="img/scooter.png" width="30%"> Delivery<hr></div>							
			</div>
			<div class="col-2">
				<div><img src="img/dinner-table.png" width="30%"> Dining Out<hr></div>							
			</div>
			<div class="col-2">
				<div><img src="img/beer.png" width="30%"> Nightlife<hr></div>							
			</div>
			<div class="col-2">
				<div><img src="img/scooter.png" width="30%"> Nutrition<hr></div>							
			</div>
		</div>	
	</div>
	<div class="container">
		<p style="font-size: 30px;" class="mt-5">Best Restaurants in Kolkata</p>
			<div class="row mt-4">
				<?php
					$n = $_GET['id'];
					switch ($n) {
					  case 1:
					    $res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%momo%' OR cuisine LIKE '%sian%' OR cuisine LIKE '%asian%' OR cuisine LIKE '%inese%' OR cuisine LIKE '%chinese%'";
					    break;
					  case 2:
					    $res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%fast%' OR cuisine LIKE '%ast%' OR cuisine LIKE '%rol%' OR cuisine LIKE '%roll%' OR cuisine LIKE '%rolls%'";
					    break;
					  case 3:
					    $res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%north%' OR cuisine LIKE '%mexican%' OR cuisine LIKE '%chinese%' OR cuisine LIKE '%chicken%' OR cuisine LIKE '%continental%'";
					    break;
					  case '4':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%orth%' OR cuisine LIKE '%indian%' OR cuisine LIKE '%ryani%' OR cuisine LIKE '%iryani%' OR cuisine LIKE '%biryani%'";
					  	break;
					  case '5':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%dessert%' OR cuisine LIKE '%akery%' OR cuisine LIKE '%cream%' OR cuisine LIKE '%affle%' OR cuisine LIKE '%sweet%'";
					  	break;
					  case '6':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%pizza%' OR cuisine LIKE '%burger%' OR cuisine LIKE '%talia%' OR cuisine LIKE '%talian%' OR cuisine LIKE '%italian%'";
					  	break;
					  case '7':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%momo%' OR cuisine LIKE '%sian%' OR cuisine LIKE '%asian%' OR cuisine LIKE '%inese%' OR cuisine LIKE '%chinese%'";
					  	break;
					  case '8':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%mexica%' OR cuisine LIKE '%exica%' OR cuisine LIKE '%mexi%' OR cuisine LIKE '%mexican%' OR cuisine LIKE '%mexican%'";
					  	break;
					  case '9':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%south indian%' OR cuisine LIKE '%idli%' OR cuisine LIKE '%dosa%' OR cuisine LIKE '%dli%' OR cuisine LIKE '%south%'";
					  	break;
					  case '10':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%mughlai%' OR cuisine LIKE '%burbeque%' OR cuisine LIKE '%bbq%' OR cuisine LIKE '%ebab%' OR cuisine LIKE '%kebab%'";
					  	break;
					  case '11':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%mughlai%' OR cuisine LIKE '%burbeque%' OR cuisine LIKE '%bbq%' OR cuisine LIKE '%ebab%' OR cuisine LIKE '%kebab%'";
					  	break;
					  case '12':
					  	$res_query = "SELECT * FROM `restaurants` WHERE cuisine LIKE '%conti%' OR cuisine LIKE '%continental%' OR cuisine LIKE '%nental%' OR cuisine LIKE '%continent%' OR cuisine LIKE '%ontinenta%'";
					  	break;
					  default:
					    header('Location:index.php');
					}

					
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