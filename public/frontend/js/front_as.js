$(function () {	
	var groups = {};
	$('.galleryItem').each(function() {
	  var id = parseInt($(this).attr('data-group'), 10);
	  
	  if(!groups[id]) {
		groups[id] = [];
	  } 
	  
	  groups[id].push( this );
	});
	
	
	$.each(groups, function() {	  
	  $(this).magnificPopup({
		  type: 'image',
		  closeOnContentClick: true,
		  closeBtnInside: false,
		  gallery: { enabled:true }
	  });	  
	});

	
	$('ul.nav li.dropdown').hover(function() {
		// if($(window).width()>=1000){
			 $(this).addClass("open");
			 //$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		 //}
	}, function() {
	   //if($(window).width()>=1000){
	  		 $(this).removeClass("open");
			//$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	   //}
	});
	menuClicked();	
	//setTimeout(function(){
	$(".item_content_desc_banner_more").addClass('animated fadeInUp');
	var path = document.querySelector('.item_content_desc_banner_more');
	prefixedEventListener(path,"AnimationEnd",function(e){
		$('.line_item_express').animate({height: 45}, 400);
	});
	//},1000);
	/*Animate button*/
	$('.button_affect').hover(function(){
			$(this).find("#draw_lp_left").addClass("lp_left");
			$(this).find("#draw_lp_right").addClass("lp_right");
			$(this).find("#draw_lp_bottom").addClass("lp_bottom");
		},function(){
			$(this).find("#draw_lp_left").removeClass("lp_left");
			$(this).find("#draw_lp_right").removeClass("lp_right");
			$(this).find("#draw_lp_bottom").removeClass("lp_bottom");		
	});
	/*End Animate*/
});
function menuClicked(){
	$(".dropdown-toggle").click(function(){
		var hr = $(this).attr("href");
		if(hr!="#"){
			window.location.href = hr;
		}
		else{
			return true;	
		}
	});
}
/* for demo purpose only - can be deleted */
function utils() {

    /* tooltips */

    $('[data-toggle="tooltip"]').tooltip();

    /* click on the box activates the radio */

    $('#checkout').on('click', '.box.shipping-method, .box.payment-method', function (e) {
        var radio = $(this).find(':radio');
        radio.prop('checked', true);
    });
    /* click on the box activates the link in it */

    $('.box.clickable').on('click', function (e) {

        window.location = $(this).find('a').attr('href');
    });
    /* external links in new window*/

    $('.external').on('click', function (e) {

        e.preventDefault();
        window.open($(this).attr("href"));
    });
    /* animated scrolling */

    $('.scroll-to, .scroll-to-top').click(function (event) {

        var full_url = this.href;
        var parts = full_url.split("#");
        if (parts.length > 1) {

            scrollTo(full_url);
            event.preventDefault();
        }
    });
    function scrollTo(full_url) {
        var parts = full_url.split("#");
        var trgt = parts[1];
        var target_offset = $("#" + trgt).offset();
        var target_top = target_offset.top - 100;
        if (target_top < 0) {
            target_top = 0;
        }

        $('html, body').animate({
            scrollTop: target_top
        }, 1000);
    }
}
function isScrolledIntoView(elem) {
	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + $(window).height();
	 
	var elemTop = $(elem).offset().top;
	var elemBottom = elemTop + $(elem).height();
	 
	return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom)
	&& (elemBottom <= docViewBottom) &&  (elemTop >= docViewTop) );
}
var pfx = ["webkit", "moz", "MS", "o", ""];
function prefixedEventListener(element, type, callback) {
	for (var p = 0; p < pfx.length; p++) {
		if (!pfx[p]) type = type.toLowerCase();
		element.addEventListener(pfx[p]+type, callback, false);
	}
} 