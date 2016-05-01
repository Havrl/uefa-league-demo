<?php include('database.php'); ?>







<?php
	//Assign post variables
	$full_name = mysqli_real_escape_string($connect, $_POST['full_name']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	
	mysqli_query($connect,"INSERT INTO user (full_name,email,password)
											VALUES ('$full_name','$email','$password')");
											
	if(mysqli_affected_rows($connect) > 0){
		echo "<p>Registration Succesful!</p>";
		echo "<a href=\"index.php\">Go Back</a>";
	} else {
		echo "Registration Failed<br />";
		echo mysqli_error ($connect);
	}
?>


<!DOCTYPE html>
<html>
<head>
<style>
	label{display:inline-block;width:100px;}
</style>
<title>Add User</title>
</head>
<body>
<h1>Add New User</h3>
	<form method="post" action="register.php">
		<label>Full Name: </label>
		<input type="text" name="full_name"><br />
		<label>Email: </label>
		<input type="text" name="email"><br />
		<label>Password: </label>
		<input type="text" name="password"><br /><br />
		<input type="submit" value="Register" />
	</form>
</body>
</html>