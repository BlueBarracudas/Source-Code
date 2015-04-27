var numOfAppointments = getNumOfAppointments();

function acceptOnClick(el) {
    var index = $(el).attr('id').replace( /^\D+/g, '');
    $('#reject' + index).replaceWith($('<input type="button" class="btn btn-default btn-fill " id="cancel' + index + '" name="cancel"' + index +'"  value="Cancel" onclick="deleteDiv(this)"/>'));
    $(el).replaceWith($('<input type="button" class="btn btn-default btn-fill" id="reschedule' + index + '" name="reschedule' + index + '" value="Reschedule"  data-toggle="modal" data-target="#reschedule-popup"/>'));
}

function deleteDiv(el) {
    var index = $(el).attr('id').replace( /^\D+/g, '');
    $('#appointment' + index).remove();
    checkNumOfAppointments();
}

function getNumOfAppointments() {
    console.log(($('#listContainer').find('.panel').length));
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