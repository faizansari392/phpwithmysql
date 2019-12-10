<?php include('validCRUDform.php');
error_reporting(0);
?>
<?php 
  session_start();  
/*if(!isset($_SESSION)) 
    { 
        session_start(); 
    } */
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <title>Student System</title>
  <link rel="stylesheet" type="text/css" href="Stud_CRU.css">  
</head>
<body>
    <div class='full'>
  <div class="stu_all">
    <div class="content">
      <h1>Student Management System</h1>
      <?php  if (isset($_SESSION['username'])) : ?>
            <p class="wel">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <?php endif ?>

    </div>
  </div>
    <div class="data">
      <div class="table1">
        <table class="tablea">
          <tr>
            <th>ID</th>
            <th>Student name</th>
            <th>Email address</th>
            <th>Date of birth</th>
            <th>Gender</th>
            <th>Contact no</th>
            <th>Address</th>
            <th>Class</th>
            <th>UPDATE</th>
            <th>DELETE</th>
          </tr>
          <?php
          include('db_connect.php');
          //session_start();
          $q="SELECT * FROM student_records";
          $query=mysqli_query($conn,$q);
          while($res=mysqli_fetch_array($query))
          {
        ?>
          <tr style="text-align: center;">
            <td ><?php echo $res['Id']; ?></td>
            <td><?php echo $res['Student_Name']; ?></td>
            <td><?php echo $res['Email_address']; ?></td>
            <td><?php echo $res['Date_of_birth']; ?></td>
            <td><?php echo $res['Gender']; ?></td>
            <td><?php echo $res['Contact_no']; ?></td>
            <td><?php echo $res['Address']; ?></td>
            <td><?php echo $res['Class']; ?></td>
            <td class="upda"><button class="update"><a href="update.php?Id=<?php echo $res['Id']; ?>">Update</a> </button></td>
            <td><button class="delete"><a href="delete.php?Id=<?php echo $res['Id']; ?>">Delete</a> </button></td>
          </tr>
          <?php
            }
          ?>
          </table>
        </div><br>

          <div>
          <table class="tableb">
            <tr>
              <th>ID</th>
            <th>Department</th>
            <th>Roll no</th>
            <th>Is regular</th>
            <th>Created by</th>
            <th>Date added</th>
            <th>Date updated</th>
            <th>UPDATE</th>
            <th>DELETE</th>
          </tr>

          <?php
          include('db_connect.php');
          //session_start();
          $q="SELECT * FROM student_records";
          $query=mysqli_query($conn,$q);
          while($res=mysqli_fetch_array($query))
          {
        ?>

          <tr style="text-align: center;">
            <td ><?php echo $res['Id']; ?></td>
            <td><?php echo $res['Department']; ?></td>
            <td><?php echo $res['Roll_number']; ?></td>
            <td><?php echo $res['Is_regular']; ?></td>
            <td><?php echo $res['Student_Name']; ?></td>
            <td><?php echo $res['date_added']; ?></td>
            <td><?php echo $res['date_updated']; ?></td>
            <td><button class="update"name="updated"><a href="update.php?Id=<?php echo $res['Id']; ?>">Update</a> </button></td>
            <td><button class="delete"><a href="delete.php?Id=<?php echo $res['Id']; ?>">Delete</a> </button></td>
          </tr>
          <?php
            }
          ?>
        </table>
        </div>
    </div>
    <div><br><br><br>
      <form method="post"action="CRUDform.php">
          <center><input style="height: 40px;;background-color: #4CAF50;color: white;border-radius: 5px;font-size: 15px;" id="create"type="submit" name="submit1" value="Create new user">
          <!-- logged in user information -->
          <?php  if (isset($_SESSION['username'])) : ?>
            <strong class="btn"style="font-size: 25px;"><a class="log_out" href="index1.php?logout='1'">logout</a></strong>
          <?php endif ?>

          </center>
<!-- -->
          <div class="content">
          <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
              <h3>
                <?php 
                  echo $_SESSION['success']; 
                  unset($_SESSION['success']);

                ?>

              </h3>
            </div>
          <?php endif ?>

          
      </form>
      </div>
    </div>
  </div>
    <!-- -->
</body>
</html>