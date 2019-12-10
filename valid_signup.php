<?php
//session_start();
error_reporting(0);
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
$username="";
$firstname="";
$lastname="";
$email_add="";
$password="";
$c_password="";
$errors=array();
//header('location:login.php');
include('db_connect.php');
if(isset($_POST['submit']))
{
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$firstname=mysqli_real_escape_string($conn,$_POST['F_name']);
	$lastname=mysqli_real_escape_string($conn,$_POST['L_name']);
	$email_add=mysqli_real_escape_string($conn,$_POST['E_address']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$c_password=mysqli_real_escape_string($conn,$_POST['C_password']);

		if(empty($username))
		{
			array_push($errors, "Username is required.");
		}
				else if(strlen($username)<=2)
				{
					array_push($errors,"Username be greater than 4.");
				}
				else if(!preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/",$username))
				{
						array_push($errors,"Username Allowed both character & no.");
				}
				else if(strlen($username)>=20)
				{
						array_push($errors,"Username must be less than 20.");
				}	
	if(empty($firstname))
	{
		array_push($errors, "Firstname is required.");
	}
				else if(strlen($firstname)<=2)
				{
					array_push($errors,"Firstname must be greater than 2.");
				}
				elseif(!preg_match("/^[a-zA-Z'-]+$/",$firstname))
				{
					array_push($errors,"Firstname Allowed only character.");
				}
				elseif(strlen($firstname)>=20)
				{
					array_push($errors,"Firstname must be lessthan 20.");
				}	
	if(empty($lastname))
	{
		array_push($errors, "Lastname is required.");
	}
				else if(strlen($lastname)<=2)
				{
					array_push($errors,"Lastname must be greater than 2.");
				}
				elseif(!preg_match("/^[a-zA-Z'-]+$/",$lastname))
				{
						array_push($errors,"Lastname Allowed only character.");
				}
				elseif(strlen($lastname)>=20)
				{
						array_push($errors,"Lastname must be lessthan 20.");
				}
				else if($firstname==$lastname)
				{
					array_push($errors,"Firstname and Lastname doesn't same.");
				}	
	if(empty($email_add))
	{
		array_push($errors, "Email id is required.");
	}
	if(empty($password))
	{
		array_push($errors, "Password is required.");
	}
				else if(!preg_match("/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/",$password))	
				{
					array_push($errors,"Password Contains alphabets & characters.");
				}
				else if(strlen($password)<=8)
				{
					array_push($errors,"Password greater than equal to 8.");
				}
	else if(empty($c_password))
	{
		array_push($errors, "Enter the Confirm Password.");
	}
	else if($password!=$c_password)
	{
		array_push($errors, "Password doesn't match.");
	}
	//
	$user_check_query = "SELECT * FROM user WHERE Username='$username' OR Email_address='$email_add' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email_address'] === $email_add) {
      array_push($errors, "email already exists");
    }
  }
  //
	if(count($errors)==0)
	{
		$sql="INSERT INTO user (Username,Firstname,Lastname,Email_address,Password) values('$username','$firstname','$lastname','$email_add','$password') ";
	mysqli_query($conn,$sql);
	session_unset();
	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
	}
}
	if(isset($GET['logout']))
	{
		session_unset();
		session_destroy();
		unset($_SESSION['username']);
		header('location:login.php');
	}
?>