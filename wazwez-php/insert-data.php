<?php 
	include_once('config.php');
?>

<?php 
	if(isset($_POST['Submit'])) {
		$title = $_POST['Title'];
		$decs = $_POST['Description'];
		$date = $_POST['Date'];

		$sql = "INSERT INTO tasks (Title, Description, Date) VALUES ('$title','$decs','$date')";
		mysqli_query($conn,$sql);
		header('location:index.php');
	}
?>