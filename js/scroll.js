var scrollY = 0, distance = 40, speed = 24;
		function autoScroll(element){
			var currentY = window.pageYOffset;
			var targetY = document.getElementById(element).offsetTop;
			var bodyHeight = document.body.offsetHeight;
			var yPos = currentY + window.innerHeight;
			var animator = setTimeout('autoScroll("'+element+'")', speed);
			//if you are at the end of the page, clearTimeout applies
			if(yPos > bodyHeight){
				clearTimeout(animator);
				//If not at the end of the page.
			} else {
				if(currentY < targetY-distance){
					scrollY = currentY+distance;
					window.scroll(0, scrollY);
				} else {
					clearTimeout(animator);
				}
			}
		}