/** 
  * Template Name: SpicyX
  * Version: 1.1  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. FIXED NAVBAR 
  2. TOP SLIDER
  3. ABOUT US ( SLICK SLIDER ) 
  4. DATEPICKER
  5. SHEF SLIDER ( SLICK SLIDER )
  6. TESTIMONIAL SLIDER ( SLICK SLIDER )
  7. COUNTER
  8. LIGHTBOX ( FOR PORTFOLIO POPUP VIEW ) 
  9. MENU SMOOTH SCROLLING
  10. HOVER DROPDOWN MENU
  11. SCROLL TOP BUTTON
  12. PRELOADER  

  
  **/

  jQuery(function($){


    /* ----------------------------------------------------------- */
  /*  1. FIXED NAVBAR 
  /* ----------------------------------------------------------- */


  jQuery(window).bind('scroll', function () {
    if (jQuery(window).scrollTop() > 200) {
      jQuery('.mu-main-navbar').addClass('navbar-bg');
      jQuery('.navbar-brand').addClass('navbar-brand-small');        
    } else {
      jQuery('.mu-main-navbar').removeClass('navbar-bg');          
      jQuery('.navbar-brand').removeClass('navbar-brand-small');          
    }
  });
  
  /* ----------------------------------------------------------- */
  /*  2. TOP SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */    

  jQuery('.mu-top-slider').slick({
    dots: false,
    infinite: true,
    arrows: true,
    speed: 500,     
    autoplay: true,
    fade: true,
    cssEase: 'linear'
  });

  /* ----------------------------------------------------------- */
  /*  3. ABOUT US (SLICK SLIDER)
  /* ----------------------------------------------------------- */      

  jQuery('.mu-abtus-slider').slick({
    dots: false,
    infinite: true,
    arrows: false,
    speed: 500,
    autoplay: true,
    fade: true,      
    cssEase: 'linear'
  });

  /* ----------------------------------------------------------- */
  /*  4. DATEPICKER
  /* ----------------------------------------------------------- */      

  jQuery('#datepicker').datepicker();

  /* ----------------------------------------------------------- */
  /*  5. SHEF SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */    

  jQuery('.mu-chef-nav').slick({
    dots: true,
    arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 2500,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
        ]
      });

  /* ----------------------------------------------------------- */
  /*  6. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */    

  jQuery('.mu-testimonial-slider').slick({
    dots: true,      
    infinite: true,
    arrows: false,
    autoplay: true,
    speed: 500,      
    cssEase: 'linear'
  });       

  /* ----------------------------------------------------------- */
  /*  7. COUNTER
  /* ----------------------------------------------------------- */

  jQuery('.counter').counterUp({
    delay: 10,
    time: 1000
  });

  /* ----------------------------------------------------------- */
	/*  8. LIGHTBOX ( FOR PORTFOLIO POPUP VIEW ) 
	/* ----------------------------------------------------------- */ 
	
	$('body').append("<div id='portfolio-popup'><div class='portfolio-popup-area'><div class='portfolio-popup-inner'></div></div></div>");
	
	// WHEN CLICK PLAY BUTTON 
	
	jQuery('.mu-view-btn').on('click', function(event) {
   event.preventDefault();
   $('#portfolio-popup').addClass("portfolio-popup-show");
   $('#portfolio-popup').animate({
     "opacity": 1
   },500);   
   var portfolio_detailscontent = $(this).parent(".mu-single-gallery-info").find(".portfolio-detail").html();
   $(".portfolio-popup-inner").html(portfolio_detailscontent);     

 });  

	// WHEN CLICK CLOSE BUTTON
	
	$(document).on('click','.modal-close-btn', function(event) {     
   event.preventDefault();
   $('#portfolio-popup').removeClass("portfolio-popup-show");
   $('#portfolio-popup').animate({
    "opacity": 0
  },500);  

 });
	
  /* ----------------------------------------------------------- */
  /*  9. MENU SMOOTH SCROLLING
  /* ----------------------------------------------------------- */ 

    //MENU SCROLLING WITH ACTIVE ITEM SELECTED

      // Cache selectors
      var lastId,
      topMenu = $(".mu-main-nav"),
      topMenuHeight = topMenu.outerHeight()+13,
      // All list items
      menuItems = topMenu.find('a[href^=\\#]'),
      // Anchors corresponding to menu items
      scrollItems = menuItems.map(function(){
        var item = $($(this).attr("href"));
        if (item.length) { return item; }
      });

      // Bind click handler to menu items
      // so we can get a fancy scroll animation
      menuItems.click(function(e){
        var href = $(this).attr("href"),
        offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+32;
        jQuery('html, body').stop().animate({ 
          scrollTop: offsetTop
        }, 1500);           
        jQuery('.navbar-collapse').removeClass('in');  
        e.preventDefault();
      });

      // Bind to scroll
      jQuery(window).scroll(function(){
         // Get container scroll position
         var fromTop = $(this).scrollTop()+topMenuHeight;
         
         // Get id of current scroll item
         var cur = scrollItems.map(function(){
           if ($(this).offset().top < fromTop)
             return this;
         });
         // Get the id of the current element
         cur = cur[cur.length-1];
         var id = cur && cur.length ? cur[0].id : "";
         
         if (lastId !== id) {
           lastId = id;
             // Set/remove active class
             menuItems
             .parent().removeClass("active")
             .end().filter("[href=\\#"+id+"]").parent().addClass("active");
           }           
         })

      /* ----------------------------------------------------------- */
  /*  10. HOVER DROPDOWN MENU
  /* ----------------------------------------------------------- */ 
  
  // for hover dropdown menu
  jQuery('ul.nav li.dropdown').hover(function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
  }, function() {
    jQuery(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
  });


  /* ----------------------------------------------------------- */
  /*  11. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

  jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 300) {
      jQuery('.scrollToTop').fadeIn();
    } else {
      jQuery('.scrollToTop').fadeOut();
    }
  });

    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      jQuery('html, body').animate({scrollTop : 0},800);
      return false;
    });

    /* ----------------------------------------------------------- */
  /*  12. PRELOADER
  /* ----------------------------------------------------------- */

   jQuery(window).load(function() { // makes sure the whole site is loaded      
      jQuery('#aa-preloader-area').delay(300).fadeOut('slow'); // will fade out      
    });
   
   // TRUNG CUSTOM
   $(".input_no_order").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
             (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
             (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
             (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
             (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
               return;
             }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
        }
      });

   jQuery(".icon-plus").click(function(){
    var no_order_id = $(this).attr("data-order-id");
    var no_order = $("#input_no_order_" + no_order_id).val();
    no_order = parseInt(no_order);
    if(no_order >= 0){
      no_order = parseInt(no_order) + 1;
      $("#input_no_order_" + no_order_id).val(no_order);
    }
  });

   jQuery(".icon-minus").click(function(){
    var no_order_id = $(this).attr("data-order-id");
    var no_order = $("#input_no_order_" + no_order_id).val();
    no_order = parseInt(no_order);
    if(no_order > 0){
      no_order = parseInt(no_order) - 1;
      $("#input_no_order_" + no_order_id).val(no_order);
    }
  });

   jQuery("#save_order").on("click",function(){
    var total_prices = parseInt(0);
    $(".input_no_order").each(function(){
      if($(this).val() == 0) {
        var id_no_order = parseInt($(this).attr("data-val"));
        $("#id_no_order_"+ id_no_order).attr("disabled","true");
        $("#price_no_order_"+ id_no_order).attr("disabled","true");
        $(this).attr("disabled","true");
      }else{
        var id_no_order = parseInt($(this).attr("data-val"));
        var no = parseInt($("#input_no_order_"+ id_no_order).val());
        var price = parseInt($("#price_no_order_"+ id_no_order).val());
        total_prices = parseInt(parseInt(total_prices) + parseInt(no*price));
      }
    });
    $("#total_prices").val(total_prices);
    $("#order_form").submit();
  });
 });

