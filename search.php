<?php  
if(array_key_exists('search', $_POST)){
	$search = $_POST['search'];
	$search = str_replace('"', 'doublequote', $search);
	$search = str_replace("'", "singlequote", $search);
	$search = str_replace('<', 'lessthan', $search);
	$search = str_replace('>', 'greaterthan', $search);
	$search = str_replace('(', 'braceop', $search);
	$search = str_replace(')', 'braceclose', $search);
	$search = str_replace('-', 'hiphenn', $search);

	$search = str_replace('+', 'plus', $search);
	//echo $search;
	include("includes/header.php");
	include("includes/dbhelper.php");
	$search_query = "SELECT * FROM restaurants WHERE name LIKE '%$search%' OR name LIKE '$search' OR name LIKE '$search%' OR name LIKE '%$search'";
	$result = mysqli_query($conn, $search_query);

}
?>
<div class="container">
	<p style="font-size: 30px;" class="mt-5">Showing results for Restaurants in Kolkata</p>
			<div class="row mt-4">
				<?php
					$count = 0;
					while ($result_res_array = mysqli_fetch_assoc($result)) {
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
						$count++;
					}
					if($count === 0){
						echo '<p class="text-muted">Your search does not match with any of our restaurants. Search again</p>';
					}
					//print_r($result_res_array);
				  ?>
				
			</div>
</div>