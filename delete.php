<?php
include('db_connect.php');
$id=$_GET['Id'];
$q="DELETE FROM student_records WHERE Id=$id";
mysqli_query($conn,$q);
header('location:index1.php');
?>