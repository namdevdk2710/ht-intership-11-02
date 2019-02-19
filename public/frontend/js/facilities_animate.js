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
	
	$(".dinning_title").inViewport(function(px){
		if(px){
			 $(this).addClass('animated fadeInUp');
		}
	});	
	$(".section_fac_top .row").inViewport(function(px){
		if(px){
			 $(this).find(".col-xs-6").addClass('animated fadeInUp');
		}
	});
	$(".section_accom_content .row").inViewport(function(px){
		if(px){
			 $(this).find(".col-xs-6").addClass('animated fadeInUp');
			 
		}
	});
	$(".section_accom_content_photo_room .row").inViewport(function(px){
		if(px){
			 $(this).find(".col-xs-4").addClass('animated fadeInUp');
		}
	});
	$(".line_item_express_page_2").inViewport(function(px){
		if(px){
			 if($(window).width()>768){
				 $(this).css("top","-2%");
				 $(this).css("left","50%");
				 $(this).css("display","block");
				 $(this).animate({height: "104%"}, 1200);
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
				$(this).css("top","20%");
				$(this).css("left","50%");
				$(this).css("display","block");
				$(this).animate({height: "65%"}, 1200);
			 }
			 else{
				 $(this).css("display","none");
				 $(this).animate({height: "0px"}, 0);
			 }
		}
	});
	/*
	$("#col3").inViewport(function(px){
		if(px){
			 $("#col3").addClass('animated fadeInLeft');
			 $("#col4").addClass('animated fadeInRight');
		}
	});
	$("#col5").inViewport(function(px){
		if(px){
			 $(".pub_title").addClass('animated fadeInUp');
			 $("#col5").addClass('animated fadeInRight');
			 $("#col6").addClass('animated fadeInLeft');			 
			 if($(window).width()>768){
				 $(".line_item_express_page_2").css("top","-2%");
				 $(".line_item_express_page_2").css("left","50%");
				 $(".line_item_express_page_2").css("display","block");
				 $('.line_item_express_page_2').animate({height: "104%"}, 1200);
			 }
			 else{
				 $(".line_item_express_page_2").css("display","none");
				 $('.line_item_express_page_2').animate({height: "0px"}, 0);
			 }
		}
	});
	$("#col7").inViewport(function(px){
		if(px){
			 $("#col7").addClass('animated fadeInLeft');
			 $("#col8").addClass('animated fadeInRight');
		}
	});
	$(".section_accom_content_photo_room").inViewport(function(px){
		if(px){
			$(".galinaspa_title").addClass('animated fadeInUp');
			 $(this).addClass('animated fadeInUp');
		}
	});
	$("#col9").inViewport(function(px){
		if(px){
			 $(".kidsclub_title").addClass('animated fadeInUp');
			 $("#col9").addClass('animated fadeInLeft');
			 $("#col10").addClass('animated fadeInRight');
			 if($(window).width()>768){
				 $(".line_item_express_page_3").css("top","20%");
				 $(".line_item_express_page_3").css("left","50%");
				 $(".line_item_express_page_3").css("display","block");
				 $('.line_item_express_page_3').animate({height: "65%"}, 1200);
			 }
			 else{
				 $(".line_item_express_page_3").css("display","none");
				 $('.line_item_express_page_3').animate({height: "0px"}, 0); 
			}
		}
	});	
	*/
	$(".section_footer_as").inViewport(function(px){
		if(px){
			 $(".section_footer_as").addClass('animated fadeInUp');
		}
	});
	
});