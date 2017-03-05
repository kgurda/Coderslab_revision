
jQuery(function() {
    function animeSpan() {
        var buttons = jQuery('.changeBar');
        var div =jQuery('.progress-bar');
        
        buttons.on('click', function() {
            var width = jQuery(this).attr('data-width');
            var color = jQuery(this).attr('data-color');
            var number = jQuery(this).attr('data-number');
            var divToChange = jQuery('body').find('#bar'+number);
            var span = divToChange.children();
            span.removeClass();
            span.addClass("" + color + "");
            span.width(width);
        });
    }
    animeSpan();
});