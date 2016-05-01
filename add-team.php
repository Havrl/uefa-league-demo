<?php ob_start(); ?>
<?php include('database.php'); ?>


<?php 


if($_POST['add_team_submit']){
		
	$errors = array();

	//Assign post variables
	$team_name = $_POST['team_name'];
	$logo = $_POST['logo'];
	
	//Check variables are not empty
	if(empty($team_name)){
		$errors[] = "Team name is required";
	} 

	if(empty($logo)){
		$errors[] = "Team logo is required";
	} 

	// If no errors then create new record
	if(empty($errors)){

		mysqli_query($connect,"INSERT INTO team (name,logo)
											VALUES ('$team_name','$logo')");

		if(mysqli_affected_rows($connect) > 0){
			// redirect to admin dashboard
			header("Location:dashboard.php");
		}else {
			$errors[] = "Failed to create new team";
		}

		/* close connection */
		mysqli_close($connect);
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
  <a href="dashboard.php">Back to Dashboard</a>
</div>
<h1>Add New Team</h1>

<?php
if(!empty($error)){
	echo "<ul>";
 	foreach($errors as $error){
		echo "<li class=\"error\">".$error."</li>";
	}
	echo "</ul>";
}
?>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<label>Team Name: </label>
		<input type="text" id="team_name" name="team_name" value="<?php if($_POST['team_name'])echo $_POST['team_name'] ?>"><br />
		<label>Logo: </label>
		<input type="text" id="logo" name="logo" value="<?php if($_POST['logo'])echo $_POST['logo'] ?>"><br /><br />
		<input type="submit" name="add_team_submit" value="Add Team" />
	</form>

<script type="text/javascript" src="js/main.js"></script>

</body>
</html>