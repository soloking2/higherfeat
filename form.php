<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="icon" type="image/png" href="higherfeats/higherfeat.png">
	<title>Parents Registration page</title>
	<script>

	function _(x){
		return document.getElementById(x);
	}
	function Process(){
		var child_name, theClass, check, day, theTime;
		childInfo = document.getElementById("childInfo");
		child_name = document.getElementById("child_name").value;
		day = document.getElementById("days_teach").value;
		theTime = document.getElementById("time_day").value;
		check = document.getElementById("check");
		theClass = document.getElementById("theClass").value;
		if(child_name == ""){
			check.innerHTML = "Please enter you child\'s name";
		} else if(theClass.length < 1){
			alert("Please select a class");
		}else if(child_name.length <3){
			check.innerHTML = "Child\'s name must contain more than 2 characters";
		} else if(day.length < 1){
			alert("Please select a preferred day for Tutorials");
		} else if(theTime == ""){
			alert("Please enter preferred time for the Tutorials");
		}else {
			document.getElementById("firstForm").style.display = "none";
			document.getElementById("secondForm").style.display = "block";
			childInfo.innerHTML = child_name;
			_("progressBar").value = 50;
			_("status").innerHTML = "Phase 2 of 3";
		}
	}
	function secondProcess(){
		var child_goal = _("child_goal").value;
		var number_sub = _("noSub").value;
		var child_age = _("child_age").value;
		var conf = _("confirm");
		if(child_goal == ""){
			conf.innerHTML = "Please select a goal for your child";
		} else if(number_sub == ""){
			conf.innerHTML = "Please choose number of subjects";
		} else if(child_age == ""){
			conf.innerHTML = "Please tell us your child\'s age";
		} else {
			_("secondForm").style.display = "none";
			_("thirdForm").style.display = "block";
			_("progressBar").value = 100;
			_("status").innerHTML = "Phase 3 of 3" ;
		}
	}
	function populate(s1,s2){
		var s1 = document.getElementById(s1);
		var s2 = document.getElementById(s2);
		s2.innerHTML = "";
		if(s1.value == "Nursery 1" || s1.value == "Nursery 2" || s1.value == "Nursery 3" || s1.value == "Primary 1" || s1.value == "Primary 2" || s1.value == "Primary 3" || s1.value == "Primary 4" || s1.value == "Primary 5" || s1.value == "Primary 6"){
			var goalArray = ["|select a goal", "help with assignments and school work|Help with Assignments and school works", "improve phonics, reading and writing|Improve phonics, reading and writing", "entrance exam preparation|Entrance exam preparation", "prepare for school tests and exam|Prepare for school tests", "improve grades|Improve grades"];
		} else if(s1.value == "JSS 1" || s1.value == "JSS 2" || s1.value == "JSS 3"){
			var goalArray = ["|select a goal", "prepare for JSCE|Prepare for JSCE", "improve phonics, reading and writing|Improve phonics, reading and writing", "entrance exam preparation|Entrance exam preparation", "prepare for school tests and exam|Prepare for school tests", "improve grades|Improve grades", "Help with Assignments and school works|Help with Assignments and school works"];

		} else if(s1.value == "SSS 1" || s1.value == "SSS 2" || s1.value == "SSS 3"){
			var goalArray = ["|select a goal", "SSCE/NECO/GCE preparation|SSCE/NECO/GCE preparation", "entrance exam preparation|Entrance exam preparation", "prepare for school tests and exam|Prepare for school tests", "improve grades|Improve grades", "Help with Assignments and school works|Help with Assignments and school works", "UTME/JAMB preparation|UTME/JAMB preparation", "others|Others"];
	}
		for(var option in goalArray){
			var pair = goalArray[option].split("|");
			var newOption = document.createElement("option");
			newOption.value = pair[0];
			newOption.innerHTML = pair[1];
			s2.options.add(newOption);
		}
		
	}

	function sendProcess(){
		var parent_name = _("parent_name").value;
		var parent_no = _("parent_no").value;
		var addr = _("addr").value;
		var parent_email = _("parent_email").value;
		var parent_check = _("parent_check");
		if(parent_name == "" || parent_no == "" || addr == "" || parent_email == ""){
			parent_check.innerHTML = "Please fill the required fields";
		} else {
			_("formChild").method = "post";
			_("formChild").action = "php/form.inc.php";
			_("formChild").submit();
		}
	}
	</script>
	
