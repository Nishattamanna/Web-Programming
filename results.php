<?php

session_start();

	if(!isset($_SESSION['email'])){

		header("location:login.php");
	}

	else{

?>

<!DOCTYPE>

<?php

include("functions/functions.php");

?>


<html>

	<head>

		<title>Kumu & Kowshik Electronics </title>


		<link rel="stylesheet" type="text/css" href="styles/style_index.css" />
	
	</head>

<body>

	<!--Main Container starts from here-->

	<div class="main_wrapper">

		<!--Header starts from here-->
		<div class="header_wrapper">

    		
    		<img id="logo" src="images/logo.gif" />
    		<img id="banner" src="images/banner.gif" />	
		
		</div>

		<!--Header ends here-->

    	<!--Navigation Bar starts-->

		<div class="menubar">

			<h4 style="color:black;">Welcome, <?=$_SESSION['email'];?></h4>

         	
         	<ul id="menu">

         		<li><a href="results.php">Home</a></li>
         		<li><a href="all_products.php">All Products</a></li>
         		<li><a href="#">My Account</a></li>
         		<li><a href="logout.php">Logout</a></li>
         		<li><a href="cart.php">Shopping Cart</a></li>
         		<li><a href="#">Contact Us</a></li>
         		<!--<li><a href="admin_area/index.php">Admin</a></li>-->
         		


			</ul>

			<div id="form">

				<form method="get" action="" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a product" />
					<input type="submit" name="search" value="Search" />
				</form>

			</div> 




		</div>
		
		<!--Navigation Bar ends-->




		<!--Content wrapper starts-->

		<div class="content_wrapper">			

				<div id="sidebar">

					<div id="sidebar_title">Categories</div>

					<ul id="cats">

						<?php getcats(); ?>
					    	
					</ul>


					<div id="sidebar_title">Brands</div>

					<ul id="cats">

						<?php getBrands(); ?>
		
					</ul>

				</div>

				<div id="content_area">

					<?php cart(); ?>

					<div id="shopping_cart">

						<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

                              <b>Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?></b> <a href="cart.php">Go To Cart</a> 
						</span>

					</div>

					<div id="products_box">

					<?php getPro2(); ?>	
					<?php getCatPro(); ?>
					<?php getBrandPro(); ?>	

					</div>


					</div>

		</div>			
					
		<!--Content wrapper ends-->


		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by Web Programming</h2>
		
		</div>


</div>

<!--Main Container ends here-->



</body>

</html>

<?php } ?>
