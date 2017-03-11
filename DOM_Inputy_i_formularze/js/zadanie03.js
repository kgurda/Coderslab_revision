

jQuery(function() {
    
    var totalPrice = parseFloat(jQuery('#price').text());
    var checkboxes = jQuery('[data-price]');
    var checkedAll = jQuery('#all');
    var checkedNone = jQuery('#none');
    
    checkboxes.on('change', function(event) {
        checkedAll.prop('checked', false);
        checkedNone.prop('checked',false);
        totalPrice=parseFloat(jQuery('#price').text());
        var dataPrice = parseFloat(jQuery(this).attr('data-price'));
        if(jQuery(this).is(':checked')===true) {
            totalPrice+=dataPrice;
            jQuery('#price').text(totalPrice.toFixed(2));
        }
        if(jQuery(this).is(':checked')===false) {
            totalPrice-=dataPrice;
             jQuery('#price').text(totalPrice.toFixed(2));
        }
    });
    
    checkedAll.on('change', function(event) {
        if(jQuery(this).is(':checked')){
            checkedNone.prop('checked', false);
            checkboxes.prop('checked', true);
            totalPrice=0;
            checkboxes.each(function() {
                totalPrice+=parseFloat(jQuery(this).attr('data-price'));
            });
            jQuery('#price').text(totalPrice.toFixed(2));
        }else {
            checkboxes.prop('checked', false);
            jQuery('#price').text(0);
        }
    });
    
    checkedNone.on('change', function(event) {
        checkboxes.prop('checked', false);
        checkedAll.prop('checked', false);
        jQuery('#price').text(0);
    });
    
    jQuery('.btn-primary').on('click', function() {
        alert(jQuery('#price').text());
        return false;
    });
});
