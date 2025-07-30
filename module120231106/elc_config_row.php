<?php
include 'includes/session_popup.php';

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$sql = "SELECT * FROM elc_parameter WHERE id = '$id'";
	$query = $conn->query($sql);
	$row = $query->fetch_assoc();

	echo json_encode($row);
}