</head>
<body>
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
					<li role="presentation"><a href="register.php">BECOME A TUTOR</a></li>
					<li role="presentation"><a href="login.php">LOGIN</a></li>
					<li role="presentation"><a href="parents.php" class="active">GET A TUTOR</a></li>
					</ul>
				</div>
			
		</div>
	</div>
	</div>
	<!-- End of Navagation -->

	<div class="form1" id="form1">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-sm-offset-2">
						<progress id="progressBar" value="0" max="100"></progress>
						<h3 id="status">Phase 1 of 3</h3>
				</div>
				<div class="col-lg-8 col-sm-offset-2 child-register">
					<form id="formChild" name="formChild" onsubmit="return false;">
						<div class="firstForm" id="firstForm">
							<h2>Get an experienced tutor for your child</h2>
							<hr style="margin-bottom: 40px;" />
						<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label for="name">Child's Name</label>
								<input type="text" id="child_name" name="child_name" class="form-control name" placeholder="Your child's name" onfocus="this.value='' ">
								<span id="check"></span>	
							</div>
						</div>
						</div>
						<div class="row">
								<div class="col-lg-4 col-md-4">
								<div class="form-group">
									<label for="class">Class of Your Child</label>
									<select name="theClass" class="form-control" id="theClass" onchange="populate(this.id,'child_goal');">
										<option value="">--Select Class --</option>
										<option value="Nursery 1">Nursery 1</option>
										<option value="Nursery 2">Nursery 2</option>
										<option value="Nursery 3">Nursery 3</option>
										<option value="Primary 1">Primary 1</option>
										<option value="Primary 2">Primary 2</option>
										<option value="Primary 3">Primary 3</option>
										<option value="Primary 4">Primary 4</option>
										<option value="Primary 5">Primary 5</option>
										<option value="Primary 6">Primary 6</option>
										<option value="JSS 1">JSS 1</option>
										<option value="JSS 2">JSS 2</option>
										<option value="JSS 3">JSS 3</option>
										<option value="SSS 1">SSS 1</option>
										<option value="SSS 2">SSS 2</option>
										<option value="SSS 3">SSS 3</option>
									</select>
								</div>
								</div>
								<div class="col-lg-4 col-md-4">
									<div class="form-group">
										<label for="days">Preferred days of Tutorials</label>
										<select name="days_teach" id="days_teach" class="form-control">
											<option value="">--Select day(s)--</option>
											<option value="Monday">Monday</option>
											<option value="Tuesday">Tuesday</option>
											<option value="Wednesday">Wednesday</option>
											<option value="Thurday">Thurday</option>
											<option value="Friday">Friday</option>
											<option value="Saturday">Saturday</option>
											<option value="Sunday">Sunday</option>
										</select>
									</div>
									
								</div>
								<div class="col-lg-4 col-lg-4">
									<div class="form-group">
											<label for="time">Preferred time of the day</label>
											<input type="text" name="time_day" id="time_day" class="form-control" placeholder="E.g. 12:00am">
									</div>
								</div>
								<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<button class="btn btn-primary" onclick="Process();">Next</button>
								</div>
								</div>
							</div>
						</div>

						<div class="secondForm" id="secondForm">

							<h2>Tell us the goal you want to achieve and the subject(s) your kid needs help with. </h2>
							<fieldset>
								<legend>For your Child <span id="childInfo"></span></legend>
						<div class="row">
							<div class="col-lg-5 col-md-5">
								<div class="form-group">
									<label for="age">What's your goal for this child</label>
									<select name="child_goal" id="child_goal" class="form-control">
									</select>
								</div>
							</div>
							<div class="col-lg-4 col-lg-4">
									<div class="form-group">
											<label for="number-subject">Number of subjects</label>
											<select name="noSub" class="form-control" id="noSub">
												<option value="">--No. of subjects --</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
											</select>
									</div>
							</div>
							<div class="col-lg-3 col-lg-3">
									<div class="form-group">
											<label for="age">Child's Age</label>
											<input type="number" name="child_age" id="child_age" class="form-control" placeholder="E.g. 12">
									</div>
							</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label for="subjects">Choose Subjects</label>
									<div class="subfirst">
										<label><input type="checkbox" name="subject[]" value="Mathematics"> Mathematics</label>
										<label><input type="checkbox" name="subject[]" value="English Language"> English Language</label>
										<label><input type="checkbox" name="subject[]" value="Basic Sciences"> Basic Sciences</label>
										<label><input type="checkbox" name="subject[]" value="Mathematics"> Verbal Reasoning</label>
										<label><input type="checkbox" name="subject[]" value="English Language"> Quantitative Reasoning</label>
										<label><input type="checkbox" name="subject[]" value="Biology"> Biology</label>
										<label><input type="checkbox" name="subject[]" value="ICT"> ICT- Computer Studies</label>
										<label><input type="checkbox" name="subject[]" value="Business Studies"> Business studies</label>
										<label><input type="checkbox" name="subject[]" value="Basic Technology"> Basic Technology</label>
										<label><input type="checkbox" name="subject[]" value="French"> French Language</label>
										<label><input type="checkbox" name="subject[]" value="Social Studies"> Social studies</label>
										<label><input type="checkbox" name="subject[]" value="French"> French Language</label>
										<label><input type="checkbox" name="subject[]" value="Chemistry"> Chemistry</label>
										<label><input type="checkbox" name="subject[]" value="Music"> Music</label>
									</div>
									<span id="confirm"></span>
								</div>
						</div>
					
						<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<button class="btn btn-primary" onclick="secondProcess();">Next</button>
								</div>
						</div>
						</div>
						</fieldset>
						</div>

						<div class="thirdForm" id="thirdForm">
							
							<h2>Parent Information. </h2>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label for="name">Parent Name</label>
									<input type="text" name="parent_name" id="parent_name" class="form-control" placeholder="Parent Name">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label for="number">Parent Phone Number</label>
									<input type="number" name="parent_no" id="parent_no" class="form-control" placeholder="Parent Phone Number">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label for="address">What's your home address</label>
									<input type="text" name="addr" id="addr" class="form-control" placeholder="Your home address">
								</div>
							</div>
							<div class="col-lg-6 col-lg-6">
									<div class="form-group">
											<label for="email">Your email address</label>
											<input type="email" name="parent_email" id="parent_email" class="form-control" placeholder="Your email">
									</div>
									<div id="parent_check">
									</div>
							</div>
							<div class="col-lg-12 col-lg-12">
									<div class="form-group">
											<button type="button" name="subForm" id="subForm" class="btn btn-primary" onclick="sendProcess();">Submit Form</button>
									</div>
							</div>
						</div>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>