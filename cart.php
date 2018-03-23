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

			<h4>Welcome, <?=$_SESSION['email'];?></h4>
         	
         	<ul id="menu">

         		<li><a href="#">Home</a></li>
         		<li><a href="#">All Products</a></li>
         		<li><a href="#">My Account</a></li>
         		<li><a href="logout.php">Logout</a></li>
         		<li><a href="cart.php">Shopping Cart</a></li>
         		<li><a href="#">Contact Us</a></li>


			</ul>

			<div id="form">

				<form method="get" action="results.php" enctype="multipart/form-data">
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

                              <b>Total Items: <?php total_items(); ?> Total Price: <?php total_price(); ?></b> 
						</span>

					</div>		

					<div id="products_box">

				<form action=" " method="post" enctype="multipart/form-data">	
				
				<table align="center" width="835"  bgcolor="#ECF1F0">
				
				<tr align="center">
				<td colspan="5"><h2>Update Cart</h2></td>
			</tr>
			
			<tr align="center" bgcolor="skyblue">
  
	   		<th>Remove</th>
   	   		<th>Product</th>
   	   		<th>Quantity</th>
  	   		<th>Total Price</th>
	   	
   
		</tr>

       <?php
	   
	   $total=0;
	   
	    global $con;
	   
	   $ip=getIp();

		$sel_price= "select * from cart where ip_add='$ip'";
		
		$run_price= mysqli_query($con, $sel_price);
		
		while($p_price=mysqli_fetch_array($run_price)){
		
					$pro_id = $p_price['p_id'];
					
					$pro_price= "select * from products where product_id='$pro_id'";
		       
			        $run_pro_price= mysqli_query($con, $pro_price);
					
					while($pp_price=mysqli_fetch_array($run_pro_price)){
		
					$product_price = array($pp_price['product_price']);
					
				    $product_title =$pp_price['product_title'];
					
					 $product_image=$pp_price['product_image'];
					 
					 $single_price=$pp_price['product_price'];
					 
					 $values=array_sum($product_price);
					 
					 $total +=$values;
					
				
					
		
?>

      <tr align="center" bgcolor="white">
  
	   		<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>" /></td>
			<td><?php echo $product_title; ?><br>
			<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/>
			</td>
			<td><input type="text" name="qty" size="4" /></td>
			<td><?php echo "$" . $single_price ; ?></td>
			
   
		</tr>
		
		
		<?php } } ?>
		
		<tr>
  
	   		<td colspan="4" align="right"><b>Sub Total</b></td>
   	   		<td> <?php echo "$" . $total; ?> </td>
  	   		
   
		</tr>
		
		      <tr align="center">
  
	   		<td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
			<td><input type="submit" name="continue" value="Continue Shopping" /></td>
			<td><button><a href="checkout.php" style="text-decoration:none;color:black;">Checkout</a></button></td>
			
			
   
		</tr>
		
    
				</table>
				</form>
			
    		<?php
 
        	global  $con;
        	
        	$ip=getIp(); 
			
			if(isset($_POST['update_cart'])){
				
				foreach($_POST['remove'] as $remove_id){
					
				$delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip' ";
		
		          
	            $run_delete= mysqli_query($con,$delete_product);

				if($run_delete){
					   
			     echo "<script>window.open('cart.php','_self')</script>" ;
				 
			}
				
		}
			
	}
			
			if(isset($_POST['continue'])){
				
				echo "<script>window.open('results.php','_self')</script>" ;
				
			}
			
	?>					
					</div>


					</div>

		</div>			
					
		<!--Content wrapper ends-->


		<div id="footer">
		
		<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by Nishat&Kowshik</h2>
		
		</div>


</div>

<!--Main Container ends here-->



</body>

</html>

<?php } ?>