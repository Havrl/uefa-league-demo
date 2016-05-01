<?php ob_start(); ?>
<?php include('database.php'); ?>

<?php
    $user_id = $_GET['id'];

    mysqli_query($connect,"DELETE FROM user WHERE id = " . $user_id);

    if(mysqli_affected_rows($connect) > 0){
      header("Location:dashboard.php?msg=userdeleted");
  } else {
    echo "Delete Failed<br />";
    echo mysqli_error ($connect);
  }