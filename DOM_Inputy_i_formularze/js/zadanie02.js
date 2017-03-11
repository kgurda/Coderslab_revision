
jQuery(function() {
    
    var checkBox = jQuery('#invoice');
    var invoice = jQuery('#invoiceData')
    invoice.hide();

    checkBox.on('change', function() {
        if(jQuery(this).is(':checked')===false) {
            invoice.hide();
        }else {invoice.show();}
        
        return false;
    });
});