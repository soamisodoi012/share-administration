<?php
	include 'conn.php';
	session_start();
	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: 404.php');
	}
	$sql = "SELECT * FROM admin WHERE id = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
?>