<?php include('validCRUDform.php'); 
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
			<marquee direction="right"behavior="alternate"><h1>Registration Form for CRUD system</h1></marquee>
			<hr>
		</div>
	<div class="full">
	<form class="form" method="post"action="CRUDform.php">
		<?php include('errorCRUD.php');?>
		<div>
			<label for="S_name"class="stud_n">Student Name</label><br>
			<?php
			if(isset($_POST['submit']))
			{
			//	$studentname=$_POST['studentname'];
				if(empty($studentname))
				{
					echo "<span style='color:red; '>Student name is required</span>";
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
			<input id="S_name"type="text" class="stud_name" name="studentname" placeholder="Student Name"value="<?php
			if(isset($_POST['submit']))
			{
				 echo $studentname;
			}
			else
			{
				$studentname='';
			}
			?>">
			<br>
		</div>
		<div>
			<label for="E_mail"class="Email_Add">Email address</label><br>
			<?php
			if(isset($_POST['submit']))
			{
				if(empty($emailaddress))
				{
					echo "<span style='color:red; '>Email address is required</span>";
				}	
			}
			?>
			<input type="email"id="E_mail" class="E_addr" name="emailaddress" placeholder="Email address"value="<?php
			if(isset($_POST['submit']))
			{
				 echo $emailaddress;
			}
			else
			{
				$emailaddress='';
			}
			?>">
			<br>
		</div>
		<div>
			<label for="d_ob"class="dob">Date of birth</label><br>
			<?php
			if(isset($_POST['submit']))
			{
				if(empty($dateofbirth))
				{
					echo "<span style='color:red; '>Date of birth is required</span>";
				}	
			}
			?>
			<input type="date" id="d_ob"class="d_o_b" name="dateofbirth" placeholder="Date of birth"value="<?php
			if(isset($_POST['submit']))
			{
				 echo $dateofbirth;
			}
			else
			{
				$dateofbirth='';
			}
			?>">
			<br>
		</div>
		<div>
			<label for="G_der"class="gen">Gender</label><br>
			<?php
			if(isset($_POST['submit']))
			{
				if(empty($_POST["gender"]))
				{
					echo "<span style='color:red; '>Select Gender</span><br>";
				}
			}
			?>
			 <label><input type="radio" id="G_der"class="gen_der" name="gender" <?php if($gender == 'Male'){ echo "checked=checked";}?> value="Male">Male</label>
			 <label><input type="radio" id="G_der"class="gen_der" name="gender" <?php if($gender == 'Female'){ echo "checked=checked";}?>value="Female">Female<br></label>
		</div>
		<div>
			<label for="c_no"class="P_label">Contact no</label><br>
			<?php
			if(isset($_POST['submit']))
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
			<input type="text"id="c_no" class="con_no" name="contactno" placeholder="Contact no"value="<?php
			if(isset($_POST['submit']))
			{
				 echo $contactno;
			}
			else
			{
				$contactno='';
			}
			?>">
			<br>
		</div>
		<div>
			<label for="add"class="add_ress">Address</label><br>
			<?php
			if(isset($_POST['submit']))
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
			<textarea rows="4" cols="50" class="addr"name="address"><?php {echo $address;}?></textarea>
		</div>
		<div>
			<label for="c_lass"class="class">Class</label><br>
			<?php

			if(isset($_POST['submit']))
			{
				if($_POST['class']=='SELECT')
				{
					echo "<span style='color:red;'>Select Class</span><br>";
				}	
			}
			?>
		<select id="c_lass" name="class">
		  <option value="SELECT">SELECT</option>
		  <option <?php if($class == 'FYCS'){ echo"selected='selected'"; }?> value="FYCS">FYCS</option>
		  <option <?php if($class == 'SYCS'){echo"selected='selected'"; }?> value="SYCS">SYCS</option>
		  <option <?php if($class == 'TYCS'){echo"selected='selected'"; }?> value="TYCS">TYCS</option>
		  <option <?php if($class == 'FYIT'){echo"selected='selected'"; }?> value="FYIT">FYIT</option>
		  <option <?php if($class == 'SYIT'){echo"selected='selected'"; }?> value="SYIT">SYIT</option>
		  <option <?php if($class == 'TYIT'){echo"selected='selected'"; }?> value="TYIT">TYIT</option>
		  <option <?php if($class == 'OTHERS'){echo"selected"; }?> value="OTHER">OTHERS</option>
		</select>
		</div>	
		<div>
			<label for="dpart"class="d_part">Department</label><br>
			<?php

			if(isset($_POST['submit']))
			{
				if($_POST['department']=='SELECT')
				{
					echo "<span style='color:red;'>Select department</span><br>";
				}	
			}
			?>
		<select class="depart"name="department">
		  <option value="SELECT">SELECT</option>
		  <option <?php if($department == 'BSCIT'){ echo"selected='selected'"; }?>value="BSCIT">BSC IT</option>
		  <option <?php if($department == 'BSCCS'){ echo"selected='selected'"; }?>value="BSCCS">BSC CS</option>
		  <option <?php if($department == 'OTHERS'){ echo"selected='selected'"; }?>value="OTHERS">OTHER</option>
		</select>
		</div>	
		<div>
			<label for="roll"class="roll_no">Roll number</label><br>
			<?php
			if(isset($_POST['submit']))
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
			<input type="text"id="roll" class="r_no" name="rollnumber" placeholder="Roll number"value="<?php
			if(isset($_POST['submit']))
			{
				 echo $rollnumber;
			}
			else
			{
				$rollnumber='';
			}
			?>">
			<br>
		</div>	
		<div>
			<label for="Con_p"class="C_label">Is regular</label><br>
			<?php
			if(isset($_POST['submit']))
			{
				if(empty($_POST['regular']))
				{
					echo "<span style='color:red;'>Select Yes/No</span><br>";
				}	
			}
			?>
			<label><input type="radio" name="regular" <?php if($regular == 'Yes'){ echo "checked=checked";}?> value="Yes">Yes</label>&nbsp;&nbsp;&nbsp;
			<label><input type="radio" name="regular" <?php if($regular == 'No'){ echo "checked=checked";}?>value="No">No</label><br>
		</div>	
	
		<div>
      		
      		<input type="submit" value="Submit"class="submit_btn"name="submit">

   	    </div>
	</form>
	</div>
</div>
</div>
</body>
</html>