<?php
include_once 'php/login_session.php';
if(!isset($_SESSION['email']) && !isset($_SESSION['passkey'])){
	header("Location: login.php");
	exit();
}

//$profile_pics = "";

$query = "SELECT * FROM `tutors` WHERE `id`=? LIMIT 1";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$tutor = $stmt->get_result();
while($tutor_info = $tutor->fetch_assoc()){
	//$tutor_id = $tutor_info['id'];
	$fullname = $tutor_info['fullname'];
	$title = $tutor_info['title'];
	$gender = $tutor_info['gender'];
	$phone_no = $tutor_info['phone'];
	$tutor_email = $tutor_info['email'];
	$age = $tutor_info['age'];
	$first = $tutor_info['first_subject'];
	$second = $tutor_info['second_subject'];
	$date = date_create($tutor_info['cdate']);
}
/*$profile_pics = '<img src="uploads/'.$driver_id.'/'.$passport.'" alt="'.$fullname.'">';
if($passport == NULL){
	$profile_pics = '<img src="img/Male.png" alt="'.$fullname.'">';
}*/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/tutor.css">
	<link rel="icon" type="image/png" href="higherfeats/higherfeat.png">
	<script src="js/scroll.js"></script>
	<script src="js/ajax.js"></script>
<title><?php echo $fullname."'s Dashboard";?></title>

<?php include_once "header.php";?>

	<div class="header" id="header">
			<div id="myNav" class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<a href="index.php" class="navbar-brand"><img src="higherfeats/log.png" alt="Logo"></a>
					</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					<li role="presentation"><a href="index.php">HOME</a></li>
					<li role="presentation"><a href="php/logout.php">LOGOUT</a></li>
					<li role="presentation"><a href="parents.php">GET A TUTOR</a></li>
					</ul>
				</div>
			
		</div>
	</div>
	</div>

	<div class="dashboard">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<ul class="nav navbar-nav">
						<li><a href="tutor.php">Dashboard</a></li>
						<li><a href="#">Notifications</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="col-lg-8 col-sm-offset-3">
				<div class="ins">
					<h5><b>Welcome <?php echo $title. ' '.$fullname;?> </b></h5>
				</div>
				<hr/ >
				<div class="require">
					<h4><b>Personal Information:</b></h4>
					<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">Tutor's Phone:</label>
						<input type="text" value="<?php echo $phone_no;?>" class="form-control"/>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">Tutor's Email:</label>
						<input type="text" value="<?php echo $tutor_email;?>" class="form-control"/>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">Tutor's age:</label>
						<input type="text" value="<?php echo $age;?>" class="form-control"/>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
						<label for="name">First subject you can teach:</label>
						<input type="text" value="<?php echo $first;?>" class="form-control"/>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label for="name">Second subject you can teach:</label>
						<input type="text" value="<?php echo $second;?>" class="form-control"/>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="form-group">
						<label for="name">Date Registered:</label>
						<input type="text" value="<?php echo date_format($date, "F d, Y");?>" class="form-control"/>
						</div>
					</div>
					</div>
					
			</div>
		</div>
	</div>
</div>
</div>

	<?php include_once "footer.php"; ?>
</body>
</html>