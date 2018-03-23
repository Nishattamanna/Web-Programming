<?php

session_start();

?>


<!DOCTYPE html>
<html>
	<head>
		
		<title>Admin Area</title>
		<link rel="stylesheet" type="text/css" href="styles/admin_login_style.css" />
		<meta charset="utf-8"/>
	</head>
	
	
	<body>
		<div class="wrapper">
			<div class="loginContent">
				<div class="loginName">
					<h1>Admin Login</h1>
				</div>
				<div class="loginspace">
					<div class="login">
						<form action="admin_login.php" method="post">			
							<input type="text" name="email" placeholder="Email"/><br>
							<input type="password" name="password" placeholder="Password"/><br>
							<input type="submit" name="login">
						</form>
					<div>			
				</div>
			</div>
		</div>
	</body>
</html>


<?php

include("includes/db.php");

	if(isset($_POST['login'])){

		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);

		$sel_user = "select * from admins where user_email='$email' AND user_pass='$password'";
		$run_user = mysqli_query($con, $sel_user);
		$check_user = mysqli_num_rows($run_user);

		if($check_user==1){

			$_SESSION['user_email'] = $email;

			echo "<script>window.open('index.php?logged_in=You Have Successfully Logged in!!','_self')</script>";

		}

		else{

			echo "<script>alert('Password or Email is wrong, try again!')</script>";
		} 
	}

?>