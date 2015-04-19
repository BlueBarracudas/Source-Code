    var numOfJobItems = 1;
    var numOfDetailInputPopup = 1;

    function popup_add_detail_form() {
        numOfDetailInputPopup++;
        var $newinput = $('<input type="text" class="form-control" id="edit-job-details' + numOfDetailInputPopup + '" placeholder="Enter Job Detail">');
        $('#edit-input-div').append($newinput);
        $('#edit-input-div').append($('<span class="error-msg">Error Message</span>'));
        var removebtn = document.createElement('button');
        removebtn.setAttribute('class','btn-link');
        removebtn.innerHTML = "Remove Detail";
        removebtn.onclick = function() {
            numOfDetailInputPopup--;
            $(this).prev().remove();
            $(this).prev().remove();
            $(this).remove();
        }
        $('#edit-input-div').append(removebtn);
    }
    
    function edit_popup_reset() {
        if(numOfDetailInputPopup > 1) {
            for(i = numOfDetailInputPopup; i > 1; i--) {
                $('#edit-input-div').children(':last-child').remove();
                $('#edit-input-div').children(':last-child').remove();
                $('#edit-input-div').children(':last-child').remove();
            }
            numOfDetailInputPopup = 1;
        }
        
    }
    
    function add_job_item() {
            numOfJobItems++;
            var $newitem = $('<li class="list-group-item job-item" id="job-item' + numOfJobItems + '"></li>');
            var $newdiv = $('<div class="row"></div>');
            var $newcol1 = $('<div class="col-md-1 checkbox"></div>');
            $newcol1.append($('<label><input type="checkbox"></label>'));
            var $newcol2 = $('<div class="col-md-3 col-md-offset-2 job-detail"></div>');
            $newcol2.append($('<label>Job Position:</label>'));
            $newcol2.append($('<p class="job-position">job.Detail</p>'));
            var $newcol3 = $('<div class="col-md-3 col-md-offset-2 btn-row"><div>');
            $newcol3.append($('<button type="button" class="btn btn-default" data-toggle="modal" data-target="#details-popup">View</button><br>')); 
            $newcol3.append($('<button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-popup">Edit</button><br>')); 
            $newcol3.append($('<button type="button" class="btn btn-default" id="delete1" onclick="delete_job_item(this)">Delete</button>')); 
            $newdiv.append($newcol1);
            $newdiv.append($newcol2);
            $newdiv.append($newcol3);
            $newitem.append($newdiv);
            $('#job-list-group').append($newitem); 
    }
    
    function delete_job_item(el) {
        numOfJobItems--;
        $(el).parents('.job-item').remove();
        reset_id();
        check_list();
    }
    
    function delete_selected() {
        if(numOfJobItems > 0) {
           var temp = numOfJobItems;
            for(i = 1; i <= temp; i++) {
                if($('#job-item' + i + ' input').is(':checked')) {
                    $('#job-item' + i).remove();
                    numOfJobItems--;
                }
            } 
        }
        reset_id();
        check_list();
    }
    
    function delete_all() {
        $('.job-item').remove();
        numOfJobItems = 0;
        check_list();
    }
    
    function reset_id() {
        if(numOfJobItems > 0) {
            $('.job-item:first').attr('id','job-item1');
            if(numOfJobItems > 1) {
                for(i = 2; i <= numOfJobItems; i++) {
                    $('#job-item' + (i-1)).next().attr('id','job-item' + i);
                }
            }
        }
    }
    
    function check_list() {
        if(numOfJobItems == 0) {
            if($('#job-list-group').children().length == 0)
            $('#job-list-group').append($('<span class="empty-span">No Jobs Posted</span>"'));
        }
        else {
            $('.empty-span').remove();
        }
    }

$(document).ready(function(){
    $('#edit-popup').on('hidden.bs.modal', function () {
    edit_popup_reset();
    });
});