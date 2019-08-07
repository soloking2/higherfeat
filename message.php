<?php
if(isset($_GET['msg'])){
$message = "No message";
$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
if($msg == "Record Not Found"){
	$message = '<h2>You are not a Registered Tutor <br/><span><a href="login.php"> Click Here To Go Back</a><span></h2>';
} else if($msg == 'success'){
	$message = "<h4>Thanks for registering your kid with us. We will contact you as soon as possible to give you the details of your tutor.</h4>";
}else{
	$message = $msg ."<br/><br/><span><a href='login.php'>Click Here to Go Back</a></span>";
}
}
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
	<link rel="stylesheet" href="css/register.css">
	<link rel="icon" type="image/png" href="higherfeats/higherfeat.png">
	<style>
		.work{
			margin-top: 60px;
			margin-bottom: 40px;
			box-shadow: 0px 0px 10px;
			padding: 40px;
		}
		.work h2{
			margin-top: 20px;
			padding: 20px;
		}
		.work h4{
			text-align: center;
			line-height: 1.5em;
			font-weight: 700;
		}
		.work span a{
			text-decoration: none;
			margin-top: -20px;
			font-size: 15px;
			text-align: center;
			background-color: rgba(0,0,0, .5);
			padding: 10px;
			color: #fff;
		}
	</style>
	<?php include_once "header.php"; ?>

<div class="container">
	<div class="row">
		<div class="col-lg-7 col-sm-offset-3">
			<div class="work">
				<?php echo $message;?>
			</div>
		</div>
	</div>
</div>

<?php include_once "footer.php"; ?>

</body>
</html>