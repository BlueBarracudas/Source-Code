var numOfAppointments= getNumOfAppointments();

function deleteDiv(el) {
    var index = $(el).attr('id').replace( /^\D+/g, '');
    $('#appointment' + index).remove();
    checkNumOfAppointments();
}

function getNumOfAppointments() {
    return $('#listContainer').find('panel').length;
}

function checkNumOfAppointments() {
    if(getNumOfAppointments() == 0) {
        if($('#listContainer').children(':first-child').children().length == 0) {
            $('#listContainer').children(':first-child').append($('<label class="col-md-offset-5 col-md-2 emptyMessage">No Appointments</label>'));
        } 
    }
    else {
        if($('#listContainer').children(':first-child').children().length > 0) {
            $('.emptyMessage').remove();
        }
    }
}