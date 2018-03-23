<?php

include("includes/db.php");
	
	if(isset($_POST['action'])){ 

		if($_POST['action']=="signup"){

    	    $name       = mysqli_real_escape_string($con,$_POST['name']);
	        $email      = mysqli_real_escape_string($con,$_POST['email']);
        	$password   = mysqli_real_escape_string($con,$_POST['password']);
        	$query = "SELECT email FROM users where email='".$email."'";
        	$result = mysqli_query($con,$query);
        	$numResults = mysqli_num_rows($result);
        	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ // Validate email address
        
            $message =  "Invalid email address please type a valid email!!";
            echo("$message");
        }

        elseif($numResults>=1){

            $message = "Name or Email already exist!!";
			echo("$message");
        }

        else{
     
            mysqli_query($con,"insert into users(name,email,password) values('".$name."','".$email."','".$password."')");
           // $message = "Signup Sucessfully!!";
		   //echo("$message");

            header("location:login.php");
        }
    }
}
 
?>


<!DOCTYPE html>
<html>
	<head>
		
		<title>K&K</title>
		<link rel="stylesheet" type="text/css" href="styles/user_login_des.css" />

	</head>
	
	
	<body>
		<div class="wrapper">
			<div class="loginContent">
				<div class="loginName">
					<h1>User Signup</h1>
				</div>
				<div class="loginspace">
					<div class="login">
						<form action="" method="post">			
							<p><input id="name" name="name" type="text" placeholder="Name" required="required"></p>
   						    <p><input id="email" name="email" type="text" placeholder="Email" required="required"></p>
    						<p><input id="password" name="password" type="password" placeholder="Password" required="required">
    						<p><input name="action" type="hidden" value="signup" /></p>
    						<p><input type="submit" value="Signup" /></p>
						</form>

						

						
					<div>			
				</div>
			</div>
		</div>
	</body>
</html>