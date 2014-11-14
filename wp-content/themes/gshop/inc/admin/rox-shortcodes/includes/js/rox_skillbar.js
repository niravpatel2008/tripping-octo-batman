jQuery(function($){
	$(document).ready(function(){
		$('.rox-skillbar').each(function(){
			$(this).find('.rox-skillbar-bar').animate({ width: $(this).attr('data-percent') }, 1500 );
		});
	});
});