<?php
session_start();

if(isset($_SESSION['email']) && isset($_SESSION['passkey'])){
	include_once 'db.php';
	
	$tutor_email = $_SESSION['email'];
	$tutor_pass = $_SESSION['passkey'];
	
	$log = "SELECT * FROM `tutors` WHERE `email` = ? AND `password`=? LIMIT 1";
	$stmt = $con->prepare($log);
	$stmt->bind_param('ss', $tutor_email, $tutor_pass);
	$stmt->execute();
	$get = $stmt->get_result();
	$row = $get->fetch_assoc();
	$id = $row['id'];
}else{
	header("Location: ./login.php");
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>