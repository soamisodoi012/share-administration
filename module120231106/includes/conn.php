<?php
	$conn = new mysqli('localhost', 'shareUser', 'GbbSh@#$!..Prod', 'gbb_share');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>