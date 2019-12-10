<?php
$db_host='localhost';
$db_user="faizansari392";
$db_password="faizansari7";
$db_name='stu_manage_system';
$conn=mysqli_connect($db_host,$db_user,$db_password,$db_name);
if(!$conn){
	die("Connection Failed");
}
/*else
{
	echo("Connection failed: " . mysqli_connect_error());
}*/
?>