var numOfInterviewedApplicants= getNumOfInterviewedApplicants();

function deleteDiv(el) {
    var index = $(el).attr('id').replace( /^\D+/g, '');
    $('#result' + index).remove();
    checkNumOfInterviewedApplicants();
}

function getNumOfInterviewedApplicants() {
    console.log(($('#listContainer').find('.panel').length));
    return $('#listContainer').find('panel').length;
}

function checkNumOfInterviewedApplicants() {
    if(getNumOfInterviewedApplicants() == 0) {
        if($('#listContainer').children(':first-child').children().length == 0) {
            $('#listContainer').children(':first-child').append($('<label class="col-md-offset-4 col-md-4 emptyMessage">No Interviewed Applicants</label>'));
        } 
    }
    else {
        if($('#listContainer').children(':first-child').children().length > 0) {
            $('.emptyMessage').remove();
        }
    }
}