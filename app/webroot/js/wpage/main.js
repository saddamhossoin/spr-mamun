(function ($) {
    "use strict";
	
	 /*	
	Table OF Contents
	==========================
	1-Layer Slider
	2-CarouselFredsel
	3-Tweets
	4-Flicker Feed
	5-Portfolio
	6-Accordian/Toggle
	7-Tab
	8-Forms
	9-IE Hack
	*/
	
	new cbpScroller( document.getElementById( 'cbp-so-scroller' ) );
    
	
	
	$('.topupnow ul li:even').addClass("alt-row");
	$(".topupnow ul li").hover(
			function () {
				 $(this).addClass("highlight");
			}, 
			function () {
				 $(this).removeClass("highlight");
			}
		);
	
	
	/* Sticky Nav
	-----------------------------------------------------*/
	
	var stickyNavTop = $('header').offset().top;  
	  
	var stickyNav = function() {  
	  var scrollTop = $(window).scrollTop();  
	  
	  if (scrollTop > stickyNavTop) {   
		  $('header').addClass('sticky');
	  } else {  
		  $('header').removeClass('sticky');  
	  }  
	};  
	 
	stickyNav();  
	  
	$(window).scroll(function() {  
		stickyNav();  
	}); 
	
	
	
	$('ul.nav li.dropdown').click(
		function(){
			
			var state = $(this).data('toggleState');
			if(state) {
			   $(this).children('ul.dropdown-menu').slideUp();
			} else {
				 $(this).children('ul.dropdown-menu').slideDown();
			}
			$(this).data('toggleState', !state);
	});
  
	
    /*==============Portfolio====================*/
    var $containerfolio = $('.showcase');
    if ($containerfolio.length) {
        $containerfolio.isotope({
            layoutMode: 'fitRows',
            filter: '*',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    }

    $('#filter-out li a').click(function () {
        $('#filter-out li').removeClass("active");
        $(this).parent().addClass("active");
        var selector = $(this).attr('data-filter');
        $containerfolio.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });

    /*==============Toggle====================*/
    $('.footer-toogle').click(function () {
        var state = $(this).data('toggleState');
        if (state) {
            $('footer .container').slideDown('slow');
            $('.footer-toogle span').removeClass('icon-plus').addClass('icon-minus');
        } else {
            $('footer .container').slideUp('slow');
            $('.footer-toogle span').removeClass('icon-minus').addClass('icon-plus');
        }

        $(this).data('toggleState', !state);
    });

    $('.adsense-toogle').click(function () {
        var state = $(this).data('toggleState');
        if (state) {
            $('.adsense').slideUp('slow');
            $('.adsense-toogle span').removeClass('icon-minus').addClass('icon-plus');
        } else {
            $('.adsense').slideDown('slow');
            $('.adsense-toogle span').removeClass('icon-plus').addClass('icon-minus');
        }

        $(this).data('toggleState', !state);
    });



    /*==============Tabs====================*/

    $('#creative-tab a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
	
	
	/*==============Forms====================*/
	function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    $("#newsletter-form #nl-go").click(function () {
        var name = $("#nl-name").val();
        var email = $("#nl-email").val();
        var dataString = 'name=' + name + '&email=' + email;

        if(name == '' || !IsEmail(email)) {
            $('#newsletter .alert-error').slideDown('slow');
        } else {
            $.ajax({
                type: "POST",
                url: "php/newsletter.php",
                data: dataString,
                success: function () {
                    $('#newsletter .alert-error').hide();
                    $('#newsletter-form').slideToggle('slow');
                    $('#newsletter .alert-success').slideToggle('slow');
                }
            });
        }
        return false;
    });
    $(".contact-form form #submit").click(function () {
        var name = $("#name").val();
        var email = $("#email").val();
        var website = $("#website").val();
        var message = $("#message").val();
        var dataString = 'name=' + name + '&email=' + email + '&website=' + website + '&message=' + message;

        if(name == '' || !IsEmail(email) || message == '') {
            $('.contact-form .alert-error').slideDown('slow');
        } else {
            $.ajax({
                type: "POST",
                url: "php/contact.php",
                data: dataString,
                success: function () {
                    $('.contact-form .alert-error').hide();
                    $('.contact-form form').slideToggle('slow');
                    $('.contact-form .alert-success').slideToggle('slow');
                }
            });
        }
        return false;
    });	
	
	
	/* Animations
	-----------------------------------------------------*/
	
	jQuery('.animated').appear();

	jQuery(document.body).on('appear', '.fade-in', function() {
		jQuery(this).each(function(){ jQuery(this).addClass('fade-in-animation') });
	});
	
	jQuery(document.body).on('appear', '.zoom-in', function() {
		jQuery(this).each(function(){ jQuery(this).addClass('zoom-in-animation') });
	});
	
	jQuery(document.body).on('appear', '.bounce-in', function() {
		jQuery(this).each(function(){ jQuery(this).addClass('bounce-in-animation') });
	});
	
	/*=============IE8-9 placeholder fix ==============*/

    $('input[placeholder]').each(function () {
        var input = $(this);
        $(input).val(input.attr('placeholder'));

        $(input).focus(function () {
            if(input.val() == input.attr('placeholder')) {
                input.val('');
            }
        });

        $(input).blur(function () {
            if(input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });



})(jQuery);