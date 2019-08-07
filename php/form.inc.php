<?php 
	require_once "db.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$child_name = $_POST["child_name"];
		$child_class = $_POST["theClass"];
		$days = $_POST["days_teach"];
		$times = preg_replace('#[^a-z:.A-Z0-9]#', '', $_POST["time_day"]);
		$child_goal = $_POST["child_goal"];
		$number = preg_replace('#[^0-9]#', '', $_POST["noSub"]);
		$child_age = preg_replace('#[^0-9]#', '', $_POST["child_age"]);
		$parent_name = $_POST["parent_name"];
		$parent_no = preg_replace('#[^0-9]#', '', $_POST["parent_no"]);
		$parent_address = $_POST["addr"];
		$parent_email = $_POST["parent_email"];
		$sub = $_POST["subject"];
		$subject_input = implode(", ", $sub);

		if(empty($child_name) && empty($child_class) && empty($days) && empty($times) && empty($child_goal) && empty($number) && empty($child_age) && empty($parent_name) && empty($parent_no) && empty($parent_address) && empty($parent_email)){
				header('Location: ../message.php?msg=ERROR: Please fill all the fields');
				exit();
		} else if($sub == ""){
			echo "<script>alert('Please choose a subject');</script>";
			exit();
		} else {
			$query = "INSERT INTO `parents`(child_name,child_class,days_teach,time_of_day,child_goal,no_of_subject,child_age,subject,parent_name,parent_no,parent_address,parent_email,date_registered) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,now())";
			$stmt = $con->prepare($query);
			$stmt->bind_param('ssssssssssss', $child_name, $child_class, $days, $times, $child_goal, $number, $child_age, $subject_input, $parent_name, $parent_no, $parent_address, $parent_email);
			$stmt->execute();
			$stmt->store_result();

			header('Location: ../message.php?msg=success');
		}


	}
?>