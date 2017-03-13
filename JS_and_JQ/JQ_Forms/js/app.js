
jQuery(function() {
    var form = jQuery('#contactForm');
    var messages = '';
    
    jQuery('input:submit').click(function(event) {
        event.preventDefault();
        var nameValue = jQuery('#nameInput').val();
        var emailValue = jQuery('#emailInput').val();
        var messageValue = jQuery('#messageInput').val();
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        
        if(nameValue.length<6) {
            messages+='Za krótkie imię! ';
        }
        if(!testEmail.test(emailValue)){
            messages+='Zły mail! ';
        }
        if(messageValue.length<10) {
            messages+='Za krótkia wiadomość! ';
        }
            jQuery('.error').html(messages);
    });
});