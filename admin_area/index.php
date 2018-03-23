<?php

session_start();

if(!isset($_SESSION['user_email'])){

	echo "<script>window.open('admin_login.php?not_admin=You are not an Admin!','_self')</script>";
}

else{

?>

<!DOCTYPE>


<html>

	<head>

		<title>Admin Panel</title>
		
		<link rel="stylesheet" href="styles/admin_style.css" />

	</head>

<body >

  		<div class="main_wrapper">

   			<div id="header"></div>
   
     			<div id="right">
   
   				<h2 style="text-align:center;">Manage Content</h2>
   
   				<a href="index.php?insert_product">Insert New Product</a>
   
   				<a href="index.php?view_products">View All Products</a>
   
    			<a href="index.php?insert_cat">Insert New Catagories</a>
   
    			<a href="index.php?view_cats">View All Catagories</a>
   
   				<!--<a href="index.php?insert_brand">Insert New Brands</a>
	
				<a href="index.php?view_customers">View Customers</a>
	
				<a href="index.php?view_brands">View Brands</a>
   
	 			<a href="index.php?view_orders">View Orders</a>
	 
    			<a href="index.php?view_payments">View Payments</a>!-->
	
	  			<a href="logout.php">Admin Logout</a>
   
   
   			</div>

   				<div id="left">
   				
   				 <?php
				
				if(isset($_GET['insert_product'])){
				include("insert_product.php");
			}
				if(isset($_GET['view_products'])){
				include("view_products.php");
			}
	
				if(isset($_GET['edit_pro'])){
				include("edit_pro.php");
			}

			if(isset($_GET['insert_cat'])){
				include("insert_cat.php");
			}

			if(isset($_GET['view_cats'])){
				include("view_cats.php");
			}

			if(isset($_GET['edit_cat'])){
				include("edit_cat.php");
			}

				?>
   
  		 		</div>
   
   
  	</div>
  
</body>

</html>

<?php } ?>