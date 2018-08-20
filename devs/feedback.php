<!DOCTYPE html>
<html>
<head>
<?php
	require_once("../includes/database.php");

?>
	<title></title>
</head>
<body>
<?php
	if (isset($_POST['submit'])) {
		$id = $_POST['customer'];
		$body = $_POST['body'];
		$time = time();

		$q = "insert into feedback values(NULL,$id,'$body',$time,NULL,NULL,NULL)";
		query($q);
		echo "<h2>Feedback submitted</h2>";
	}
?>
	<form action="/devs/feedback.php" method="post">
		Your feedback <br>
		<textarea name="body"></textarea><br>
		Posting as:<br>
		<select name="customer">
		<?php
			$q1 = "select * from customer";
			$res = query($q1);
			while ($row = mysqli_fetch_array($res)) {
				echo "<option value=$row[0]>". $row['first_name'] ." ".$row['last_name']."</option>";
			}
		?>	
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>
<?php  CloseDb(); ?>
</body>
</html>