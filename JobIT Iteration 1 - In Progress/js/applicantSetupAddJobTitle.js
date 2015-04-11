$( "#certadd" ).click(function(){
    $('#certlist').append($('<br>'));
    $('#certlist').append($('<br>'));
    
    numOfCertifications++;
    //Create new select
    //Append the numOfCertifications to corresponding ids
    var $newselect = $('<select class="form-control input-sm classcert" type="text" name="certification[]" id="certification[]' + numOfCertifications + '"></select');
    $newselect.append($('<option value="" disabled selected>--- Select Certificate ---</option>'));
    $newselect.append($('<option value="Cisco Certified Network Associate (CCNA)">Cisco Certified Network Associate (CCNA)</option>'));
    $newselect.append($('<option value="Cisco Certified Network Professional (CCNP)" >Cisco Certified Network Professional (CCNP)</option>'));
    //Append the new select element
    $('#certlist').append($newselect);
    
    //Create new Date Achieved field
    var $newdateachievedlabel = $('<label class="col-md-5 dateachieved-label control-label">Date Achieved:</label>');
    //Append the label
    $('#certlist').append($newdateachievedlabel);
    var $newdateachievedinput = $('<div class="col-md-7 dateachieved-input"></div>');
    $newdateachievedinput.append($('<input class="form-control input-sm classhschool" type="text" name="hschool">'));
    //Append the input
    $('#certlist').append($newdateachievedinput);
    
    //Insert new br
    $('#certlist').append($('<br>'));
    
    //Create new Certificate of Competency field
    var $newcertcompetency = $('<div class="checkbox"><label><input class="competency-checkbox" type="checkbox"/>Certificate of Competency</label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="<insert desc. here>"></span></div>');
    //Append the new certificate of competency field
    $('#certlist').append($newcertcompetency);
    
    //Create new error message
    var $newerrormsg = $('<div class="error_container" id="cert_errorMessageContainer' + numOfCertifications + '"></div>');
    $newerrormsg.append($('<label class="error_message" id="cert_errorMessage' + numOfCertifications + '" name="cert_errorMessage' + numOfCertifications + '"><?php echo $ceErr; ?></label>'));
    //Append the new error message
    $('#certlist').append($newerrormsg);
    
    //Create remove btn to remove the added stuff
    var $newremovebtn = $('<button type="button" class="btn btn-link">Remove Certification</button>');
    $newremovebtn.click(function() {
        numOfCertifications--;
        //Sorry for the brute force ^^'
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).remove();
    });
    //Append new remove btn
    $('#certlist').append($newremovebtn);
    $('[data-toggle="tooltip"]').attr('title','Check if you have passed Experts Academy\'s Skill Assesment Test for this Certification');    
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'right'
    });
});

$( "#workadd" ).click(function(){
    $(this).parent().before($('<br>'));
    $(this).parent().before($('<br>'));
    numOfJobTitles++;
    
    var $newjobtitlediv = $('<div class="row"></div>');
    
    //Job Title
    var $newjobtitlelabel = $(' <div class="col-sm-2"><label>Job Title:</label> </div>');
    //append the numOfJobTitles to the correspoding ids
    var $newjobtitlelist = $('<div class="col-sm-5" id="titlelist' + numOfJobTitles + '"></div>'); 
    $newjobtitlelist.append($('<input class="form-control input-sm" type="text" name="jobtitle[]">'));
    var $newjobtitleerrormsg = $('<div class="error_container" id="jobTitle_errorMessageContainer' + numOfJobTitles + '"></div>');
    $newjobtitleerrormsg.append($('<label class="error_message" id="jobTitle_errorMessage' + numOfJobTitles + '" name="jobTitle_errorMessage1' + numOfJobTitles + '"><?php echo $jtErr; ?></label>'));
    $newjobtitlelist.append($newjobtitleerrormsg);                              
    
    //Years of Experience
    var $newyearlabel = $('<div class="col-sm-2"><label>Years of Experience:</label> </div>');
    //append the numOfJobTitles to the correspoding ids
    var $newyearlist = $('<div class="col-sm-2" id="yearslist' + numOfJobTitles + '"></div>');
    $newyearlist.append($('<input class="form-control input-sm" type="number" name="workExp[]">'));
    var $newyearerrormsg = $('<div class="error_container" id="yearsOfExperience_errorMessageContainer' + numOfJobTitles + '"></div>');
    $newyearerrormsg.append($('<label class="error_message" id="yearsOfExperience_errorMessage' + numOfJobTitles + '" name="yearsOfExperience' + numOfJobTitles + '"><?php echo $weErr; ?></label>'));
    $newyearlist.append($newyearerrormsg);
    
    //Company
    var $newcompanylabel = $(' <div class="col-sm-2"><label>Company:</label> </div>');
    //append the numOfJobTitles to the correspoding ids
    var $newcompanylist = $('<div class="col-sm-5" id="companyList' + numOfJobTitles + '"></div>');
    $newcompanylist.append($('<input class="form-control input-sm" type="text" name="company[]">'));
    var $newcompanyerrormsg = $('<div class="error_container" id="company_errorMessageContainer' + numOfJobTitles + '"></div>');
    $newcompanyerrormsg.append($('<label class="error_message" id="company_errorMessage' + numOfJobTitles + '" name="company_errorMessage' + numOfJobTitles + '"><?php echo $jtErr; ?></label> </div>'));
    $newcompanylist.append($newcompanyerrormsg);
    
    //Append them all to the new row div
    $newjobtitlediv.append('<div class="row">');
    $newjobtitlediv.append($newjobtitlelabel);
    $newjobtitlediv.append($newjobtitlelist);
    $newjobtitlediv.append($newyearlabel);
    $newjobtitlediv.append($newyearlist);
   $newjobtitlediv.append('</div> <div class="row">');
    $newjobtitlediv.append($newcompanylabel);
    $newjobtitlediv.append($newcompanylist);
    $newjobtitlediv.append('</div>');
    
    $(this).parent().before($newjobtitlediv);
    
    //Create new remove button that will remove the div before it
    var $newremovediv = $('<div class="row"></div>');
    var $newremovebtn = $('<button class="btn btn-link col-sm-offset-2">Remove Job Title</button>');
    $newremovebtn.click(function(){
        numOfJobTitles--;
        $(this).parent().prev().remove();
        $(this).parent().prev().remove();
        $(this).parent().prev().remove();
        $(this).remove();
    });
    $newremovediv.append($newremovebtn);
    
    $(this).parent().before($newremovediv);
});