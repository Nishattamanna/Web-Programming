<<?php

session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		
		<title>K&K</title>
		<link rel="stylesheet" type="text/css" href="styles/user_login_des.css" />
		<meta charset="utf-8"/>
	</head>
	
	
	<body>
		<div class="wrapper">
			<div class="loginContent">
				<div class="loginName">
					<h1>User Login</h1>
				</div>
				<div class="loginspace">
					<div class="login">
						<form action="" method="post">			
							<input type="text" name="email" placeholder="Email" required="required"/><br>
							<input type="password" name="password" placeholder="Password" required="required"/><br>
							<input name="action" type="hidden" value="login" />
							<input type="submit"  value="Login">
						</form>

						<a href="new_signup.php">New?Register Here!!</a>


					<div>			
				</div>
			</div>
		</div>
	</body>
</html>


<?php

include("includes/db.php");
	
	if(isset($_POST['action'])){ 

		    if($_POST['action']=="login"){

        		$email = mysqli_real_escape_string($con,$_POST['email']);
        		$password = mysqli_real_escape_string($con,$_POST['password']);
        		$strSQL = mysqli_query($con,"select name from users where email='".$email."' and password='".$password."'");
        		$Results = mysqli_fetch_array($strSQL);

        		if(count($Results)>=1){

            	//$message = $Results['name']." Login Sucessfully!!";
			
				//echo "$message";
        		session_start();
        		$_SESSION['email']=$email;

				header("location:results.php"); 
			}

        else{

            $message = "You are not registerd!! Signup First.";
			echo("$message");
        }        
    }

}

?>