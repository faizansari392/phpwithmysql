<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
.error
{
	width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
	</style> 
</head>
<body>
<?php
include('valid_signup.php');
include('valid_login.php');
  if (count($errors)>0) : ?>
  <div class="errors" style="color: red;">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
</body>
</html>