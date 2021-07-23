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
 <div>
<?php  	
include("includes/dbhelper.php");
include("includes/sessionhandler.php");

$res_id = $_GET['res_id'];
$query = "SELECT * FROM reviews r JOIN users u ON r.user_id = u.user_id WHERE r.res_id = $res_id";
$result = mysqli_query($conn, $query);		

				echo '<ul class="nav nav-tabs mt-2">
					  <li class="nav-item">
					    <a class="nav-link text-danger" href="#">Overview</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link text-danger" href="order_online.php?res_id='.$res_id.'">Order Online</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link active" href="#">Reviews</a>
					  </li>
					</ul>';
while($row = mysqli_fetch_assoc($result)){
	$user_name = $row['name'];
	$review = $row['review_content'];
	echo '
			<li class="list-group-item" aria-disabled="false"><div class="row"><div class="col-2" align="center"><i class="fa fa-user-circle" style="font-size: 30px;" aria-hidden="true"></i><br>'.$user_name.'</div><div class="col-10"><p>Review</p><p class="text-muted">'.$review.'</p></div></div></li>
	';
}
					?>
</div>
</body>
</html>