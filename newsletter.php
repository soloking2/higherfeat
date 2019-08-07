<?php
include_once 'admin_log.php';
if(!isset($_SESSION['admin'])){
	header("location: admin_check.php");
	exit();
}
?>
<?php
include_once 'php/db.php';
	$message = "";
	$query = mysqli_query($con, "SELECT * FROM `newsletter` WHERE `read_msg`='0'");
	$num = mysqli_num_rows($query);
	if($num < 1){
		$message = "No Message found in the database";
	} else {
	while($fetch = mysqli_fetch_assoc($query)){
		$id = $fetch["id"];
		$fullname = $fetch["fullname"];
		$phone = $fetch["phone"];
		$email = $fetch["email"];
		$msg = $fetch["message"];
		$date = date_create($fetch["ddate"]);
		$format = date_format($date, "F d, Y");
		$message .= '<div class="row">
						<div style="margin-top:20px;">
						<div class="col-lg-4 col-md-4 msg">
						<h4>'.$fullname.'</h4>
						<h5>'.$phone.' | '.$email.'</h5>
						</div>
						<div class="col-lg-5 col-md-5">
							<div class="back">
								<h4>Message:</h4>
								<p>'.$msg.'</p>
								<p><i class="fa fa-hand-o-right"></i>'.$format.'</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 b">
							<a id="ch" href="newsletter.php?id='.$id.'" class="btn btn-success" onclick="change();">RESOLVED</a>
						</div>
						</div>
					</div>';

	}
}
if(isset($_GET["id"])){
	$id = $_GET["id"];
	$check = mysqli_query($con, "UPDATE `newsletter` SET `read_msg`='1' WHERE `id`='$id' LIMIT 1");
	mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="icon" type="image/png" href="higherfeats/higherfeat.png">
<title>Admin Dashboard</title>
	<script>
		function change(){
			var ch = document.getElementById("ch");
			ch.innerHTML = "YES";
	}
	</script>
</head>
<body>
	<div id="adv"></div>
	<div id="myNavbar" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container-fluid">
	<div class="row">
		<div class="col-lg-7 col-md-7">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			
			<a href="#" class="navbar-brand">Dashboard</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">About US</a></li>
					<li><a href="parents.php">Get a Tutor</a></li>
					<li><a href="#">Blog</a></li>
				</ul>
			</div>
		</div>
		
		
	<div class="col-lg-5 col-md-5 hidden-xs">
		<div class="pull-right">
			<form class="form-inline" action="" method="post">
				<div class="row">
				<div class="form-group col-lg-7 col-md-7">
					<input type="search" name="search" id="search" class="form-control"  placeholder="search">
				</div>
				<div class="col-lg-4 col-sm-offset-1">
				<button type="submit" class="btn btn-success" name="search" value="search">search</button>
				</div>
				</div>
			</form>
		</div>
	</div>
	</div>
 </div>	
</div>

<div class="section">
	<div class="container-fluid">
		<div class="row">
		<div class="col-lg-3 col-md-3">
			<div class="sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li>
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<img src="higherfeats/home-tutor.jpg" alt="tutor" width="75" height="75">
					</div>
					<div class="col-lg-8 col-md-8">
						<h5 class="wow flipOutX" data-wow-iteration="infinite" style="color:rgba(0,0,0, .5); font-size:14px;"> <?php echo $name;?></h5>
						<p><?php echo "Welcome Administrator";?></p>
						<hr>
					</div>
				</div>
				</li>
				<li><a href="admin.php"><i class="fa fa-dashboard"></i>Tutors' Dashboard</a></li>
				<li><a href="admin_parents.php"><i class="fa fa-hand-o-right"></i>Parents' Dashboard</a></li>
				<li><a href="congrats.php"><i class="fa fa-hand-o-right"></i>Post Message</a></li>
				<li class="active"><a href="newsletter.php"><i class="fa fa-hand-o-right"></i>Received messages</a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
			</ul>
			
		</div>
		</div>
		<div class="col-lg-9 col-md-9">
			<h2>Messages/Queries from clients</h2>
			<div class="display">
				<?php echo $message; ?>
			</div>
		</div>
		</div>
	</div>
</div>

<div class="extend">
	<div class="container">
		<div class="col-lg-12 col-md-12">
				<p>All Rights Reserved. &copy; <?php echo date('Y');?></p>
		</div>
	</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>