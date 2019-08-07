<?php
include_once 'admin_log.php';
if(!isset($_SESSION['admin'])){
	header("location: admin_check.php");
	exit();
}
?>
<?php
$check2 = mysqli_query($con, "SELECT COUNT(id) FROM `parents`");
$query2 = mysqli_fetch_row($check2);
$checkTotal = $query2[0];

$query = mysqli_query($con, "SELECT COUNT(id) FROM `tutors`");
$query_run = mysqli_fetch_row($query);
$total = $query_run[0];

$rpp = 5;
$last = ceil($total/$rpp);
if($last < 1){
	$last = 1;
}
$pagenum = 1;
if(isset($_GET['page'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['page']);
}	
	if($pagenum < 1){
		$pagenum = 1;
	} else if($pagenum > $last){
		$pagenum = $last;
	}
	$limit = 'LIMIT '. ($pagenum - 1) * $rpp .',' .$rpp;
	$query = "SELECT * FROM `parents` ORDER BY id ASC $limit";
	$query2 = mysqli_query($con,$query);
	
	$textline = "<b>$total</b>";
	$textline1 = "Page <b>$pagenum</b> of <b>$last</b>";
	
	$paginationCtrls = '';
	if($last != 1){
		if($pagenum > 1){
			$previous = $pagenum - 1;
			$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$previous.'">Previous</a> &nbsp; &nbsp; ';
			for($i = $pagenum-4; $i < $pagenum; $i++){
				if($i > 0){
					$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$i.'">'.$i.'</a> &nbsp; ';
				}
			}
		}
		$paginationCtrls .= ''.$pagenum.' &nbsp;';
		for($i = $pagenum+1; $i <= $last; $i++){
			$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$i.'">'.$i.'</a> &nbsp;';
			if($i >= $pagenum+4){
				break;
			}
		}
		if($pagenum != $last){
			$next = $pagenum + 1;
			$paginationCtrls .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$next.'">Next</a> &nbsp; &nbsp; ';
		}
	}
		
	$list = '';
	while($row = mysqli_fetch_array($query2, MYSQLI_ASSOC)){
		$id = $row["id"];
		$parent_name = $row["parent_name"];
		$parent_no = $row["parent_no"];
		$parent_address = $row["parent_address"];
		$child_name = $row["child_name"];
		$child_class = $row["child_class"];
		$days_teach = $row["days_teach"];
		$time_of_day = $row["time_of_day"];
		$child_goal = $row["child_goal"];
		$child_age = $row["child_age"];
		$parent_email = $row["parent_email"];
		$no_of_subject = $row["no_of_subject"];
		$date = date_create($row["date_registered"]);
		$subject = $row["subject"];
		$format = date_format($date, "F d, Y");
		$list .= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space2">
		<div class="col-lg-10 col-sm-offset-1">
		<div class="row">
			<div class="col-lg-5 col-md-5">
				<h4>Parent\'s Details</h4>
				<p>Parent Name:'.$parent_name.'</p>
				<p>Parent No.: '.$parent_no.'</p>
				<p>Parent\'s email: '.$parent_email.'</p>
				<p>Parent\'s address: '.$parent_address.'</p>
				<p>Goal to achieve: '.$child_goal.'</p>
				<p>Date registered: '.$format.'</p>
			</div>
			<div class="col-lg-7 col-md-7">
				<h3>Child\'s Details</h3>
				<p>Child\'s name: '.$child_name.'</p>
				<p>Child\'s class: '.$child_class.'</p>
				<p>Child\'s age: '.$child_age.'</p>
				<p>Days and Time for tutoring: '.$days_teach.' - '.$time_of_day.'</p>
				<p>No. of subjects: '.$no_of_subject.'</p>
				<p>Chosen subject(s): '.$subject.'</p>
			</div>
		</div>
	</div>
	</div>';
	}
mysqli_close($con);

?>


<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="icon" type="image/png" href="higherfeats/higherfeat.png">
<title>Admin Dashboard</title>
<style>
	body{
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
#pagination_controls{
	font-size:20px;
}
#pagination_controls a{
	color:#333;

}
#heading{
	text-decoration:none;
}
#pagination_controls > a:visited{
	color:#06F;
}
	</style>

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
				<li class="active"><a href="admin_parents.php"><i class="fa fa-hand-o-right"></i>Parents' Dashboard</a></li>
				<li><a href="congrats.php"><i class="fa fa-hand-o-right"></i>Post Message</a></li>
				<li><a href="newsletter.php"><i class="fa fa-hand-o-right"></i>Received messages</a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i>Log out</a></li>
			</ul>
			
		</div>
		</div>
		<div class="col-lg-9 col-md-9">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div style="background:#222; color:#FFF; text-align:center; padding: 5px;">
						<h4><?php echo $textline;?></h4>
						<h4><span class="fa fa-user"></span> Tutors</h4>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div style="background:#222; color:#FFF; text-align:center; padding: 5px;">
						<h4><?php echo $checkTotal;?></h4>
						<h4><span class="fa fa-user"></span> Parents</h4>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 textline">
						<p><?php echo $textline1; ?></p>
					</div>
					<?php echo $list; ?>
				</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div id="pagination_controls">
					<?php echo $paginationCtrls; ?>
					</div>
				</div>
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
