var numOfAppointments = 1;
    
    $('#reschedule-popup').on('shown.bs.modal', function() {
        $('#reschedule-form').formValidation('resetForm', true);
    });
    
    //replaces the accept button with a reschedule button
    function accept_action(el) {
        $(el).replaceWith('<button type="button" class="btn btn-success" data-toggle="modal" data-target="#reschedule-popup">Reschedule</button>')
    }
    
    //Modify if necessary
    function add_new_list_item() {
        numOfAppointments++;
        var $newitem = $('<li class="list-group-item appointment-item" id="appointment' + numOfAppointments + '"></li>');
        var $newdiv = $('<div class="row"></div>');
        //checkbox
        var $newcol1 = $('<div class="col-md-1 checkbox"></div>');
        $newcol1.append($('<label><input type="checkbox"></label>'));
        //company
        var $newcol2 = $('<div class="col-md-2  appointment-details"></div>');
        $newcol2.append($('<label>Company:</label>'));
        $newcol2.append($('<p class="company-name">{{company.applyingFor}}</p>'));
        //position
        var $newcol3 = $('<div class="col-md-2 appointment-details"></div>');
        $newcol3.append($('<label>Postion:</label>'))
        $newcol3.append($('<p class="position-name">{{postion.name}}</p>'));
        //date and time
        var $newcol4 = $('<div class="col-md-2 appointment-details"></div>');
        $newcol4.append($('<label>Appointment Date and Time:</label>'))
        $newcol4.append($('<p class="appointment-time">{{appointment.date}}</p>'));
        //see more
        var $newcol5 = $('<div class="col-md-2 appointment-details btn-row"></div>');
        $newcol5.append($('<button class="btn btn-link see-more-btn" data-toggle="modal" data-target="#details-popup">See More</button>'));
        //accept and cancel buttons
        var $newcol6 = $('<div class="col-md-2 appointment-btns btn-row"></div>');
        $newcol6.append($('<button type="button" class="btn btn-success" onclick="accept_action(this)">Accept</button>'));
        $newcol6.append($('<br>'));
        $newcol6.append($('<button type="button" class="btn btn-default" onclick="delete_list_item(this)">Cancel</button>'));
        $newdiv.append($newcol1);
        $newdiv.append($newcol2);
        $newdiv.append($newcol3);
        $newdiv.append($newcol4);
        $newdiv.append($newcol5);
        $newdiv.append($newcol6);
        $newitem.append($newdiv);
        $('#appointment-list-group').append($newitem);
    }
    
    function delete_list_item(el) {
        numOfAppointments--;
        $(el).parents('.appointment-item').remove();
        reset_id();
        check_list();
    }
    
    function delete_selected() {
        console.log(numOfAppointments);
        if(numOfAppointments > 0) {
            var temp = numOfAppointments;
            for(i = 1; i <= temp; i++) {
                console.log($('#appointment' + i + ' input'));
                if($('#appointment' + i + ' input').is(':checked')) {
                    $('#appointment' + i).remove();
                    numOfAppointments--;
                }
            }
        }
        reset_id();
        check_list();
    }
    
    function delete_all() {
        $('.appointment-item').remove();
        numOfAppointments = 0;
        check_list();
    }
    
    function reset_id() {
        if(numOfAppointments > 0) {
            $('.appointment-item:first').attr('id','appointment1');
            if(numOfAppointments > 1) {
                for(i = 2; i <= numOfAppointments; i++) {
                    $('#appointment' + (i-1)).next().attr('id','appointment' + i);
                }
            }
        }
    }
    
    function check_list() {
        if(numOfAppointments == 0) {
            if($('#appointment-list-group').children().length == 0) {
                $('#appointment-list-group').append($('<span class="empty-span">No Appointments</span>"'));
            }
            
        }
        else {
            $('.empty-span').remove();
        }
    }
