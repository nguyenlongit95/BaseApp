
<!-- Tooltip -->
			$(document).ready(function(){
				$('.poshytip').poshytip({
					className: 'tip-twitter',
					showTimeout: 1,
					alignTo: 'target',
					alignX: 'center',
					alignY:'bottom',
					offsetY: 5,
					allowTipHover: true,
				});

<!-- Responsive Menu -->	
				jQuery("#responsive-menu select").change(function() {
					window.location = jQuery(this).find("option:selected").val();
				});
<!-- Hook up the FlexSlider -->
			$('.flexslider').flexslider({
            animation: "slide",              //String: Select your animation type, "fade" or "slide"
			slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
			slideshow: false,                //Boolean: Animate slider automatically
			slideshowSpeed: 4000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationDuration: 800,         //Integer: Set the speed of animations, in milliseconds
			directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
			controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
			keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
			mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
			prevText: "Previous",           //String: Set the text for the "previous" directionNav item
			nextText: "Next",               //String: Set the text for the "next" directionNav item
			pausePlay: false,               //Boolean: Create pause/play dynamic element
			randomize: false,               //Boolean: Randomize slide order
			slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
			animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
			pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
			pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
			start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
			before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
			after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
			end: function(){}               //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
	  });

// Twitter
			$(function(){
				  $('#tweets').tweetable({username: 'anariel77', time: true, limit: 1, replies: true, position: 'append'});
			  });				
// Activate the contactform
			$(function(){
				$('#contact_form').submit(function(e){
					e.preventDefault();
					var form = $(this);
					var post_url = form.attr('action');
					var post_data = form.serialize();
					$('#loader', form).html('<img src="images/loader.gif" /> Please Wait...');
					$.ajax({
						type: 'POST',
						url: post_url, 
						data: post_data,
						success: function(msg) {
							$(form).fadeOut(500, function(){
								form.html(msg).fadeIn();
							});
						}
					});
				});
			});
// Activate the prettyPhoto
				  $("a[class^='prettyPhoto']").prettyPhoto();				
// Activate the MainMenu
				  $("ul.sf-menu").superfish(); 
//##########################################
	// Toggle box
	//##########################################
	$('.toggle-trigger').click(function() {
		$(this).next().toggle('slow');
		$(this).toggleClass("active");
		return false;
	}).next().hide(); 
		});
		


  
	

