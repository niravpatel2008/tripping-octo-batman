// DOM Ready
jQuery(function($) {

    var $el, leftPos, newWidth;
       
   
    /* Add Magic Line markup via JavaScript, because it ain't gonna work without */
    $(".navbar-collapse ul.navbar-nav").append("<li id='magic-line'></li>");
    
    /* Cache it */
    var $magicLine = $("#magic-line");
	
	
	if($("ul.navbar-nav li li.current-menu-item").length > 0){
    //var $currentClass = $(".navbar-collapse ul.navbar-nav > li.current-menu-parent");
	var $currentClass = $("li.current-menu-item").parent().parent();
	}
	else if($("li.current-menu-item").length > 0){
    var $currentClass = $(".navbar-collapse ul.navbar-nav  li.current-menu-item");
	}
	else
	var $currentClass = $(".navbar-collapse ul.navbar-nav > li:first");

    $magicLine
        .width($currentClass.outerWidth())
        .css("left", $currentClass.position().left)
        .data("origLeft", $magicLine.position().left)
        .data("origWidth", $magicLine.width());
        
    $(".navbar-collapse ul.navbar-nav > li").hover(function() {
        $el = $(this);
        leftPos = $el.position().left;
        newWidth = $el.outerWidth();
        
        $magicLine.stop().animate({
            left: leftPos,
            width: newWidth
        });
    }, function() {
        $magicLine.stop().animate({
            left: $magicLine.data("origLeft"),
            width: $magicLine.data("origWidth")
        });    
    });    
});