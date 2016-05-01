<?php ob_start(); ?>
<?php include('database.php'); ?>


<?php if($_POST['login_submit']){
		
		$error = "";

	//Assign post variables
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	
	$query = mysqli_query($connect,"SELECT * FROM user WHERE email = '". $email."' AND password = '".$password."'");
	
	$row = mysqli_fetch_array($query);

	/* free result set */
	mysqli_free_result($query);

	/* close connection */
	mysqli_close($connect);

	if($row != null && $row['email'] == $email) {

		// redirect to admin dashboard
		header("Location:dashboard.php");

	}else {
		$error = "Either username or password incorrect.";
	}
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1"/>
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
  <title>Login</title>
</head>
<body>

<div>
  <a href="register.php">Register</a>
</div>
<h1>Please login</h1>

<?php
if(!empty($error)){
	echo "<ul><li class=\"error\">".$error."</li></ul>";
}
?>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<label>Email: </label>
		<input type="text" id="email" name="email" value="<?php if($_POST['email'])echo $_POST['email'] ?>"><br />
		<label>Password: </label>
		<input type="text" id="password" name="password" value="<?php if($_POST['password'])echo $_POST['password'] ?>"><br /><br />
		<input type="submit" name="login_submit" value="Login" />
	</form>

<script type="text/javascript" src="js/main.js"></script>

</body>
</html>