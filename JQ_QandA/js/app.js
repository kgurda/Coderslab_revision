
jQuery(function() {
    var questions = jQuery('h1');
    var answers = jQuery('p');
    
    questions.on('click', function() {
        answers.hide();
        jQuery(this).next('p').toggle();
    });
});