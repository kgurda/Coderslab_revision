 function validData() {
    if(!jQuery('#team1').val() || !jQuery('#team2').val()) {
        return false;
    }
    if(jQuery('#team1').val()==jQuery('#team2').val()) {
        return false;
    }
    if(parseInt(jQuery('#points1').val())<0) {
        return false;
    }
    if(parseInt(jQuery('#points2').val())<0) {
        return false;
    }
    return true;
}
    
jQuery(function() {
    jQuery('.btn-primary').on('click', function() {
        if(validData()==true) {
            var newRow = '<tr>\n\
                <td>'+jQuery('#team1').val()+'</td>\n\
                <td>'+jQuery('#team2').val()+'</td>\n\
                <td>'+jQuery('#points1').val()+' - '+jQuery('#points2').val()+'</td>\n\
                </tr>';
        jQuery('.table-bordered').append(newRow);
        }
        else {
            alert('błędne dane!');
            return false;
        }
        return false;
    });
});