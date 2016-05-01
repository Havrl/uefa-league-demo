<?php ob_start(); ?>
<?php include('database.php'); ?>

<?php

//Create Results
$teams = mysqli_query($connect,"SELECT * FROM team" );

?>

<div>
  <a href="login.php">Admin Login</a>
</div>

<h1>Select your team</h1>


<table width="500" cellpadding=5 cellspacing=5 border=1>
	<?php 
	// http://stackoverflow.com/questions/1793716/how-to-display-two-table-columns-per-row-in-php-loop
	$index = 0;

	while($row = mysqli_fetch_array($teams)) {
		if(!fmod($index,2)) echo '<tr>';

		echo '<td><a href="team-page.php?team_id='.$row['id'].'"><img src="img/' .$row['logo']. '"></a></td>';

		if(fmod($index,2)) echo '</tr>';

		$index++;
	}
	?>

</table>

<?php 
	/* free result set */
	mysqli_free_result($teams);

	/* close connection */
	mysqli_close($connect);
?>