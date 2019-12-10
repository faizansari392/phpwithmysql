<?php include('valid_signup.php');
error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="signup.css">  
</head>
<body>
<div class="all">
	<div class="stu_all">
		<div class="content">
			<h1>Student Management System</h1>
		</div>
	</div>
	<div class="one">
		<div class="Registration">
			<marquee direction="right"behavior="alternate"><h1>Registration Form</h1></marquee>
			<hr>
		</div>
	<div class="full">
	<form class="form" method="post"action="Sign_up.php">
		<?php include('errors.php');?>
		<div>
			<label for="User"class="U_label">User Name</label><br>
			<input id="User"type="text" class="Username" name="username" placeholder="Username"value="<?php  echo $username;?>"><br>
		</div>
		<div>
			<label for="First_n"class="F_label">First Name</label><br>
			<input type="text"id="First_n" class="First_name" name="F_name" placeholder="First Name"value="<?php echo $firstname;?>"><br>
		</div>
		<div>
			<label for="Last_n"class="L_label">Last Name</label><br>
			<input type="text" id="Last_n"class="Last_name" name="L_name" placeholder="Last Name"value="<?php echo $lastname;?>"><br>
		</div>
		<div>
			<label for="Email_A"class="E_label">Email Address</label><br>
			<input type="email" id="Email_A"class="Email_address" name="E_address" placeholder="Email Address"value="<?php echo $email_add;?>"><br>
		</div>
		<div>
			<label for="Pass"class="P_label">Password</label><br>
			<input type="password"id="Pass" class="Password" name="password" placeholder="Password"><br>
		</div>
		<div>
			<label for="Con_p"class="C_label">Confirm Password</label><br>
			<input type="password"id="Con_p" class="Confirm_password" name="C_password" placeholder="Confirm Password"><br><br>
		</div>
		<div>
      		<input type="submit" value="Register"class="submit_btn"name="submit">
      		<a href="login.php"target="_self"><input type="button" name="login"value="Login"class="login_btn"></a>
   	    </div>
	</form>
	</div>
</div>
</div>
</body>
</html>