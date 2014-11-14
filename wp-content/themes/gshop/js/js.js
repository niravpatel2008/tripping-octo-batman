jQuery(document).ready(function($) {
	
	$(window).scroll(function() { 
		if(top_fixed_menu == 1){		
			 var additionHeight = 1;
			 var addClass = "fixed animated fadeInDown";
			 var classAddTo = "section#header";
			 
			 
			 var scroll = $(window).scrollTop();
			 var actionHeight = additionHeight;
			 
				if (scroll >= actionHeight) {
				   $(classAddTo).addClass(addClass);
				} else {
					$(classAddTo).removeClass(addClass);
				}
			}
	});
	
	$( 'p:empty' ).remove();
	   
  $('.scrollup').click(function(){
      $("html, body").animate({ scrollTop: 0 }, 1000);
      return false;
  });

  $('.navbar-nav > li ul').each(function(){
  		$(this).addClass('dropdown-menu');
  })
  
 
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});

  if($('.element').length > 0){
      $('.element').append('<div class="element-overly">Overly</div>');
      
      $('.element').each(function(){
		  $zoom = '<a class="element-lightbox" rel="rox-lightbox[]" href="'+$(this).data('zoom')+'" target="_blank"><i class="icon-zoom-in"></i></a>';
			$link = '<a class="element-link" href="'+$(this).data('link')+'" title=""><i class="icon-link"></i></a>';
			if($(this).data('zoom') !='')$(this).append($zoom);
			if($(this).data('link') !='')$(this).append($link);
      });
  }
  
  $(".product_slider_widget").carouFredSel({  
	  auto : {
	   play : true,
	   delay: 1000,
	   pauseOnHover    : true,
	   items : 1,
	   fx  : 'scroll',
	   easing  : "cubic"
	  }
  
 });
 
 $(".recent-posts ul").carouFredSel({
      width : "100%",
      scroll  : 1,
      auto    : false,
      next    : '.recent-posts .right',
      prev    : '.recent-posts .left'
    });
	
	$(".from-blog-content").each(function(){
		$(this).carouFredSel({
		  width : "100%",
		  scroll  : 1,
		  auto    : false,
		  next    : {
				button:  $(this).closest('.recent-slider').find('.arrow-next-blog'),
				key : "left"
			  },
		  prev    : {
				button:  $(this).closest('.recent-slider').find('.arrow-previous-blog')
		  }
		});  
	});
	
	if($('.from-blog-content li .view').length > 0) {
        $('.from-blog-content li:first-child .view').addClass("hover");
        $('.from-blog-content li .view').mouseover(function() {              
              $( this ).closest('.from-blog-content').find( ".view" ).removeClass("hover");
              $( this ).addClass("hover");
              }).mouseout(function() {
              $( this ).removeClass("hover");
              $( this ).closest('.from-blog-content').find( "li:first-child .view" ).addClass("hover");
        });
    }
	
	$("div#questions ul li a").click(function(){
		  var selected = $(this).attr('href'); 
		
		  $('.top-button').remove();
		  $('.current-faq').removeClass();
		  
			   $(selected).addClass(function( index, currentClass ) {
					var addedClass = 'current-faq';
					$(this).append('<a href="#" class="top-button">TOP</a>');
					var posiition = $(selected).position();
					$("html, body").animate({ scrollTop: posiition.top - $('#header').height() }, 400);
					return addedClass;
			   });
			  
		    
		  return false;
	 });
	 $('.top-button').live('click',function(){
		  $('.top-button').remove();
		  $('.current-faq').removeClass(function( index, currentClass ) {
		   		var addedClass = 'current-faq';
				var posiition = $("#questions").position(); 
				$("html, body").animate({ scrollTop: posiition.top - $('#header').height() }, 400);
				return addedClass;
		  });    
		  return false;
	 });  
	 
	 if($('.add_to_wishlist').length > 0){
		 $('.add_to_wishlist').click(function(){
			var prev = parseInt($('.item-wishlist a').text());
			$('.item-wishlist a').empty().append(prev+1);
		});
	 }
	 
	 if($('.product-remove .remove').length > 0){
		 $('.product-remove .remove').click(function(){
			 var prev = parseInt($('.item-wishlist a').text());
			$('.item-wishlist a').empty().append(prev-1);
		});
	 }

	 $(window).scroll(function(){
	 	$('.timer').each(function(){
	 		if($('#myCarousel').visible(true)){
	 			$(this).countTo({
		            from: 0,
		            to: $(this).data('to'),
		            speed: 1000,
		            refreshInterval: 50,
		            onComplete: function(value) {
		                //console.debug(this);
		                $(this).removeClass('timer');
		            }
		        });
	 		}	 		
	 	});	 	
	 })
	 
	 $('.navbar-nav li .dropdown-menu').each(function(){
		 $(this).closest('li').addClass('dropdown');
		 $('li.dropdown>a').addClass('dropdown-toggle').attr('data-toggle', 'dropdown');
	})
	  					
revapi1.bind("revolution.slide.onloaded",function (e) {
	//alert("slider loaded");
});
		
revapi1.bind("revolution.slide.onchange",function (e,data) {
	//alert("slide changed to: "+data.slideIndex);
});

revapi1.bind("revolution.slide.onpause",function (e,data) {
	//alert("timer paused");
});

revapi1.bind("revolution.slide.onresume",function (e,data) {
	//alert("timer resume");
});

revapi1.bind("revolution.slide.onvideoplay",function (e,data) {
	//alert("video play");
});

revapi1.bind("revolution.slide.onvideostop",function (e,data) {
	//alert("video stopped");
});

revapi1.bind("revolution.slide.onstop",function (e,data) {
	//alert("slider stopped");
});

revapi1.bind("revolution.slide.onbeforeswap",function (e) {
	//alert("before swap");
});

revapi1.bind("revolution.slide.onafterswap",function (e) {
	//alert("after swap");
});
			
			
			
	 
});