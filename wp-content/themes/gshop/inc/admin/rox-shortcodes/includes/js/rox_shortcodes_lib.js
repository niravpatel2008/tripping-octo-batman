jQuery(function($){
	$(document).ready(function(){
		
		// Toggle
		$("h3.rox-toggle-trigger").click(function(){
			$(this).toggleClass("active").next().slideToggle("fast");
			return false; //Prevent the browser jump to the link anchor
		});
					
		// UI tabs
		$( ".rox-tabs" ).tabs();
		
		// UI accordion
		$(".rox-accordion").accordion({autoHeight: false});		

	}); // END doc ready
}); // END function ($)