<?php
	session_start();
	include 'connect.php';

	if(!isset($_SESSION['userid']) || trim($_SESSION['userid']) == ''){
		header('location: login.php');
	}
	$sql = "SELECT * FROM user WHERE id = '".$_SESSION['userid']."'";
	$query = $con->query($sql);
	$user = $query->fetch_assoc();
?>