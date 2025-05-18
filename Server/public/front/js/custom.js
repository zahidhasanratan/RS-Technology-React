(function ($) {
 "use strict";
$(document).ready(function(){
	  
		/*
		Jquery Mobile Menu
		============================*/
		$('#main-menu').meanmenu({
			meanScreenWidth: "767",
			meanMenuContainer: '.mobile-nav-menu',
		});			
		/*
		All Category Service Crousel
		============================*/ 	
		  $(".all-cat-service").owlCarousel({
			autoplay: true, 
			pagination:true,
			nav:true, 
			dots:true, 
			items :4,
			navText:["<i class='icofont-thin-left'></i>","<i class='icofont-thin-right'></i>"],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				768:{
					items:2
				},				
				992:{
					items:3
				},	
				1000:{
					items:3
				}
			}
		  }); 	
		




		/*
		Testimonial Crousel
		============================*/ 	
		  $(".all-testimonial").owlCarousel({
			autoplay: true, 
			pagination:false,
			nav:true, 
			navText:["<i class='icofont-thin-left'></i>","<i class='icofont-thin-right'></i>"],
			dots:false, 
			items :1,
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				768:{
					items:1
				},				
				1000:{
					items:1
				}
			}			
		  }); 					
	
		/*
		Slider Crousel
		============================*/ 
		$(".all-slide").owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            autoplay: true,			
            loop: true,
            navText: ["<i class='icofont-thin-left'></i>", "<i class='icofont-thin-right'></i>"],
            mouseDrag: false,
            touchDrag: false,
        });
        
        $(".all-slide").on("translate.owl.carousel", function(){	
            $(".slider-text h1").removeClass("animated fadeInUp").css("opacity", "0");
            $(".slider-text p").removeClass("animated fadeInDown").css("opacity", "0");
            $(".slider-text ul").removeClass("animated fadeInDown").css("opacity", "0");
        });
        
        $(".all-slide").on("translated.owl.carousel", function(){
            $(".slider-text h1").addClass("animated fadeInUp").css("opacity", "1");
            $(".slider-text p").addClass("animated fadeInDown").css("opacity", "1");
            $(".slider-text ul").addClass("animated fadeInDown").css("opacity", "1");
        });	
		
		/*
		Patner Crousel
		============================*/ 	
		  $(".all-patner").owlCarousel({
			autoplay: true, 
			pagination:false,
			nav:false, 
			dots:true, 
			items :4,
			navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
			responsive:{
				0:{
					items:2
				},
				600:{
					items:3
				},
				768:{
					items:4
				},				
				992:{
					items:4
				},				
				1000:{
					items:5
				}
			}
		  }); 
		/*
		scrollUp
		============================*/	
		$.scrollUp({
			scrollText: '<i class="icofont-thin-up"></i>',
			easingType: 'linear',
			scrollSpeed: 900,
			animation: 'fade'
		});	
		/*
		Counter Js
		============================*/ 
        $('.counter').counterUp({
            delay: 10,
            time: 1000			
        });
		
		/*
		Stikey Js
		============================*/ 
  		(function () {
			var nav = $('.hd-sec');
			var scrolled = false;
			$(window).scroll(function () {
				if (120 < $(window).scrollTop() && !scrolled) {
					nav.addClass('sticky_menu animated fadeInDown').animate({ 'margin-top': '0px' });
					scrolled = true;
				}
				if (120 > $(window).scrollTop() && scrolled) {
					nav.removeClass('sticky_menu animated fadeInDown').css('margin-top', '0px');
					scrolled = false;
				}
			});
		}()); 
		/*
		Magnific Video Popup
		============================*/ 		
        $('.mfp-iframe').magnificPopup({
            type: 'iframe'
        });			
		/*
		Magnific Popup
		============================*/ 		
        $('.gallery-photo').magnificPopup({
            type: 'image',
            gallery: {
              enabled: true
            },
        });	 

		/*
		Project Gallery Js
		============================*/	
		jQuery('.gallery-container').imagesLoaded( function() {			
			$(".gallery-container").isotope({
			itemSelector: '.filtr-item',
			layoutMode: 'fitRows',
			});
			$("ul.simplefilter li").on("click",function(){
			$("ul.simplefilter li").removeClass("active");
			$(this).addClass("active");
			 
			var selector = $(this).attr('data-filter');
			$(".gallery-container").isotope({
			filter: selector,
			animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
			}
			});
			return false;
			});
		});	
		/*
		Accordion Active JS
		============================*/
		$('.panel-heading a').on("click", function() {
			$('.panel-heading').removeClass('active');
			if(!$(this).closest('.panel').find('.panel-collapse').hasClass('in'))
				$(this).parents('.panel-heading').addClass('active');
		});				
		/*
		Preeloader
		============================*/
		$(window).on("load", function() {
			$('#preloader').fadeOut();
			$('#preloader-status').delay(200).fadeOut('slow');
			$('body').delay(200).css({'overflow-x':'hidden'});
		});




		

		
		
	});	
})(jQuery);


popup = {
  init: function(){
    $('figure').click(function(){
      popup.open($(this));
    });
    
    $(document).on('click', '.popup img', function(){
      return false;
    }).on('click', '.popup', function(){
      popup.close();
    })
  },
  open: function($figure) {
    $('.gallery').addClass('pop');
    $popup = $('<div class="popup" />').appendTo($('body'));
    $fig = $figure.clone().appendTo($('.popup'));
    $bg = $('<div class="bg" />').appendTo($('.popup'));
    $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
    $shadow = $('<div class="shadow" />').appendTo($fig);
    src = $('img', $fig).attr('src');
    $shadow.css({backgroundImage: 'url(' + src + ')'});
    $bg.css({backgroundImage: 'url(' + src + ')'});
    setTimeout(function(){
      $('.popup').addClass('pop');
    }, 10);
  },
  close: function(){
    $('.gallery, .popup').removeClass('pop');
    setTimeout(function(){
      $('.popup').remove()
    }, 100);
  }
}

popup.init()

