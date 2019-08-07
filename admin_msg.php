<?php
session_start();
if(!isset($_SESSION['admin'])){
	header("location:admin.php");
	exit();
}
require_once 'php/db.php';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$query = "SELECT * FROM `drivers` WHERE `id`=?";
	$stmt = $con->prepare($query);
	$stmt->bind_param('i', $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$num = $result->num_rows;
	while($fetch = $result->fetch_assoc()){
		$id = $fetch['id'];
		$name = $fetch['fullname'];
	}
}
?>
<?php
if(isset($_POST['name']) && isset($_POST['text'])){
	$name = $_POST['name'];
	$text = htmlentities($_POST['text']);
	$id = $_POST['id'];
	
	if(!empty($name) && !empty($text)){
		$send = mysqli_query($con, "INSERT INTO `merge`(`driver_id`, `driver_name`, `message`, `date`) VALUES('$id', '$name', '$text', now())");
		header("location: admin.php");
		mysqli_close($con);
	} else {
		echo "Fill all fields";
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
<link rel="stylesheet" href="css/animate.css">
<script src="js/ajax.js"></script>
<script src="js/main.js"></script>
<title>Sending Message Page</title>
<script>
function _(x){
	return document.getElementById(x);
}

function validateForm(){
	var title = _("title").value;
	var label = _("label").value;
	var text = _("text").value;
	if(title == "" || label == "" || text == ""){
		_("newPage").style.display = "block";
		alert("Please fill all the fields");
		
	}
}
</script>
</head>
<body>
<div class="wrapper">
<div id="myNav" class="navbar navbar-default" role="navigation">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<a href="#" class="navbar-brand"><img src="img/morex.png"> </a>
					</div>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li role="presentation"><a href="admin.php">Admin Home</a></li>
				</ul>
			</div>			
		</div>
	</div>
	</div>
</div>
</div>
<div class="new">
	<div class="container">
	<div class="row">
	<div class="col-lg-12 col-lg-12">
		<h4 style="color:#FFF;">Be sure to fill all fields</h4>
	</div>	
	</div>
	<div class="page">
	<div class="row">
	<div class="col-lg-12 col-md-12">
		<form method="post" class="form-horizontal" action="" id="newPage" onsubmit="return validateForm();">
		<div class="form-group">
		<input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id;?>">
		<label for="text" class="control-label col-lg-2 col-md-2">Name of the Driver</label>
		<div class="col-lg-8 col-md-8">
		<input type="text" name="name" id="name" class="form-control" value="<?php echo $name;?>">
		</div>
		</div>
		
		<div class="form-group">
		<label for="comment" class="control-label col-lg-2 col-md-2">Message Body</label>
		<div class="col-lg-8 col-md-8">
		<textarea type="comment" rows="5" name="text" id="text" class="form-control" style="border:1px solid gray;"></textarea>
		</div>
		</div>
		<div class="col-lg-10 col-md-10">
			<button type="submit" name="fill" id="fill" class="btn btn-info">Send</button>
		</form>
	</div>
	</div>
	</div>
	</div>
</div>
</div>


<!--Footer -->
	<div id="footer" class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="row">
							<div class="con">
							<h2>Admin Homepage</h2>
					</div>
					</div>
				</div>
				
				<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
					<h4>Quick Links</h4>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Get A Cab</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Hire</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Sales</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Hotel Services</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Car Accessories</a>
						<a href="#"><i class="fa fa-square-o" aria-hidden="true"></i> Truck Hire</a>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<h4>Stay Connected</h4>
						<i class="social fa fa-facebook" aria-hidden="true"></i>
						<i class="social fa fa-twitter" aria-hidden="true"></i>
						<i class="social fa fa-linkedin" aria-hidden="true"></i>
						<i class="social fa fa-pinterest" aria-hidden="true"></i>
						<i class="social fa fa-youtube" aria-hidden="true"></i>
						<i class="social fa fa-github" aria-hidden="true"></i><br>
						<form id="subscribe" method="POST" action="php/admin.inc.php">
						<input type="email" name="email" placeholder="subscribe for updates" /><button class="btn btn-success">SUBSCRIBE</button>
						</form>
						<div class="reach">
						<p><i class="fa fa-home" aria-hidden="true"></i> Regina Caeli Awka Anambra State</p>
						<p><i class="fa fa-envelope" aria-hidden="true"></i> okparapeter@gmail.com</p>
						<p><i class="fa fa-phone" aria-hidden="true"></i> +2347069338241</p>
						<p><i class="fa fa-globe" aria-hidden="true"></i> www.morextech.org</p>
						</div>
				</div>
				
			</div>
		</div>
		<p style="text-align:center; font-size:18px; padding:25px;">Morex Technology &copy; <?php echo date("Y");?></p>
	</div>
	<!-- End of Footer-->

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/bootstrap.js"></script>
</body>
</html>