<?php

if(isset($_POST['title']) && isset($_POST['fullname']) && isset($_POST['gender']) && isset($_POST['phone']) && isset($_POST['pwd']) &&isset($_POST['passcode']) && isset($_POST['email']) && isset($_POST['email_confirm'])&& isset($_POST['age']) && isset($_POST['tutor']) && isset($_POST['passion']) && isset($_POST['first']) && isset($_POST['second'])){

	include_once "db.php";
	$title = $_POST['title'];
	$fullname = $_POST['fullname'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$pwd = $_POST['pwd'];
	$passcode = $_POST['passcode'];
	$e = $_POST['email'];
	$email_confirm = $_POST['email_confirm'];
	$age = $_POST['age'];
	$tutor = $_POST['tutor'];
	$passion = $_POST['passion'];
	$first = $_POST['first'];
	$second = $_POST['second'];

	if(!empty($title) && !empty($fullname) && !empty($gender) && !empty($phone) && !empty($pwd) && !empty($passcode) && !empty($e) && !empty($email_confirm) && !empty($age) && !empty($tutor) && !empty($passion) && !empty($first) && !empty($second)){
			$query = "SELECT `id` FROM `tutors` WHERE `email` = ?";
			$stmt = $con->prepare($query);
			$stmt->bind_param('s', $e);
			$stmt->execute();
			$check = $stmt->get_result()->num_rows;
			if($e != $email_confirm){
				echo "Email mismatch";
				exit();
			} else if ($pwd != $passcode){
				echo "Password mismatch";
				exit();
			}else if($check == 1){
				echo "Email already taken";
			} else {

			$insert = "INSERT INTO `tutors`(title,fullname,gender,phone,password,email,age,tutored_before,passion_kids,first_subject,second_subject,cdate) VALUES('$title', '$fullname', '$gender', '$phone', '$pwd', '$e', '$age', '$tutor', '$passion', '$first', '$second', now())";
			$query = mysqli_query($con, $insert);
			$id = mysqli_insert_id($con);
			if($query == true){
				echo "signup_success";
			}
			exit();
		}
			exit();
	}
}

?>
