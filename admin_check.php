<?php
session_start();
if(isset($_SESSION['admin'])){
	header('Location: admin.php');
	exit();
}
?>
<?php
include_once 'php/db.php';
$error_msg = "";
if(isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$pass = $_POST['password'];
	//just give the admin username and password
	if(!empty($username) && !empty($pass)){
		$query = "SELECT * FROM `admin` WHERE `name`=? AND `password`=?";
		$stmt = $con->prepare($query);
		$stmt->bind_param('ss', $username, $pass);
		$stmt->execute();
		$check = $stmt->get_result();
		$num = $check->num_rows;
		if(empty($username) || empty($pass)){
			$error_msg = "<h4 style='color:#333; font-weight:600;'>Please fill in your details</h4>";
		}	
		if($num < 1){
			$error_msg = "<h4 style='color:#333; font-weight:600;'>Your login detail is incorrect</h4>";
		}else{
		$fetch = $check->fetch_assoc();
		$_SESSION['admin'] = $fetch['name'];
		header('location: admin.php');
		exit();
		}
			
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="css/admin_msg.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="icon" type="image/png" href="higherfeats/higherfeat.png">
<title>Admin Login Page</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-7 col-sm-offset-3">
	<?php 
	if(isset($_SESSION['admin']) != "administrator"){
	echo '<h3 style="text-align:center;">Only the administrator can view this directory</h3><br />
	<div class="for">
		<h3 style="text-align:center;">Please Log In</h3>
		<form method="post" action="">
		<div class="form-group">
		<label for="usrname">Username</label>
		<input type="text" name="username" id="username" class="form-control" placeholder="Your username please" required>
		</div>
		<div class="form-group">
		<label for="pwd">Password</label>
		<input type="password" name="password" id="pass" class="form-control" placeholder="Your password please" required>
		</div>
		<div class="form-group">
		<button type="submit" name="submit" id="sub" style="width:100%;" class="btn btn-success">LOGIN</button>
		</div>
		<div class="m">
			<h4>'.$error_msg.'</h4>
		</div>
		</form>
		<a href="index.php">Go back to the homepage</a>
	
	</div>';
	exit();
	}?>
</div>
</div>
</div>
</body>
</html>