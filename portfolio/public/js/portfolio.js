 $(document).ready(function() {

 	/*// smooth scroll
 	$('a[href^="#"]').click(function(){
	    var the_id = $(this).attr("href");

	    $('html, body').animate({
	        scrollTop:$(the_id).offset().top
	    }, 'slow');
	    return false;
	});
 	*/

 	//------------------- slide css ----------------------

 	$('.slider').slider({full_width: true});

 	// Pause slider 	
	$('.slider').slider('pause');
	// Start slider
	$('.slider').slider('start');
	// Next slide
	$('.slider').slider('next');
	// Previous slide
	$('.slider').slider('prev');

 	//-----------------------------------------------------

 	$('.scrollspy').scrollSpy();
 	
    $('select').material_select();

    $('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15 // Creates a dropdown of 15 years to control year
	});

	$('textarea#desc').characterCounter();

	// ----------------navbar--------------------------------

	$(".button-collapse").sideNav();
      
  });

 