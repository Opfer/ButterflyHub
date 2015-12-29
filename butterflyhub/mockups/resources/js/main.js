jQuery(document).ready(function($) {
	/* ======= Counters ======= */
	$('#photographersNum').animateNumber({ number: 78 });
	$('#photographsNum').animateNumber({ number: 8967 });
	$('#speciesNum').animateNumber({ number: 1545 });
	$('#taxaNum').animateNumber({ number: 1620 });
	$('#countriesNum').animateNumber({ number: 16 });
	
	/* ======= Flexslider ======= */
	$('.flexslider').flexslider({
		animation: "slide",
		slideshowSpeed: 6000,
		directionNav: false,
		controlNav: false,
		animationSpeed: 800,
		pauseOnHover: true
	});

	/* ======= Footer Year ======= */
	var currentTime = new Date();
	$("#year").text(currentTime.getFullYear());

	/* ======= Scrollspy ======= */
    $('body').scrollspy({ target: '#top', offset: 400});
   
    /* ======= ScrollTo ======= */
    $('a.scrollto').on('click', function(e){
        
        //store hash
        var target = this.hash;
                
        e.preventDefault();
        
		$('body').scrollTo(target, 800, {offset: -70, 'axis':'y', easing:'easeOutQuad'});
        //Collapse mobile menu after clicking
		if ($('.navbar-collapse').hasClass('in')){
			$('.navbar-collapse').removeClass('in').addClass('collapse');
		}
	});
	
	
	//access from url
	if(window.location.hash != ""){
		//store hash
        var target = window.location.hash;
		$('body').scrollTo(target, 800, {offset: -63, 'axis':'y', easing:'easeOutQuad'});
        //Collapse mobile menu after clicking
		if ($('.navbar-collapse').hasClass('in')){
			$('.navbar-collapse').removeClass('in').addClass('collapse');
		}
		window.location.hash="";
	}
	
	/* ======= jQuery Responsive equal heights plugin ======= */    
    $('.home-links .equal-height').matchHeight(); 
	$('.home-links .equal-height').matchHeight(); 
});
