<?php 
	include_once('config.php')
?>

<?php
	$sql = "DELETE FROM tasks WHERE TaskId ='" . $_GET["TaskId"] . "'";
	mysqli_query($conn, $sql);
	header('location: index.php');
?>