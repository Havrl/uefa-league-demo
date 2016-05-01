<?php ob_start(); ?>
<?php include('database.php'); ?>

<?php

$team_id = $_GET['team_id'];

//Create Results
$team = mysqli_query($connect,"SELECT * FROM team WHERE id = $team_id" );
$team_players = mysqli_query($connect,"SELECT * FROM team_players WHERE team_id = $team_id" );

$team_row = mysqli_fetch_array($team);

$team_name = "";

if($team_row != null) {
	$team_name = $team_row['name'];
}

?>

<div>
  <a href="dashboard.php">Back to Dashboard</a>
</div>

<h1><?php echo $team_name; ?></h1>

<table width="500" cellpadding=5 cellspacing=5 border=1>
	<tr>
	<th colspan="5">Team Players</th>
	</tr>
	<tr>
		<th>ID#</th>
		<th>Name</th>
		<th>Info</th>
		<th>
			<?php echo '<a href="add-player.php?team_id='.$team_id.'">Add Player</a>'; ?>
		</th>
	</tr>
	<?php while($row = mysqli_fetch_array($team_players)) : ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['player_name']; ?></td>
			<td><?php echo $row['player_details']; ?></td>
			<td><?php echo '<a href="delete-player?id='.$row['id'].'">Delete</a>'; ?></td>
		</tr>
	<?php endwhile; ?>
</table>

<?php 
	/* free result set */
	mysqli_free_result($team);
	mysqli_free_result($team_players);

	/* close connection */
	mysqli_close($connect);
?>