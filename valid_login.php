<?php
include('db_connect.php');
if(isset($_POST['login']))
{
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	if(empty($username))
	{
		array_push($errors, "Username is required");
	}
	if(empty($password))
	{
		array_push($errors, "Password is required");
	}
	if(count($errors)==0)
	{
		//$password=md5($password);
		$query="SELECT * FROM user WHERE Username='$username' AND Password='$password'";
		$results=mysqli_query($conn,$query);
		if(mysqli_num_rows($results)==1)
		{
			session_unset();
			$_SESSION['username'] = $username;
  			$_SESSION['success'] = "You are now logged in";
  			header('location: index1.php');
		}
		else
		{
			array_push($errors,"The username/password is incorrect");
			
		}
	}
}
?>