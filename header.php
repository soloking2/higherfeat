	<style>
		#ar{
			background: #4c4c4c;
			color:#FFF;
			position: fixed;
			bottom: 30px;
			right: -252px;
			width: 40px;
			height: 40px;
			animation: pulse 1s ease-in-out 0s infinite;
		}
		#ar a{
			color:#FFF;
			padding: 5px;
			font-size: 20px;
		}
		@keyframes pulse {
		from {
		transform: scale3d(1, 1, 1);
		}

		50% {
		transform: scale3d(1.05, 1.05, 1.05);
		}

		to {
		transform: scale3d(1, 1, 1);
		}
		}
		.sticky{
		position: fixed;
		top:0;
		width: 100%;
		background-color: #FFF!important;
		z-index: 1;
		}
	.sticky + #serve{
		padding-top: 60px;
	}
	</style>

<script>
	function resetScroller(element){
			var distance = 40;
			var currentY = window.pageYOffset;
			var targetY = document.getElementById(element).offsetTop;
			var animator = setTimeout('resetScroller(\''+element+'\')', 24);
			if(currentY > targetY){
				scrollY = currentY-distance;
				window.scroll(0, scrollY);
			} else{
				clearTimeout(animator);
			}
		}
		function yScroll(){
			var i = document.getElementById("ar");
			if((window.pageYOffset + window.innerHeight) >= document.body.offsetHeight){ 
				i.style.transition = "right 0.7s ease-in-out 0s";
				i.style.right = "20px";
			} else{
				i.style.transition = "right 0.7s ease-in-out 0s";
				i.style.right = "-252px";
			}
		}
		window.onscroll = yScroll;
</script>
<script>
	function scrollHeader(){
		var header = document.getElementById("myNav");
		var sticky = header.offsetTop;
		if(window.pageYOffset >= sticky){
			header.classList.add("sticky");

		} else{
			header.classList.remove("sticky");
		}
	}
	window.addEventListener("scroll", scrollHeader);
</script>
</head>

<body>
	<div id="adv" class="adv">
		<div class="container">
			<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
				<h5>Call Us on: +234(0)9031190694 | Email: higherfeats@gmail.com</h5>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" align="right">
				<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			</div>
			</div>
		</div>
	</div>
