$(function () {	
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
	onepage();
   // utils();
	menuClicked();
	/*Banner slide*/
	var $item = $('.carousel .item'); 
	var $firstAnimatingElems = $('.carousel').find('.item:first').find("[data-animation ^= 'animated']");
	var $wHeight = $(window).height();
	$item.eq(0).addClass('active');
	$item.height($wHeight); 
	$item.addClass('full-screen');
		
	$('.carousel img').each(function() {
	  var $src = $(this).attr('src');
	  $(this).parent().css({
		'background-image' : 'url(' + $src + ')'
	  });
	  $(this).remove();
	});
	
	$(window).on('resize', function (){
	  $wHeight = $(window).height();
	  $wWidth = $(window).width();
	  $item.height($wHeight);
	});
	
	$('.carousel').carousel({
	  interval: 12000,
	  pause: "false"
	});
	doAnimations($firstAnimatingElems);
	$('.carousel').on('slide.bs.carousel', function (e) {
		$('.line_item_express').animate({height: 0}, 0);
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	}); 
	/*End banner slide*/
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
	if(isTouchDevice()) {
		$('ul li.has-children').on("touchstart", function (e) {
		'use strict'; //satisfy code inspectors
		var link = $(this); //preselect the link
		if (link.hasClass('hover')) {
			return true;
		 } 
		else {
		   link.addClass('hover');
		   $('ul > li').not(this).removeClass('hover');
		   e.preventDefault();
		   return false; //extra, and to make sure the function has consistent return points
		  }
		});
	}
	else{
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
}
/* for demo purpose only - can be deleted */
function doAnimations( elems ) {	
	var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	elems.each(function () {
		var $this = $(this),
		$animationType = $this.data('animation');
		$this.addClass($animationType).one(animEndEv, function () {
			$('.line_item_express').animate({height: 45}, 500);
			$this.removeClass($animationType);
		});
	});
}
function doAnimationsScrolling( elems ) {
	var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
	elems.each(function () {
		var $this = $(this),
		$animationType = $this.data('animation');
		$this.addClass($animationType).one(animEndEv, function () {
			$this.removeClass($animationType);
		});
	});
}
function onepage() {
    $(".main").onepage_scroll({
        sectionContainer: "section", // sectionContainer accepts any kind of selector in case you don't want to use section
        easing: "ease", // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in",
        // "ease-out", "ease-in-out", or even cubic bezier value such as "cubic-bezier(0.175, 0.885, 0.420, 1.310)"
        animationTime: 700, // AnimationTime let you define how long each section takes to animate
        pagination: false, // You can either show or hide the pagination. Toggle true for show, false for hide.
        updateURL: false, // Toggle this true if you want the URL to be updated automatically when the user scroll to each page.
        beforeMove: function (index) {
        }, // This option accepts a callback function. The function will be called before the page moves.
        afterMove: function (index) {
        	if ($(window).width() > 768) {
				if(index>1){
					$(".navbar").fadeOut("slow");
				}
				else{
					$(".navbar").fadeIn("slow");
				}
				if(index==2){
					$('.line_item_express_page_2').css("display","block");				
					$('.line_item_express_page_2').animate({height: "50%"}, 800);
					$('.content_p2_row').find(".slideLeft").addClass('animated fadeInLeft');
					$('.content_p2_row').find(".slideRight").addClass('animated fadeInRight');
				}
				if(index==3){
					$('.line_item_express_page_3').css("display","block");
					$('.line_item_express_page_3').animate({height: "105%"}, 800);
					$('.container_page3').find(".row").addClass('animated fadeInUp');
				}
				if(index==4){
					$('.container_page4').addClass('animated fadeInUp');
					$('.section_footer_as').addClass('animated fadeInUp');
				}
			}
			//alert('aaaaaaaaa:'+index);
		}, // This option accepts a callback function. The function will be called after the page moves.
        loop: false, // You can have the page loop back to the top/bottom when the user navigates at up/down on the first/last page.
        keyboard: true, // You can activate the keyboard controls
        responsiveFallback: 769, // You can fallback to normal page scroll by defining the width of the browser in which
        // you want the responsive fallback to be triggered. For example, set this to 600 and whenever
        // the browser's width is less than 600, the fallback will kick in.
        direction: "vertical"            // You can now define the direction of the One Page Scroll animation. Options available are "vertical" and "horizontal". The default value is "vertical".  
    });

}
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

$.fn.alignElementsSameHeight = function () {
    $('.same-height-row').each(function () {
        var maxHeight = 0;
        var children = $(this).find('.same-height');
        children.height('auto');
        if ($(window).width() > 768) {
            children.each(function () {
                if ($(this).innerHeight() > maxHeight) {
                    maxHeight = $(this).innerHeight();
                }
            });
            children.innerHeight(maxHeight);
        }

        maxHeight = 0;
        children = $(this).find('.same-height-always');
        children.height('auto');
        children.each(function () {
            if ($(this).innerHeight() > maxHeight) {
                maxHeight = $(this).innerHeight();
            }
        });
        children.innerHeight(maxHeight);
    });
}

/* this function is here becase chrome renders really blurry texts with transformations used in CSS to center the section content */

$.fn.alignSections = function () {

    if (/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())) {
        $('section .content').each(function () {
            var element = $(this);
            var contentHeight = element.height();
            var paddingTop = -(contentHeight) / 2;

            if ($(window).width() > 768) {

                element.css('-webkit-transform', 'translate(0,0)');
                element.css('-ms-transform', 'translate(0,0)');
                element.css('transform', 'translate(0,0)');
                element.css('margin-top', paddingTop + 'px');
            }
            else {
                element.css('margin-top', 0);
            }
        });
    }
}

$(window).load(function () {
    hVideo = $(".container_page4").innerHeight();
	wVideo = $(".container_page4").innerWidth();
	windowHeight = $(window).height();
	windowWidth = $(window).width();
    $(this).alignElementsSameHeight();
    $(this).alignSections();
	if(windowWidth>768){
		$(".content_p2_col_6").removeClass("bg_none");
		$(".content_p3_col_6").removeClass("bg_none");
		$(".container_page4").css("height",$(window).height() - $(".copyright").innerHeight());
		if( hVideo >= ($(window).height() - $(".copyright").innerHeight()) ){
			$(".container_page4").css("width",(wVideo-120));
		}
		else{
			$(".container_page4").css("width","auto");	
		}
	}
	else{
		$(".content_p2_col_6").addClass("bg_none");
		$(".content_p3_col_6").addClass("bg_none");
		$(".container_page4").css("height","auto");	
	}
	if(windowWidth==768 && windowHeight==1024){
		$(".container_page4").css("height",$(window).height() - $(".copyright").innerHeight());
	}
});
$(window).resize(function () {
   // window.location.reload();
	hVideo = $(".container_page4").innerHeight();
	wVideo = $(".container_page4").innerWidth();
	newWindowHeight = $(window).height();
	newWindowWidth = $(window).width();
    if (windowWidth !== newWindowWidth) {
        setTimeout(function () {
            $(this).alignElementsSameHeight();
            $(this).alignSections();
        }, 100);
        windowWidth = newWindowWidth;
    }
	if(newWindowWidth>768){
		$(".content_p2_col_6").removeClass("bg_none");
		$(".content_p3_col_6").removeClass("bg_none");
		$(".container_page4").css("height",$(window).height() - $(".copyright").innerHeight());
		if( hVideo >= ($(window).height() - $(".copyright").innerHeight()) ){
			$(".container_page4").css("width",(wVideo-120));
		}
		else{
			$(".container_page4").css("width","auto");	
		}
	}
	else{
		$(".content_p2_col_6").addClass("bg_none");
		$(".content_p3_col_6").addClass("bg_none");
		$(".container_page4").css("height","auto");	
	}
	if(newWindowWidth==768 && newWindowHeight==1024){
		$(".container_page4").css("height",$(window).height() - $(".copyright").innerHeight());
	}
});
function isTouchDevice(){
    return typeof window.ontouchstart !== 'undefined';
}
