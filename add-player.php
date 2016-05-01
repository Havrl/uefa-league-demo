<?php ob_start(); ?>
<?php include('database.php'); ?>


<?php 

$team_id = $_GET['team_id'];

if($_POST['add_player_submit']){
		
	$errors = array();

	//Assign post variables
	$player_name = $_POST['player_name'];
	$player_info = $_POST['player_info'];
	$team_id = $_POST['team_id'];
	
	//Check variables are not empty
	if(empty($player_name)){
		$errors[] = "Player name is required";
	} 

	if(empty($player_info)){
		$errors[] = "Player info is required";
	} 

	// If no errors then create new record
	if(empty($errors)){

		mysqli_query($connect,"INSERT INTO team_players (player_name, player_details, team_id)
											VALUES ('$player_name', '$player_info', $team_id)");

		if(mysqli_affected_rows($connect) > 0){
			// redirect to player list
			header("Location:team-details.php?team_id=$team_id");
		}else {
			$errors[] = "Failed to create new player";
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
	<?php echo '<a href="team-details.php?team_id='.$team_id.'">Back to Team Details</a>'; ?>
</div>
<h1>Add New Player</h1>

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
		<label>Player Name: </label>
		<input type="text" id="player_name" name="player_name" value="<?php if($_POST['player_name'])echo $_POST['player_name'] ?>"><br />
		<label>Player Info: </label>
		<input type="text" id="player_info" name="player_info" value="<?php if($_POST['player_info'])echo $_POST['player_info'] ?>"><br /><br />
		<input type="hidden" name="team_id" value="<?php echo $team_id; ?>">
		<input type="submit" name="add_player_submit" value="Add Player" />
	</form>

<script type="text/javascript" src="js/main.js"></script>

</body>
</html>