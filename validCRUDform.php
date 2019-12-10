<?php
include('db_connect.php');
error_reporting(0);
//include('CRUDform.php');
//session_start();
$errors=array();
if(isset($_POST['submit']))
{
	$studentname=$_POST['studentname'];
	$emailaddress=$_POST['emailaddress'];
	$dateofbirth=$_POST['dateofbirth'];
	$gender=$_POST['gender'];
	$contactno=$_POST['contactno'];
	$address=$_POST['address'];
	$class=$_POST['class'];
	$department=$_POST['department'];
	$rollnumber=$_POST['rollnumber'];
	$regular=$_POST['regular'];
	
	$user_c_query = "SELECT * FROM student_records WHERE Email_address='$emailaddress' OR Roll_number='$rollnumber' LIMIT 1";
  $result = mysqli_query($conn, $user_c_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  	{ // if user exists
     if ($user['Email_address'] === $emailaddress) {
      array_push($errors, "Email already exists");
    	}

     if ($user['Roll_number'] === $rollnumber) {
      array_push($errors, "Roll no already exists");
    	}
     
	
	}
	else if($studentname==''|| $emailaddress==''||$dateofbirth==''||$gender==''||$contactno==''||$address==''||$class==''||$department==''||$rollnumber==''||$regular=='')
	{
		header('CRUDform.php');
	}
	else
	{
		$q="INSERT INTO student_records(Student_Name,Email_address,Date_of_birth,Gender,Contact_no,Address,Class,Department,Roll_number,Is_regular,Created_by,date_added) VALUES ('$studentname','$emailaddress','$dateofbirth','$gender','$contactno','$address','$class','$department','$rollnumber','$regular','$studentname',CURRENT_TIMESTAMP())";

				$query=mysqli_query($conn,$q);
				$qu="UPDATE student_records set date_updated=''where date_updated=CURRENT_TIMESTAMP()";
				$connnet=mysqli_query($conn,$qu);
				header('location:index1.php');
	}
}
?>