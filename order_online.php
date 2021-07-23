<?php 
	include("includes/dbhelper.php");
	include("includes/sessionhandler.php");

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 </head>
 <style type="text/css">

body::-webkit-scrollbar { 
  width: 2px;              /* width of the entire scrollbar */
  height: 10px; 
  }

body::-webkit-scrollbar-track {
    background: white;        /* color of the tracking area */
  }

body::-webkit-scrollbar-thumb {
    background-color: white;    /* color of the scroll thumb */
    border-radius: 20px;       /* roundness of the scroll thumb */
    border: 0px solid white;  /* creates padding around scroll thumb */
  }
 </style>
 <body class="pr-5 pl-5">
 	<div style="">
 	<?php
 		$res_id = $_GET['res_id']; 
 		include("includes/restaurant_details_tabs.php");
 		
 	 ?>
 	</div>
	 <div>
		 <ul class="list-group">
		 	<?php 
		 		$query = "SELECT * FROM menu WHERE res_id = $res_id";
		 		$menu_result = mysqli_query($conn, $query);
		 		$count = 0;
		 		while($row=mysqli_fetch_assoc($menu_result)){
		 			$menu_item_name = $row['menu_name'];
		 			$menu_id = $row['menu_id'];
		 			$votes = $row['votes'];
		 			$price = $row['price'];
		 			$description = $row['description'];
		 			$menu_img = $row['menu_img'];

		 			echo '
		 					<li class="list-group-item" aria-disabled="false"><div class="row"><div class="col-2"><img src="'.$menu_img.'"></div><div class="col-8"><p>'.$menu_item_name.'</p><p class="text-muted">'.$votes.' votes</p><p class="text-muted">Rs. '.$price.'</p><p class="text-muted">'.$description.'</p></div><div class="col-2"><button data-id="'.$menu_id.'" class="btn btn-light btn-border cart-btn">Add   <i class="fas fa-plus text-danger"></i></button></div></div></li>
		 			';
		 		}
		 	 ?>
		  
		</ul>
	 </div>
 </body>
 </html>
 <script type="text/javascript">
 	if(<?php echo $is_logged_in; ?> == 1){
 		$('.cart-btn').click(function(){
 			//alert('clicked');
 			var menu_id = $(this).attr('data-id');
 			$.ajax({
 				url: 'addtocart.php?res_id='+<?php echo($_GET['res_id']); ?>+'&menu_id='+menu_id,
 				method: 'POST',
 				success: function(data){
 					if(data == 1){
 						parent.location.reload();
 					}else if(data == 3){
 						alert('You have already added items in the cart from another restaurant. Empty cart to add products from another restaurant into the cart.');
 					}else{
 						console.log(data);
 						alert('Some error occured try again!');
 					}
 					//window.open("restaurant_details.php?res_id="+<?php //echo $res_id; ?>);
 				},
 				error: function(error){
 					alert("error occured");
 				}
 			})
 		})
 	}else{
 		$('.cart-btn').click(function(){
 			alert('Please log in to add to cart.');
 		})
 	}
 </script>