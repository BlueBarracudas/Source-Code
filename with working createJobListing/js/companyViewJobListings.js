
var numOfJobListings = getNumOfJobListings();

function deleteDiv(el, job_id) {
    var index = $(el).attr('id').replace( /^\D+/g, '');

    $.ajax({
        url: 'companyLogic/deleteJobListing.php',
        type: 'post',
        data: {'action': 'delete', 'job_id': job_id},
        success:
            console.log("success")
    }); // end ajax call
    
    location.reload();
   // $('#listing' + index).remove();
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