<?php

function setComments($db) {
	if(isset($_POST['commentSubmit'])){
		$uid = $_POST['user_id'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		$sql = "INSERT INTO comment (user_id, date, message) VALUES ('$uid', '$date', '$message')";
		$result = mysqli_query($db, $sql);
	}
}

function getComments($db) {
	$sql = "SELECT * FROM comment";
	$result = mysqli_query($db, $sql);
	while ($row = $result->fetch_assoc()) {
		echo "<div>";
			echo $row['user_id']."<br>";
			echo $row['date']."<br>";
			echo $row['message']."<br>";
		echo "</div><br>";
	}
		
}