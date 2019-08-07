<?php
session_start();
include_once 'db.php';

if(isset($_POST['email']) && isset($_POST['password'])){
	$email = $_POST["email"];
	$pass = $_POST["password"];
	if(!empty($email) && !empty($pass)){
		$query = "SELECT * FROM `tutors` WHERE `email`=? AND `password`=? LIMIT 1";
		$stmt = $con->prepare($query);
		$stmt->bind_param('ss', $email, $pass);
		$stmt->execute();
		$query_run = $stmt->get_result();
		$num = $query_run->num_rows;
		if($num == 0){
			header("Location: ../message.php?msg=Record Not Found");
			exit();
		} 
		else {
			$result = $query_run->fetch_assoc();
			$_SESSION['id'] = $result['id'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['passkey'] = $result['password'];
			
			header("Location: ../tutor.php");
		}
	}else{ 
		 header("Location: ../message.php?msg=You must Fill all fields");
	}
}

?>