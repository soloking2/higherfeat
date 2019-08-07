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
	<script src="js/scroll.js"></script>
	<script src="js/ajax.js"></script>
		<script>
			function _(x){
				return document.getElementById(x);
			}
		</script>
		<script>
			function insert(){
				var message = _("message");
				var title = _("title").value;
				var fullname = _("fullname").value;
				var gender = _("gender").value;
				var phone = _("phone").value;
				var pwd = _("pwd").value;
				var passcode = _("passcode").value;
				var email = _("email").value;
				var email_confirm = _("email_confirm").value;
				var age = _("age").value;
				var tutor = _("tutor").value;
				var passion = _("passion").value;
				var first = _("first").value;
				var second = _("second").value;
				var captcha = _("captcha").value;
				
				if(title == "" || fullname == "" || gender == "" || phone == "" || pwd =="" || passcode=="" || email=="" || email_confirm =="" || age=="" || tutor=="" || passion=="" || first=="" || second=="" || captcha==""){
					message.innerHTML = "Please fill all fields";
				} else if(pwd != passcode){
					message.innerHTML = "Password mismatch";
				} else if(pwd.length < 8){
					message.innerHTML = "Password should be more than 8 characters";
				}else if(email != email_confirm){
					message.innerHTML = "Email mismatch";
				} else if(isNaN(captcha)){
					message.innerHTML = "Input is a number";
				} else if(captcha != 12){
					message.innerHTML = "Answer is not correct";
				}
				 else {
				 	_("sub").style.display = "none";
					message.innerHTML = "<h2><span class='fa fa-spinner'></span> Please Wait...</h2>";
					var ajax = ajaxObj("POST", "php/register.inc.php");
					ajax.onreadystatechange = function(){
						if(ajaxReturn(ajax) == true){
							if(ajax.responseText == "Error"){
								_("sub").style.display = "block";
							} else {
								window.scrollTo(0,1501);
								_("formTutor").innerHTML = title+ " " +fullname+", please kindly send your CV to our email: higherfeats@gmail.com.";
							}
						}
					}
					ajax.send("title="+title+"&fullname="+fullname+"&gender="+gender+"&phone="+phone+"&pwd="+pwd+"&passcode="+passcode+"&email="+email+"&email_confirm="+email_confirm+"&age="+age+"&tutor="+tutor+"&passion="+passion+"&first="+first+"&second="+second);
				}
			}
		</script>
	<title>Become a Tutor</title>
<?php include_once "header.php";?>
		<!-- End of Advert -->
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
					<li role="presentation"><a href="register.php" class="active">BECOME A TUTOR</a></li>
					<li role="presentation"><a href="login.php">LOGIN</a></li>
					<li role="presentation"><a href="parents.php">GET A TUTOR</a></li>
					</ul>
				</div>
			
		</div>
	</div>
	</div>
	<!-- End of Navagation -->
	<div class="reg-one">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h2>TEACH WHAT YOU LOVE</h2>
					<h4>Earn money by teaching people around you.</h4>
					<a href="#" onclick="return false;" onmousedown="autoScroll('reg_two');" type="button" class="btn btn-success">Create Account <i class="fa fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<!-- End of registration one platform -->

	<!--Expectations -->
	<div class="reg-tutor">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<h2>Join our Community of Teachers</h2>
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<p><i class="fa fa-trophy"></i></p>
								<h4>Greater Opportunity</h4>
								<h5>Being a Tutor at higher feats avails you the opportunity to pursue your career, you can
								shuffle both your personal life and your career without having to crash any. Our personnel services are top notch and personal information of our tutors are keft discrete.</h5>
							</div>
							<div class="col-lg-4 col-md-4">
								<p><i class="fa fa-thumbs-up"></i></p>
								<h4>Room for Development</h4>
								<h5>Our Tutors are treated with dignity and fairness as should. We organize seminars for our tutors to help them improve.</h5>
							</div>
								<div class="col-lg-4 col-md-4">
								<p><i class="fa fa-money"></i></p>
								<h4>Get Payments</h4>
								<h5>Rumeration is paid dully once the month ends directly to the tutors account. Individuals who wish to be full time tutors can take up two or three kids thus increasing their remuneration.</h5>
							</div>
							
						</div>
				</div>
			</div>
		</div>
	</div>

