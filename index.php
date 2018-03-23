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



         	
         	<ul id="menu">

         		<li><a href="index.php">Home</a></li>
         		<li><a href="login.php">All Products</a></li>
         		<li><a href="#">My Account</a></li>
         		<li><a href="login.php">Login</a></li>
         		<li><a href="#">Shopping Cart</a></li>
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

					<div id="products_box">

					<?php 

					$get_pro = "select * from products order by RAND() LIMIT 0,6";

	$run_pro = mysqli_query($con, $get_pro);

	while($row_pro=mysqli_fetch_array($run_pro)){

		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];

		echo "

				<div id='single_product'>

					<h3>$pro_title</h3>

					<img src='admin_area/product_images/$pro_image' width='180' height='180' />

                    <p><b> Price: $ $pro_price </b></p>

                    
				</div>	

			";
		}
				?>		

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

