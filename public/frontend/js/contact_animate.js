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
	
	$("#col1").inViewport(function(px){
		if(px){
			 $("#col1").addClass('animated fadeInLeft');
			 $("#col2").addClass('animated fadeInRight');
			 if($(window).width()>768){
				 $(".line_item_express_page_2").css("top","10px");
				 $(".line_item_express_page_2").css("left","50%");
				 $(".line_item_express_page_2").css("display","block");
				 $('.line_item_express_page_2').animate({height: "100%"}, 1000);
			 }
			 else{
				 $(".line_item_express_page_2").css("display","none");
				 $('.line_item_express_page_2').animate({height: "0px"}, 0);
			 }
		}
	});
	$("#col3").inViewport(function(px){
		if(px){
			 $("#col3").addClass('animated fadeInUp');
		}
	});	
	$(".section_footer_as").inViewport(function(px){
		if(px){
			 $(".section_footer_as").addClass('animated fadeInUp');
		}
	});
	
});