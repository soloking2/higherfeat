<?php
include_once 'admin_log.php';
if(!isset($_SESSION['admin'])){
	header("location: admin_check.php");
	exit();
}
?>
<?php
include_once 'php/db.php';
if(isset($_POST['client']) && isset($_POST['message']) && isset($_FILES['pic']['name'])){
	$client_name = preg_replace('#[^0-9a-z A-Z]#', '', $_POST['client']);
	$msg = preg_replace('#[^0-9a-z A-Z.]#', '', $_POST['message']);

	$file_name = $_FILES["pic"]["name"];
	$tmp_name = $_FILES["pic"]["tmp_name"];
	$size = $_FILES["pic"]["size"];
	$extension = strtolower(substr($file_name, strpos($file_name, '.') + 1));
	$type = $_FILES["pic"]["type"];
	$location = "uploaded/";
	$max_size = 100000;

		if(!empty($client_name) && !empty($msg)){
			if(!empty($file_name)){
				if($size < $max_size){
			if(($extension =="jpg" || $extension =="png" || $extension=="jpeg") && ($type=="image/jpeg" || $type=="image/jpg" || $type=="image/png")){
				
					$query = mysqli_query($con, "INSERT INTO `testimonies`(names,message,post_date) VALUES('$client_name', '$msg', now())");
					$id = mysqli_insert_id($con);

					$query2 = "SELECT picture FROM `testimonies` WHERE `id`='$id' LIMIT 1";
					$check = mysqli_query($con,$query2);
					$row = mysqli_fetch_row($check);
					$picture = $row[0];
					if($picture != ""){
						$pic = $location.$picture;
						if(file_exists($pic)){unlink($pic);}
					}
						
						$moveResult = move_uploaded_file($tmp_name, $location.$file_name);
						if($moveResult != true){
							$show_error = "File Upload Failed";
						} else {
							$success = "Successfully uploaded";
						}
					
						$query3 = "UPDATE `testimonies` SET `picture`='$file_name' WHERE `id`='$id' LIMIT 1";
						$query_run = mysqli_query($con, $query3);
						exit();
	
} else {
	echo "<script>alert('Image is not jpg, jpeg, or png')</script>";
}
}else {
		echo "<script>alert('Image size must be less than 100Kb')</script>";
	}
 }else{
	echo "<script>alert('Please select a file')</script>";
} 
}else {
	echo "<script>alert('Please fill all fields')</script>";
}
}

mysqli_close($con);
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
				<li class="active"><a href="congrats.php"><i class="fa fa-hand-o-right"></i>Post Message</a></li>
				<li><a href="newsletter.php"><i class="fa fa-hand-o-right"></i>Received messages</a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
			</ul>
			
		</div>
		</div>
		<div class="col-lg-9 col-md-9">
			<div class="formTestimony">
				<h2>Post Testimonies of Clients about Higherfeat Tutors</h2>
			<form method="POST" action="<?php $_SERVER['PHP_SELF'];?>" id="post_testimony" enctype="multipart/form-data">
				<div class="row">
				<div class="col-lg-4 col-md-4">
						<div class="box">
							<img src="higherfeats/Male.png">
						</div>
					<div class="form-group">
						<input type="file" name="pic" class="form-control">
					</div>
				</div>
				<div class="col-lg-8 col-md-8">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label for="name">Name of Client</label>
								<input type="text" name="client" id="client" class="form-control">
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label for="Message">Message</label>
								<textarea type="comment" cols="10" rows="6" class="form-control" name="message"></textarea>
							</div>
						</div>
				</div>
			</div>
				<div class="col-lg-12 col-md-12">
					<div class="form-group">
						<button type="submit" id="sub" name="sub" class="btn btn-success">SUBMIT</button>
					</div>
				</div>
			</div>
			</form>
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