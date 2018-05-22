<?php

function setComments($db) {
	if(isset($_POST['commentSubmit'])){
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];
		
		$sql = "INSERT INTO comment (user_id, date, message) VALUES ('$uid', '$date', '$message')";
		$result = mysqli_query($db, $sql);

	}
}