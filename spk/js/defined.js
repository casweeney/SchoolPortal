$(document).ready(function(){
	
	///////// Sticky Navbar
	var navbar = $('nav');
	var heading = $('header');
	var pos = navbar.position();
	
	$(window).scroll(function(){
		var windowpos = $(window).scrollTop();
		if(windowpos >= heading.outerHeight()){
			navbar.addClass('navbar-fixed-top');
		}else{
			navbar.removeClass('navbar-fixed-top');
		}
	});
	
	////// Timer Count
	var myVar = setInterval(function(){myTimer()},1000);
	function myTimer() {
		var d = new Date();
		document.getElementById("demo_time").innerHTML = d.toLocaleTimeString();
		document.getElementById("demo_date").innerHTML = d.toLocaleDateString();
	}
	
});

