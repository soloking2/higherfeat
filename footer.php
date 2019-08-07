<?php
include_once "php/db.php";
$success = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$name = $_POST["full_name"];
	$email = $_POST["email"];
	$phone = $_POST["phone_number"];
	$message = $_POST["msg"];
	if(!empty($name) && !empty($email) && !empty($phone) && !empty($message)){
		$insert = "INSERT INTO 	`newsletter`(fullname,email,phone,message,ddate,read_msg) VALUES(?,?,?,?,now(),'0')";
		$stmt = $con->prepare($insert);
		$stmt->bind_param('ssss', $name, $email, $phone, $message);
		$check = $stmt->execute();
		if($check == true){
			$success = "Message sent successfully, please await response. Thanks";
		}
	} else {
		$success = "Please fill in the required fields";
	}
}
?>
<!--End of Tutors register-->
<div class="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="row">
					<div class="col-lg-4 col-md-4 higherfeat">
						<img src="higherfeats/higherfeat.jpg">
						<p>We are Higher Feats Tutors, our mandate is to be solutions to kids' challenges. We tutor your kids for a better and brighter future.<a href="#"> Read More</a></p>
					<div class="connect">
						<h3>Connect With Us</h3>
						<hr>
						<p><a href="#"><i class="fa fa-facebook"></i> Facebook</a></p>
						<p><i class="fa fa-envelope"></i> higherfeatstutors@gmail.com</p>
						<p><i class="fa fa-phone"></i> 0810766321, 09031190694</p>
					</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="link">
						<h4>Higher Feats Tutors Quick Link</h4>
							<li><a href="index.php"><span class="fa fa-square-o"></span>Home</a></li>
							<li><a href="index.php"><span class="fa fa-square-o"></span>Who We Are</a></li>
							<li><a href="register.php"><span class="fa fa-square-o"></span>Become a Tutor</a></li>
							<li><a href="login.php"><span class="fa fa-square-o"></span>Login</a></li>
							<li><a href="parents.php"><span class="fa fa-square-o"></span>Get a Tutor</a></li>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						<div class="contact" id="contact">
							<h2 class="wow fadeInUp">Contact</h2>
							<p class="wow fadeInUp" data-wow-delay="0.4s">Do you have any Questions with regards to our services, you can feel free to contact us.</p>
								<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" id="message" class="message">
								<div class="col-lg-6 col-md-6">
									<div class="input-group input-group-md wow fadeInUp" data-wow-delay="0.8s">
										<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
										<input type="text" class="form-control" aria-describedby="sizing-addon1" name="full_name" id="full_name" placeholder="Full name"/>
									</div>
									<div class="input-group input-group-md wow fadeInUp" data-wow-delay="1.2s">
										<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
										<input type="email" class="form-control" aria-describedby="sizing-addon1" name="email" id="email" placeholder="Email"/>
									</div>
									<div class="input-group input-group-md wow fadeInUp" data-wow-delay="1.6s">
										<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
										<input type="number" class="form-control" aria-describedby="sizing-addon1" name="phone_number" id="phone_number" placeholder="Phone Number"/>
									</div>
				
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="input-group wow fadeInUp" data-wow-delay="2.0s">
									<textarea name="msg" id="msg" cols="80" rows="6" class="form-control"></textarea>
								</div>
							</div>
							<button class="btn btn-lg" type="submit">Submit Your Message</button>
							<div>
								<?php echo $success;?>
							</div>
							</form>
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
<div class="ar" id="ar">
	<a type="button" onclick="return false;" onmousedown="resetScroller('adv');" class="btn btn-danger"><i class="fa fa-arrow-up"></i> <br/>TOP</a>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/bootstrap.min.js"></script>