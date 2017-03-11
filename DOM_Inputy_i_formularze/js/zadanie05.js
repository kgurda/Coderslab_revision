
jQuery(function() {

    jQuery('.btn-primary').on('click', function(event) {
        event.isDefaultPrevented();
        if(checkValidText()) {
            jQuery(this).parents('form').submit();
        } else {
            return false;
        }
        return false;
    });
});

function checkValidText() {
    if(jQuery('#email').val().includes('@')===false) {
        alert('Zły mail!');
        return false;
    }

    if(jQuery('#name').val().length<5) {
        alert('Błędne imię!');
        return false;
    }

    if(jQuery('#surname').val().length<5) {
        alert('Błędne nazwisko!');
        return false;
    }

    if(!jQuery('#pass1').val()) {
        alert('wprowadź hasło!');
        return false;
    }
    if(jQuery('#pass1').val()!==jQuery('#pass2').val()) {
        alert('hasła nie są identyczne!');
        return false;
    }
    if(jQuery('#agree').prop('checked')===false) {
        alert('zaznacz zgodę!');
        return false;
    }
    return true;
}
    

