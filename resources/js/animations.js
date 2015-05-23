/* ======= Animations ======= */
jQuery(document).ready(function($) {

    //Only animate elements when using non-mobile devices    
    if (isMobile.any === false) { 
        /* Animate elements in #home */
        $('#home .home .title').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
        $('#home .home .summary').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp2');}
        });      
		$('#home .home .flexslider').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInRight delayp2');}
        }); 
		$('#home .home-links .gallery-icon-holder').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp2');}
        });	
		$('#home .home-links .taxon-icon-holder').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp3');}
        });	
		$('#home .home-links .compare-icon-holder').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp4');}
        });	
		
		/* Animate elements in #about */
		$('#about .title').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#about .question-1').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#about .question-2').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#about .question-3').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#about .question-4').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#about .question-5').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		
		/* Animate elements in #contact */
		$('#contact .title').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#contact .fa-twitter').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#contact .fa-facebook').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp2');}
        });
		$('#contact .fa-linkedin').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp3');}
        });
		$('#contact .fa-google-plus').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp4');}
        });
		$('#contact .support-side').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInLeft delayp3');}
        });		
		$('#contact .contact-side').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInRight delayp4');}
        });	
		$('#contact .gallery').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp4');}
        });			
		
		/* Animate elements in #signup */
		$('#signup .title').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#signup .information').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInUp delayp1');}
        });
		$('#signup .login-box').css('opacity', 0).one('inview', function(isInView) {
            if (isInView) {$(this).addClass('animated fadeInRight delayp2');}
        });
    }
});
