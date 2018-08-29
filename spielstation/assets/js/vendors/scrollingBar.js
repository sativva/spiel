(function($){
	$(function(){

		if ($(".ProgressBar .ProgressBar-wrapper").length > 0) {
	  	var wrapper_top = $(".ProgressBar .ProgressBar-wrapper").offset().top;
		};

	  $(window).scroll(function (){
	  	var wrapper_height = $(".ProgressBar .ProgressBar-wrapper").height();

	  	// Affixes ProgressBar Bars
		  var top = $(this).scrollTop();
	  	if (top > wrapper_top - 10) {
	  		$(".ProgressBar-wrapper").addClass("affix");
	  	}
	  	else {
				$(".ProgressBar-wrapper").removeClass("affix");
	  	}


	  	// Calculate each ProgressBar section
	  	$(".Article-content .Article-content--wrapper").each(function(i){
	  		var this_top = $(this).offset().top;
	  		var height = $(this).height();
	  		var this_bottom = this_top + height;
	  		var percent = 0;
				var documentHeight = $(window);
				var documentScrollTop = documentHeight.scrollTop();
				var documentScrollTop_int = Math.round(documentScrollTop);



	  		// Scrolled within current section
	  		if (top >= this_top && top <= this_bottom) {
	  			percent = ((top - this_top) / (height - wrapper_height)) * 100;
	  			if (percent >= 100) {
	  				percent = 100;
		  			// $(".ProgressBar .ProgressBar-wrapper .ProgressBar-link:eq("+i+") i").css("color", "#fff");
	  			}
	  			else {
	  				// $(".ProgressBar .ProgressBar-wrapper .ProgressBar-link:eq("+i+") i").css("color", "#36a7f3");
	  			}
	  		}
	  		else if (top > this_bottom) {
	  			percent = 100;
	  			// $(".ProgressBar .ProgressBar-wrapper .ProgressBar-link:eq("+i+") i").css("color", "#fff");
	  		}

	  		// console.log(i);
  			$(".ProgressBar .ProgressBar-wrapper .ProgressBar-link:eq("+i+") span").css("width", percent + "%");



			if (documentHeight.height() + documentScrollTop_int  == $(document).height()) {
	  			$(".ProgressBar .ProgressBar-wrapper .ProgressBar-link:eq("+i+") span").css("width", "100%");
	  		}
	  	});
	  });


	  // Smooth Scroll Links
	  $(".ProgressBar-wrapper .ProgressBar a").click(function (e){
	  	// e.preventDefault();

	  	var hash = this.hash.substr(1);
	  	console.log(hash);
	  	$('html, body').animate({
        scrollTop: $("#"+ hash).offset().top - 10
    }, 500);

	  });

	}); // end of document ready
})(jQuery); // end of jQuery name space
