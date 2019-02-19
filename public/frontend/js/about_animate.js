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
	$(".section_about_content .row").inViewport(function(px){
		if(px){
			 $(this).find(".col-xs-5").addClass('animated fadeInUp');
			 $(this).find(".col-xs-6").addClass('animated fadeInUp');
			 $(this).find(".col-xs-7").addClass('animated fadeInUp');
		}
	});
	$(".line_item_express_page_2").inViewport(function(px){
		if(px){
			 if($(window).width()>768){
				 $(this).css("top","40%");
				 $(this).css("left","58.33333333%");
				 $(this).css("display","block");
				 $(this).animate({height: "62%"}, 1200);
			 }
			 else{
				 $(this).css("display","none");
				 $(this).animate({height: "0px"}, 0);
			 }
		}
	});
	$(".line_item_express_page_3").inViewport(function(px){
		if(px){
			 if($(window).width()>768){
				 $(this).css("top","25%");
				 $(this).css("left","50%");
				 $(this).css("display","block");
				 $(this).animate({height: "50%"}, 1200);
			 }
			 else{
				 $(this).css("display","none");
				 $(this).animate({height: "0px"}, 0);
			 }
		}
	});
	$(".section_footer_as").inViewport(function(px){
		if(px){
			 $(".section_footer_as").addClass('animated fadeInUp');
		}
	});
	
});