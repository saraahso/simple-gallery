(function ($) {
    
    $(document).ready(function() {
        $(".div-thumbnail").css("opacity", 0.5);
        $(".div-thumbnail").hover(function() {
            $(this).animate({opacity: 1.0}, 500);
        }, function() {
            $(this).animate({opacity: 0.5}, 500);
        });
    });
    

    
})(jQuery);