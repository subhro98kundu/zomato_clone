<div class="element-bottom" id="cart">
	<div class="btn-group dropup" style="width: 100%; left: 0; right: 0;">
	  <button type="button" class="btn btn-secondary dropdown-toggle btn-full btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    	Cart
  	  </button>
	  <div class="dropdown-menu mb-0 scrollable-menu fade" style="width: 100%; left: 0; right: 0; bottom: auto; padding: 0px;">
	  	<div class="bg-danger mt-0 p-3 mb-3" align="center">
	  		<span style="font-size: 20px; color: white;">Cart</span>
	  	</div>
	  	<?php
	  		//include("includes/dbhelper.php"); 
	  		//include("includes/sessionhandler.php");
	  		$user_id = $_SESSION['user_id'];
	  		$query = "SELECT * FROM cart WHERE user_id = $user_id";
	  		$cart_result = mysqli_query($conn, $query);
	  		$amount = 0;
	  		while($row = mysqli_fetch_assoc($cart_result)){
	  			$menu_id = $row['menu_id'];
	  			$cart_id = $row['cart_id'];
	  			$quantity = $row['quantity'];
	  			$query2 = "SELECT * FROM restaurants r JOIN menu m ON r.restaurant_id = m.res_id WHERE m.menu_id = $menu_id";
	  			$result = mysqli_query($conn, $query2);
	  			$result = mysqli_fetch_assoc($result);
	  			$amount += $result['price'] * $quantity;
	  			//print_r($result); 
	  			
			  		echo '
						  	<div class="dropdown-item" id="'.$menu_id.'">
								<div class="row">
									<div class="col-2">
										<img class="pt-3" src="'.$result['menu_img'].'" style="width: 100%;">
									</div>
									<div class="col-7 pt-3">
										<h5>'.$result['menu_name'].'</h5>
										<p class="text-muted">Rs. <span id="price'.$menu_id.'">'.$result['price'].'</span></p>
										<p class="text-muted">'.$result['name'].'</p>
									</div>
									<div class="col-3 pt-3">
										<button name="'.$menu_id.'" data-id="update_quantity.php?menu_id='.$menu_id.'&sign='.'-'.'&res_id='.$result['res_id'].'" class="btn btn-secondary update-qty">-</button> <span id="qty'.$menu_id.'">'.$quantity.'</span> <button data-id="update_quantity.php?menu_id='.$menu_id.'&sign='.'+'.'&quantity='.$quantity.'&res_id='.$result['res_id'].'" name="'.$menu_id.'" class="btn btn-secondary update-qty">+</button>
									</div>
								</div>
							</div>
			  		';
	  		}

	  		echo '<div class="dropdown-divider"></div>
	  				<div class"p-4 container dropdown-item disabled" align="right"><h5 class="p-5">Total: Rs. <b id="total">'.$amount.'</b></h5>

	  				</div>
	  				<div class"p-4 container dropdown-item disabled" align="center">
	  					<a href="place_order.php?res_id='.$res_id.'" class="btn btn-lg mb-4 btn-danger">Place Order</a>
	  					
	  				</div>
	  		';
	  	 ?>

		
		
	  </div>
	</div>
</div>

<script type="text/javascript">
	$('.dropdown-menu').click(function(e) {
		//alert('clicked');
    e.stopPropagation();
	});
	$(document).ready(function(){
		//"update_quantity.php?menu_id='.$menu_id.'&sign='.'-'.'&quantity='.$quantity.'&res_id='.$result['res_id'].'"
		var num_cart_items = <?php echo $num_cart_items; ?>;
		if(num_cart_items == 0){
			$('#cart').hide();
		}
		$('.update-qty').click(function(){
			var sign = $(this).text();
			var update_url = $(this).attr('data-id');
			var menu_id = $(this).attr('name');
			var qty_id = '#qty'+menu_id;
			var price = Number($('#price'+menu_id).text());
			var quantity = Number($(qty_id).text());
			var total = Number($('#total').text());
			//console.log(price);
			$.ajax({
				url: update_url+'&quantity='+quantity,
				method: 'GET',
				success: function(data){
					quantity = (sign == '+')? quantity+1 : quantity-1;

					total = (sign == '+')? total+price : total-price;
					if(quantity)
						$(qty_id).text(quantity);
					else{
						$('#'+menu_id).remove();
					}
					//console.log(quantity);
					if(total != 0)
						$('#total').text(total);
					else{
						$('#cart').hide();
					}
				},
				error: function(error){
					console.log(error);
				}
			})
		})
			
	})
	
</script>