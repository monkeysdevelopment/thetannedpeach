$(document).ready(function() {
    $(window).on('scroll', function() {
        var st = $(this).scrollTop();
        
        $('#header').css({
            'transform': 'translateY('+ (st/2) +'px)'
        });
    });
});