var numOfJobListings= getNumOfJobListings();

function deleteDiv(el) {
    var index = $(el).attr('id').replace( /^\D+/g, '');
    $('#listing' + index).remove();
    checkNumOfJobListings();
}

function getNumOfJobListings() {
    console.log(($('#listContainer').find('.panel').length));
    return $('#listContainer').find('panel').length;
}

function checkNumOfJobListings() {
    if(getNumOfJobListings() == 0) {
        if($('#listContainer').children(':first-child').children().length == 0) {
            $('#listContainer').children(':first-child').append($('<label class="col-md-offset-5 col-md-2 emptyMessage">No Listings</label>'));
        } 
    }
    else {
        if($('#listContainer').children(':first-child').children().length > 0) {
            $('.emptyMessage').remove();
        }
    }
}