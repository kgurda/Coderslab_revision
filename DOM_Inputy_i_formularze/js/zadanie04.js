jQuery(function() {
    
    var imgApple = jQuery('.page-header').find('img').first();
    var imgUbuntu = imgApple.next();
    var imgWindows = imgUbuntu.next();
    
    var selectOpinion = jQuery('.form-control');
    selectOpinion.change(function(event) {
        var child = jQuery(this).val();
                    imgWindows.hide();
                    imgUbuntu.hide();
                    imgApple.hide();
            switch (child) {
                case 'Windows':
                    imgWindows.toggle();
                    break;
                case 'Os X':
                    imgApple.toggle();
                    break;
                case 'Ubuntu':
                    imgUbuntu.toggle();
                    break;
        }
        return false;
    });
});
