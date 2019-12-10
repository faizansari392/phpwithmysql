<?php
error_reporting(0);
if(isset($_POST['submit1']))
{
	$id=$_GET['Id'];
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
	if($studentname==''|| $emailaddress==''||$dateofbirth==''||$gender==''||$contactno==''||$address==''||$class==''||$department==''||$rollnumber==''||$regular=='')
	{
		header('update.php');
	}
	else
	{
	$q="UPDATE student_records set Id=$id,Student_Name='$studentname',Email_address='$emailaddress',Date_of_birth='$dateofbirth',Gender='$gender',Contact_no='$contactno',Address='$address',Class='$class',Department='$department',Roll_number='$rollnumber',Is_regular='$regular',Created_by='$studentname',date_updated=CURRENT_TIMESTAMP() where id=$id";
	$query=mysqli_query($conn,$q);
	header("location:index1.php");
	}
}
?>