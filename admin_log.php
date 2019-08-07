<?php
session_start();
if(isset($_SESSION['admin'])){
	$admin_name = $_SESSION['admin'];
	require_once 'php/db.php';
	$query = "SELECT * FROM `admin` WHERE `name` = ? LIMIT 1";
	$stmt = $con->prepare($query);
	$stmt->bind_param('s', $admin_name);
	$stmt->execute();
	$check = $stmt->get_result();
	$fetch = $check->fetch_assoc();
	$name = $fetch['name'];
}

?>