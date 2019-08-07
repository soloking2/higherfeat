<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="icon" type="image/png" href="higherfeats/higherfeat.png">

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
					<li role="presentation"><a href="index.php">WHO WE ARE</a></li>
					<li role="presentation"><a href="register.php">BECOME A TUTOR</a></li>
					<li role="presentation"><a href="login.php" class="active">LOGIN</a></li>
					<li role="presentation"><a href="parents.php">GET A TUTOR</a></li>
					</ul>
				</div>
			
		</div>
	</div>
	</div>


<div class="login">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2>LOGIN</h2>
			<div class="col-lg-6 col-sm-offset-4">
			<form method="POST" id="formLogin" action="php/login.inc.php">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="email" name="email" id="email" class="form-control" onfocus="this.value="""/>
				</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" name="password" id="password" class="form-control" onfocus="this.value=''"/>
				</div>
				<span id="message"></span>
				</div>
				<div class="col-lg-5 col-sm-offset-1">
				<div class="form-group">
					<button type="submit" class="btn btn-success" name="sub" id="sub" class="form-control">LOGIN</button>
				</div>
				</div>
			</form>
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