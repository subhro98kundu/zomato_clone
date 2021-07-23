<?php 
	include("includes/dbhelper.php");
	$i = 1;
	while ($i<200) {
		$votes = rand(0,100);
		$query1 = "INSERT INTO menu VALUES (NULL, 'Chicken Biriyani','$i','$votes','190.00',' North Indian, Biryani, Main Course','The word Biryani is derived from the Persian word Birian','img/chicken_biriyani.png')";
		$votes = rand(0,100);
	$query2 = "INSERT INTO menu VALUES (NULL, 'Egg Biriyani','$i','$votes','120.00',' North Indian, Biryani, Main Course','The word Biryani is derived from the Persian word Birian','img/egg_biriyani.png')";
	$query3 = "INSERT INTO menu VALUES (NULL, 'Chicken kebab','$i','$votes','180.00',' North Indian, Biryani, Main Course, Kebab','A kebab is pieces of meat or vegetables grilled on a long thin stick','img/chicken_kebab.png')";

	$votes = rand(0,100);
	$query4 = "INSERT INTO menu VALUES (NULL, 'Burger','$i','$votes','120.00',' Italian, Snacks, ','A hamburger (also burger for short) is a food, typically considered a sandwich','img/burger.png')";
	$votes = rand(0,100);
	$query5 = "INSERT INTO menu VALUES (NULL, 'Chicken Lollipop','$i','$votes','170.00',' North Indian, Starter, ','A hot and spicy appetizer made with drummettes or whole chicken wings.','img/chicken_lollipop.png')";
	$votes = rand(0,100);
	$query6 = "INSERT INTO menu VALUES (NULL, 'Chicken Tikka Masala','$i','$votes','200.00',' North Indian, Chicken, Main Course, ','Chicken Tikka Masala is an addictive, classic dish for lunch or dinner.','img/chicken_tikka_masala.png')";

	$votes = rand(0,100);
	$query7 = "INSERT INTO menu VALUES (NULL, 'Chicken Tikka Butter Masala','$i','$votes','220.00',' North Indian, Chicken, Main Course, ','Chicken Tikka Butter Masala is an addictive, classic dish for lunch or dinner','img/chicken_tikka_butter_masala.png')";
	$votes = rand(0,100);
	$query8 = "INSERT INTO menu VALUES (NULL, 'Coca Cola','$i','$votes','80.00',' Beverages, Soft Drinks, Cold Drinks, ','Coca-Cola, is a carbonated, sweetened soft drink and is the world\'s best-selling drink.','img/coca_cola.png')";
	$votes = rand(0,100);
	$query9 = "INSERT INTO menu VALUES (NULL, 'Chilli Chicken','$i','$votes','185.00',' Chinese, Chicken, Main Course, ','Chilli chicken is a popular Indo-chinese appetizer.','img/chilli_chicken.png')";

	$votes = rand(0,100);
	$query10 = "INSERT INTO menu VALUES (NULL, 'Crispy Chicken Box','$i','$votes','170.00',' North Indian, Chicken, Starter, ','What can be better than to start with delicious & crispy chicken.','img/crispy_chicken_box.png')";
	$votes = rand(0,100);
	$query11 = "INSERT INTO menu VALUES (NULL, 'Crispy Chilli Babycorn','$i','$votes','195.00',' North Indian, Veg, Starter, ','What can be better than to start with delicious & crispy chilli Baby Corn.','img/crispy_chilli_babycorn.png')";
	$votes = rand(0,100);
	$query12 = "INSERT INTO menu VALUES (NULL, 'French Fries','$i','$votes','100.00',' North Indian, aloo bhaja, Starter, ','What can be better than to start with delicious & crispy French Fries.','img/french_fries.png')";

	$votes = rand(0,100);
	$query13 = "INSERT INTO menu VALUES (NULL, 'Fried Momo','$i','$votes','185.00',' Chinese, Snacks, ','Try delicious fried momos','img/fried_momo.png')";
	$votes = rand(0,100);
	$query14 = "INSERT INTO menu VALUES (NULL, 'Fried Rice','$i','$votes','190.00',' North Indian, Fried Rice, Main Course, ','Chinese fried rice is the quintessential comfort food.','img/fried_rice.png')";
	$votes = rand(0,100);
	$query15 = "INSERT INTO menu VALUES (NULL, 'Friendship Bucket','$i','$votes','375.00',' North Indian, Chicken, Starter, Main Course, ','Select your favorite Crispy Chicken, Friendship Chicken Bucket, Smoky Grilled, Popcorn Chicken and much more at attractive prices.','img/friendship_bucket.png')";

	$votes = rand(0,100);
	$query16 = "INSERT INTO menu VALUES (NULL, 'Hot Crispy Chicken','$i','$votes','190.00',' North Indian, Chicken, Starter, Snacks, ','Treat your friends with Colonel signature hot & crispy fried chicken.','img/hot_crispy_chicken.png')";
	$votes = rand(0,100);
	$query17 = "INSERT INTO menu VALUES (NULL, 'Ice Cream','$i','$votes','70.00',' Dessert, Ice Cream, ','A rich, sweet, creamy frozen food made from variously flavored cream and milk products.','img/ice_cream.png')";
	$votes = rand(0,100);
	$query18 = "INSERT INTO menu VALUES (NULL, 'Cone Ice Cream','$i','$votes','75.00',' Dessert, Ice Cream, ','A rich, sweet, creamy frozen food made from variously flavored cream and milk products.','img/chicken_kebab.png')";

	$votes = rand(0,100);
	$query19 = "INSERT INTO menu VALUES (NULL, 'Chicken Tandoori','$i','$votes','190.00',' North Indian, Tandoori, Kebab, Main Course, ','Tandoori chicken is a chicken dish prepared by roasting chicken marinated in yogurt and spices in a tandoor','img/kebab_n_tandoori.png')";
	$votes = rand(0,100);
	$query20 = "INSERT INTO menu VALUES (NULL, 'Big 8','$i','$votes','345.00',' North Indian, Chicken, Starter, Main Course, ','Enjoy hot & smoky chicken together with KFC Big 8 chicken Bucket.','img/KFC_BIG_8.png')";
	$votes = rand(0,100);
	$query21 = "INSERT INTO menu VALUES (NULL, 'Stay Home Bucket','$i','$votes','190.00',' North Indian, Chicken, Starter, Main Course','KFC 2 Popcorn Rice Bowls with 8 pc Hot wings.','img/KFC_stay_home_bucket.png')";

	$votes = rand(0,100);
	$query22 = "INSERT INTO menu VALUES (NULL, 'Ultimate Savings Bucket','$i','$votes','199.00',' North Indian, Chicken, Starter, Main Course, ','Crispy fried chicken, hot chicken wings, tasty boneless strips, paired with 2 dips & 1 pet Pepsi​.','img/KFC_ultimate_savings_bucket.png')";
	$votes = rand(0,100);
	$query23 = "INSERT INTO menu VALUES (NULL, 'Mixed Chowmin','$i','$votes','140.00',' Chinese, Chicken, Egg, Main Course, ','Enjoy this special chinese dish. Order now.','img/mixed_chowmin.png')";
	$votes = rand(0,100);
	$query24 = "INSERT INTO menu VALUES (NULL, 'Mixed Fried Rice','$i','$votes','195.00',' Chinese, Main Course, ','Mixed Fried rice is a dish of cooked rice that has been stir-fried in a wok or a frying pan and is usually mixed with other ingredients such as eggs, vegetables, seafood, chicken.','img/mixed_fried_rice.png')";

	$votes = rand(0,100);
	$query25 = "INSERT INTO menu VALUES (NULL, 'Steam Momo','$i','$votes','120.00',' North Indian, Chicken, Starter, momo, ','Order and enjoy steamy momos.','img/momo.png')";
	$votes = rand(0,100);
	$query26 = "INSERT INTO menu VALUES (NULL, 'Pepsi','$i','$votes','70.00',' Beverages, pepsi, soft drinks, cold drinks, ','One of the best selling drinks in the world.','img/pepsi.png')";
	$votes = rand(0,100);
	$query27 = "INSERT INTO menu VALUES (NULL, 'Pizza','$i','$votes','180.00',' Italian, Starter, Main Course, ','A dish made typically of flattened bread dough spread with a savory mixture usually including tomatoes and cheese.','img/pizza.png')";

	$votes = rand(0,100);
	$query28 = "INSERT INTO menu VALUES (NULL, 'Chicken Roll','$i','$votes','99.00',' North Indian, Chicken, roll, Starter, ','Succulent pieces of spicy chicken cooked with freshly chopped onions and peppers','img/rolls.png')";
	$votes = rand(0,100);
	$query29 = "INSERT INTO menu VALUES (NULL, 'Spicy Crispy Chicken','$i','$votes','199.00',' Chicken, Main Course, ','Delicious','img/spicy_crispy_chicken.png')";
	$votes = rand(0,100);
	$query30 = "INSERT INTO menu VALUES (NULL, '2 Popcorn Rice Bowls','$i','$votes','195.00',' Chicken, Main Course, ','Delicious meal.','img/two_pop_rice_bowls.png')";
	$votes = rand(0,100);
	$query31 = "INSERT INTO menu VALUES (NULL, 'Waffles','$i','$votes','195.00',' Desert, Waffle, ','Delicious desert.','img/waffle.png')";

	$votes = rand(0,100);
	$query32 = "INSERT INTO menu VALUES (NULL, 'Egg Roll','$i','$votes','75.00',' North Indian, Chicken, roll, Starter, ','Succulent pieces of spicy chicken cooked with freshly chopped onions and peppers','img/rolls.png')";
	$votes = rand(0,100);
	$query33 = "INSERT INTO menu VALUES (NULL, 'Egg Chicken Roll','$i','$votes','149.00',' North Indian, Chicken, roll, Starter, ','Succulent pieces of spicy chicken cooked with freshly chopped onions and peppers','img/rolls.png')";

	$result1 = mysqli_query($conn,$query1);
	$result2 = mysqli_query($conn,$query2);
	$result3 = mysqli_query($conn,$query3);
	$result4 = mysqli_query($conn,$query4);

	$result5 = mysqli_query($conn,$query5);
	$result6 = mysqli_query($conn,$query6);
	$result7 = mysqli_query($conn,$query7);
	$result8 = mysqli_query($conn,$query8);

	$result9 = mysqli_query($conn,$query9);
	$result10 = mysqli_query($conn,$query10);
	$result11 = mysqli_query($conn,$query11);
	$result12 = mysqli_query($conn,$query12);

	$result13 = mysqli_query($conn,$query13);
	$result14 = mysqli_query($conn,$query14);
	$result15 = mysqli_query($conn,$query15);
	$result16 = mysqli_query($conn,$query16);

	$result17 = mysqli_query($conn,$query17);
	$result18 = mysqli_query($conn,$query18);
	$result19 = mysqli_query($conn,$query19);
	$result20 = mysqli_query($conn,$query20);

	$result21 = mysqli_query($conn,$query21);
	$result22 = mysqli_query($conn,$query22);
	$result23 = mysqli_query($conn,$query23);
	$result24 = mysqli_query($conn,$query24);

	$result25 = mysqli_query($conn,$query25);
	$result26 = mysqli_query($conn,$query26);
	$result27 = mysqli_query($conn,$query27);
	$result28 = mysqli_query($conn,$query28);

	$result29 = mysqli_query($conn,$query29);
	$result30 = mysqli_query($conn,$query30);
	$result31 = mysqli_query($conn,$query31);
	$result32 = mysqli_query($conn,$query32);

	$result33 = mysqli_query($conn,$query33);

	//echo($result1, $result2, $result3, $result4, $result5, $result6);	

	$i++;
	}

 ?>