$(window).load(function(){
	;(function($, win) {
	  $.fn.inViewport = function(cb) {
		 return this.each(function(i,el){
		   function visPx(){
			 var H = $(this).height(),
				 r = el.getBoundingClientRect(), t=r.top, b=r.bottom;
			 return cb.call(el, Math.max(0, t>0? H-t : (b<H?b:H)));  
		   } visPx();
		   $(win).on("resize scroll", visPx);
		 });
	  };
	}(jQuery, window));
	
	$("#row1").inViewport(function(px){
		if(px){
			 $(this).addClass('animated fadeInUp');
		}
	});
	$("#row2").find(".col-xs-4").inViewport(function(px){
		if(px){
			 $(this).addClass('animated fadeInUp');
		}
	});
	$("#row3").inViewport(function(px){
		if(px){
			 $(this).addClass('animated fadeInUp');
		}
	});
	$("#row4").inViewport(function(px){
		if(px){
			 $(this).addClass('animated fadeInUp');
		}
	});
	$(".section_footer_as").inViewport(function(px){
		if(px){
			 $(".section_footer_as").addClass('animated fadeInUp');
		}
	});
	
});