<!--Registration form -->
	<div class="reg-two" id="reg_two">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-offset-2">
					<h2>PLEASE SIGN UP <span>(It's free and always will be)</span></h2>
					<h4>JOIN HIGHERFEAT TUTORS TODAY.<b> Your information is always safe with us</b></h4>
					<div class="sign-up">
					</div>
					
					<div class="reg-form" id="reg_form">
						<form id="formTutor" name="formTutor" method="POST" onsubmit="return false;">
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="title">Select Title</label>
										<select name="title" id="title" class="form-control">
											<option value="">--Title--</option>
											<option value="Mr.">Mr.</option>
											<option value="Mrs.">Mrs.</option>
											<option value="Miss">Miss</option>
											<option value="Master">Master</option>
											<option value="Professor">Professor</option>
											<option value="Doctor">Doctor</option>
											<option value="Barrister">Barrister</option>
											<option value="Engineer">Engineer</option>
										</select>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<div class="form-group">
										<label for="fullname">Enter your fullname</label>
										<input type="text" name="fullname" id="fullname" class="form-control"  onfocus="this.value=''" placeholder="Fullname please" required/>
									</div>
								</div>
							</div>
								<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="gender">Select Gender</label>
										<select name="gender" id="gender" class="form-control">
											<option value="">--Gender--</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<div class="form-group">
										<label for="phone">Enter your Phone Number</label>
										<input type="number" name="phone" id="phone" class="form-control" onfocus="this.value=''" placeholder="Your phone number" required/>
									</div>
								</div>
								</div>
								<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="pwd">Enter Password</label>
										<input type= "password" name="pwd" id="pwd" class="form-control" onfocus="this.value=''" placeholder="Enter a password" required>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<div class="form-group">
										<label for="pwd">Confirm Password</label>
										<input type= "password" name="passcode" id="passcode" class="form-control" onfocus="this.value=''" placeholder="Confirm your password" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="email">Email Address</label>
										<input type= "email" name="email" id="email" class="form-control" placeholder="Enter your email address" onblur="checkMail();" onfocus="this.value=''" required>
										<span id="checkEmail"></span>
									</div>
									
								</div>
								<div class="col-lg-8 col-md-8">
									<div class="form-group">
										<label for="email">Confirm Email Address</label>
										<input type= "email" name="email_confirm" id="email_confirm" class="form-control" onfocus="this.value=''" placeholder="Confirm your email address" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="age">Age</label>
										<input type="text" name="age" id="age" class="form-control" onfocus="this.value=''" placeholder="Enter your Age" required/>
									</div>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="tutor">Have you been a tutor before?</label>
										<select name="tutor" id="tutor" class="form-control">
											<option value="">--Answer--</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="tutor">Do you have Passion for Kids?</label>
										<select name="passion" id="passion" class="form-control">
											<option value="">--Answer--</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-7 col-md-7">
									<div class="form-group">
										<label for="teach">What two subjects can you handle?</label>
											<div class="col-lg-6 col-md-6">
												<input type= "text" name="first" id="first" class="form-control" onfocus="this.value=''" placeholder="Enter First Subject" required>
											</div>
											<div class="col-lg-6 col-md-6">
												<input type= "text" name="second" id="second" class="form-control" onfocus="this.value=''" placeholder="Enter Second Subject" required>
											</div>
									</div>
								</div>
								<div class="col-lg-5 col-md-5">
									<div class="form-group">
										<label for="captcha">Captcha. What is the answer to 3 x 4</label>
										<input type= "text" name="captcha" id="captcha" class="form-control" placeholder="Answer" required>
									</div>
								</div>
							</div>

							<div class="msg" id="msg">
								<h5>By clicking <b>Join Now</b>, you are agreeing to our Terms and policies</h5>
							</div><hr/>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6 col-md-6 sub">
										<input type="submit" name="submit" id="sub" class="btn btn-warning col-lg-10 col-md-offset-2" onclick="insert();" value="JOIN NOW">
										<span id="message"></span>
									</div>
									<div class="col-lg-6 col-md-6 login">
										<h4>Already have an account? <a href="login.php">Sign In</a></h4>
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
<!--End of form -->

<?php include_once "footer.php"; ?>
</body>
</html>