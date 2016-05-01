<?php ob_start(); ?>
<?php include('database.php'); ?>

<?php
//Create Result
$users = mysqli_query($connect,"SELECT * FROM user");
$teams = mysqli_query($connect,"SELECT * FROM team");

?>

<h1>Admin Dashboard</h1>

<table width="500" cellpadding=5 cellspacing=5 border=1>
	<tr>
	<th colspan="5">Users</th>
	</tr>
	<tr>
		<th>ID#</th>
		<th>Full Name</th>
		<th>Email</th>
		<th>Password</th>
		<th><a href="register.html">Add User</a></th>
	</tr>
	<?php while($row = mysqli_fetch_array($users)) : ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['full_name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo '<a href="delete-user?id='.$row['id'].'">Delete</a>'; ?></td>
		</tr>
	<?php endwhile; ?>
</table>

<br />
<table width="500" cellpadding=5 cellspacing=5 border=1>
	<tr>
	<th colspan="5">Teams</th>
	</tr>
	<tr>
		<th>ID#</th>
		<th>Name</th>
		<th>Logo</th>
		<th><a href="add-team.php">Add Team</a></th>
	</tr>
	<?php while($row = mysqli_fetch_array($teams)) : ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo '<a href="team-details.php?team_id='.$row['id'].'">' .$row['name']. '</a>'; ?></td>
			<td><?php echo $row['logo']; ?></td>
			<td><?php echo '<a href="delete-team?id='.$row['id'].'">Delete</a>'; ?></td>
		</tr>
	<?php endwhile; ?>
</table>

<?php 
	/* free result set */
	mysqli_free_result($users);
	mysqli_free_result($teams);

	/* close connection */
	mysqli_close($connect);
?>