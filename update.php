<?php
include('db_connect.php');
include('updatevalid.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="CRUDformcss.css">  
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
			<marquee direction="right"behavior="alternate"><h1>Updation Form for CRUD system</h1></marquee>
			<hr>
		</div>
	<div class="full">
	<form class="form" method="post">
		<!--<?php include('errors.php');?>-->
		<div>
			<label for="S_name"class="stud_n">Student Name</label>
			<?php
			if(isset($_POST['submit1']))
			{
			//	$studentname=$_POST['studentname'];
				if(empty($studentname))
				{
					echo "<br><span style='color:red; '>Student name is required</span>";
				}
				else if(strlen($studentname)<=2)
				{
					echo "<span style='color:red; '>Name must be greater than 2</span>";
				}
				elseif(!preg_match("/^[a-zA-Z'-]+$/",$studentname))
				{
						echo "<span style='color:red; '>Allowed only character</span>";
				}
				elseif(strlen($studentname)>=20)
				{
						echo "<span style='color:red; '>Name is incorrect</span>";
				}	
			}
			?>
			<br>
			<input id="S_name"type="text" class="stud_name" name="studentname" placeholder="Student Name"value="<?php $id=$_GET['Id'];$sql = "SELECT Student_Name FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){echo $row['Student_Name'];}?>"><br>
		</div>
		<div>
			<label for="E_mail"class="Email_Add">Email address</label><br>
			<?php
			if(isset($_POST['submit1']))
			{
				if(empty($emailaddress))
				{
					echo "<span style='color:red; '>Email address is required</span>";
				}	
			}
			?>
			<input type="email"id="E_mail" class="E_addr" name="emailaddress" placeholder="Email address"value="<?php $id=$_GET['Id'];$sql = "SELECT Email_address FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){echo $row['Email_address'];}?>"><br>
		</div>
		<div>
			<label for="d_ob"class="dob">Date of birth</label><br>
			<?php
			if(isset($_POST['submit1']))
			{
				if(empty($dateofbirth))
				{
					echo "<span style='color:red; '>Date of birth is required</span>";
				}	
			}
			?>
			<input type="date" id="d_ob"class="d_o_b" name="dateofbirth" placeholder="Date of birth"value="<?php $id=$_GET['Id'];$sql = "SELECT Date_of_birth FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){echo $row['Date_of_birth'];}?>"><br>
		</div>
		<div>
			<label for="G_der"class="gen">Gender</label><br>
			<?php
			if(isset($_POST['submit1']))
			{
				if(empty($_POST["gender"]))
				{
					echo "<span style='color:red; '>Select Gender</span><br>";
				}
			}
			?>

			 <label><input type="radio" name="gender"<?php $id=$_GET['Id'];$sql = "SELECT Gender FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Gender'] == 'Male'){ echo "checked=checked";}}?>value="Male">Male</label>&nbsp;&nbsp;&nbsp;
			 <label><input type="radio" name="gender"<?php $id=$_GET['Id'];$sql = "SELECT Gender FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Gender'] == 'Female'){ echo "checked=checked";}}?>value="Female">Female</label><br>
		</div>
		<div>
			<label for="c_no"class="P_label">Contact no</label><br>
			<?php
			if(isset($_POST['submit1']))
			{
				if(empty($contactno))
				{
					echo "<span style='color:red;'>Contact no is required</span>";
				}	
				elseif (!preg_match('/^[+]?[6-9][0-9]{9,12}$/',$contactno)) 
				{
					echo "<span style='color:red;'>Invalid number</span>";
				}
			}
			?>
			<input type="text"id="c_no" class="con_no" name="contactno" placeholder="Contact no" value="<?php $id=$_GET['Id'];$sql = "SELECT Contact_no FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){echo $row['Contact_no'];}?>"><br>
		</div>
		<div>
			<label for="add"class="add_ress">Address</label><br>
			<?php
			if(isset($_POST['submit1']))
			{
				if(empty($address))
				{
					echo "<span style='color:red;'>Address is required</span>";
				}
				else if(strlen($address)<=15 || strlen($address)>=100)
				{
					echo "<span style='color:red;'>Invalid address(greater than 15) </span>";
				}	
			}
			?>
			<textarea rows="4" cols="50" class="addr"name="address"><?php $id=$_GET['Id'];$sql = "SELECT Address FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){echo $row['Address'];}?></textarea>
		</div>
		<div>
			<label for="c_lass"class="class">Class</label><br>
			<?php

			if(isset($_POST['submit1']))
			{
				if($_POST['class']=='SELECT')
				{
					echo "<span style='color:red;'>Select Class</span><br>";
				}	
			}
			?>
		<select id="c_lass" name="class">
		  <option value="SELECT">SELECT</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Class FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Class'] == 'FYCS') echo"selected"; }?>value="FYCS">FYCS</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Class FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Class'] == 'SYCS') echo"selected"; }?> value="SYCS">SYCS</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Class FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Class'] == 'TYCS') echo"selected"; }?> value="TYCS">TYCS</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Class FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Class'] == 'FYIT') echo"selected"; }?> value="FYIT">FYIT</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Class FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Class'] == 'SYIT') echo"selected"; }?> value="SYIT">SYIT</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Class FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Class'] == 'TYIT') echo"selected"; }?> value="TYIT">TYIT</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Class FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Class'] == 'OTHERS') echo"selected"; }?> value="OTHERS">OTHERS</option>
		</select>
		</div>	
		<div>
			<label for="dpart"class="d_part">Department</label><br>
			<?php

			if(isset($_POST['submit1']))
			{
				if($_POST['department']=='SELECT')
				{
					echo "<span style='color:red;'>Select department</span><br>";
				}	
			}
			?>
		<select id="c_lass"class="depart"name="department">
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Department FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Department'] == 'SELECT') echo"selected"; }?> value="SELECT">Select</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Department FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Department'] == 'BSCIT') echo"selected";}?> value="BSCIT">BSCIT</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Department FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Department'] == 'BSCCS') echo"selected";}?> value="BSCCS">BSCCS</option>
		  <option <?php $id=$_GET['Id'];$sql = "SELECT Department FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Department'] == 'OTHERS') echo"selected";}?> value="OTHERS">OTHERS</option>
		</select>
		</div>	
		<div>
			<label for="roll"class="roll_no">Roll number</label><br>
			<?php
			if(isset($_POST['submit1']))
			{
				if(empty($rollnumber))
				{
					echo "<span style='color:red;'>Roll no is required</span>";
				}
				elseif(!preg_match('/^[+]?[1-9][1-9]$/',$rollnumber)) 
				{
					echo "<span style='color:red;'>Invalid roll number</span>";
				}	
			}
			?>
			<input type="text"id="roll" class="r_no" name="rollnumber" placeholder="Roll number"value="<?php $id=$_GET['Id'];$sql = "SELECT Roll_number FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){echo $row['Roll_number'];}?>"><br>
		</div>	
		<div>
			<label for="Con_p"class="C_label">Is regular</label><br>
			<?php
			if(isset($_POST['submit1']))
			{
				if(empty($_POST['regular']))
				{
					echo "<span style='color:red;'>Select Yes/No</span><br>";
				}	
			}
			?>
			<label><input type="radio" name="regular" <?php $id=$_GET['Id'];$sql = "SELECT Is_regular FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Is_regular'] == 'Yes'){ echo "checked=checked";}}?> value="Yes">Yes</label>&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="regular" <?php $id=$_GET['Id'];$sql = "SELECT Is_regular FROM student_records WHERE Id=$id";$result = mysqli_query($conn, $sql);while($row = mysqli_fetch_assoc($result)){if($row['Is_regular'] == 'No'){ echo "checked=checked";}}?> value="No">No<br></label>
		</div>	
	
		<div>
      		<input type="submit" value="Submit"class="submit_btn"name="submit1">
   	    </div>
	</form>
	</div>
</div>
</div>
</body>
</html>