<?php include('valid_signup.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="login.css">  
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
			<marquee direction="right"behavior="alternate"><h1>Login Form</h1></marquee>
			<hr>
		</div>
	<div class="full">
	<form class="form"action="login.php"method="post">
		<?php include('errors.php');?>
		<div><br><br>
			<label for="User"class="U_label">User Name</label><br>
			<input id="User"type="text" class="Username" name="username" placeholder="Username"value="<?php  echo $username;?>"><br>
		</div>
		<br>
		<div>
			<label for="Pass"class="P_label">Password</label><br>
			<input type="password"id="Pass" class="Password" name="password" placeholder="Password"><br>
		</div>
		<br>
		<div>
      		<input type="submit" value="login"class="login_btn"name="login">
      		<a href="Sign_up.php"target="_self"><input type="button" name="Register"value="Register"class="submit_btn"></a>
   	    </div>
	</form>
	</div>
</div>
</div>
</body>
</html>