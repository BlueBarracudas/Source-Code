var numOfSkills = 1;
var numOfJobTitles = 1;
var numOfCertifications = 1;  
var numOfcertRadioButton = 1;  


$( "#skilladd" ).click(function(){
        var br = document.createElement('br');
     var br2 = document.getElementById("skilllist");
    br2.appendChild(br);
    var newfield = document.createElement("input");
    newfield.setAttribute("class","form-control input-sm");
    newfield.setAttribute("type","text");
    newfield.setAttribute("name","skills[]");
    var newerrormsg = document.createElement("div");
    numOfSkills++;
    newerrormsg.setAttribute("class","error_container");
    newerrormsg.setAttribute("id","skill_errorMessageContainer"+numOfSkills);
    var newerrorlbl = document.createElement("label");
    newerrorlbl.setAttribute("class","error_message");
    newerrorlbl.setAttribute("id","skill_errorMessage"+numOfSkills);
    newerrorlbl.setAttribute("name","skill_errorMessage"+numOfSkills);
    newerrorlbl.innerHTML = "<?php echo $skErr; ?>";
    newerrormsg.appendChild(newerrorlbl);
    $("#skilllist").append(newfield);
    $("#skilllist").append(newerrormsg);
    var remove = document.createElement("button");
    remove.setAttribute("class","btn btn-link");
    remove.innerHTML = "Remove Skill"
    remove.onclick = function() {
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).remove();
        numOfSkills--;
    }
    $("#skilllist").append(remove);
});


$( "#certadd" ).click(function(){
    $newdiv = $('<div>');
    $newdiv.append($('<br>'));
    $newdiv.append($('<br>'));
    numOfCertifications++;
    numOfcertRadioButton++;
    //Create new select
    //Append the numOfCertifications to corresponding ids
    var $newselect = $('<select class="form-control input-sm classcert" type="text" onchange="otherCert(this)" name="certification[]" id="certification[]' + numOfCertifications + '"></select');
    $newselect.append($('<option value="" disabled selected>--- Select Certificate ---</option>'));
    $newselect.append($('<option value="Cisco Certified Network Associate (CCNA)">Cisco Certified Network Associate (CCNA)</option>'));
    $newselect.append($('<option value="Cisco Certified Network Professional (CCNP)" >Cisco Certified Network Professional (CCNP)</option>'));
	$newselect.append($('<option value="Other" >Other</option>'));
    //Append the new select element
    $newdiv.append($newselect);

    //Creates new Other field for the new Cert form
    var $newOther = $('<div id="otherCertification">');
    $newOther.append($('<label class="col-md-3 otherCert-label control-label">Other:</label>'));
    var $inputdiv = $('<div class="col-md-9">');
    $inputdiv.append($('<input class="form-control otherCert-input input-sm othercourse" type="text" id="othercourse" name="othercourse">'));
    $newOther.append($inputdiv);
    $newOther.append($('<br>'));
    $newOther.append($('<br>'));
    $newdiv.append($newOther);

    // //Create new Date Achieved field
    // var $newdateachievedlabel = $('<label class="col-md-5 dateachieved-label control-label">Date Achieved:</label>');
    // //Append the label
    // $newdiv.append($newdateachievedlabel);
    // var $newdateachievedinput = $('<div class="col-md-7 dateachieved-input"></div>');
    // $newdateachievedinput.append($('<input class="form-control input-sm classhschool" type="text" name="hschool">'));
    // //Append the input
    // $newdiv.append($newdateachievedinput);
    
    //Insert new br
    // $newdiv.append($('<br>'));
    
    //Create new Certificate of Competency field
    var $newcertcompetency = $('<div class="checkbox"><label>' + '<input class="competency-checkbox" id="radioBtnYes' +   numOfcertRadioButton +'" name="radioBtn" value="yes" type="radio"/><span>Yes |</span>' + '<input class="competency-checkbox" id="radioBtnNo'  +   numOfcertRadioButton +'" name="radioBtn" value="no" type="radio"/><span>No |</span>' +'Certificate of Competency</label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="<insert desc. here>"></span></div>');
    // var $yes = $('<input class="competency-checkbox" id="radioBtnYes' +   numOfcertRadioButton +'" name="radioBtn" value="yes" type="radio"/><span>Yes |</span>');
    // var $no = $(' <input class="competency-checkbox" id="radioBtnNo'  +   numOfcertRadioButton +'" name="radioBtn" value="no" type="radio"/><span>No |</span>');
    // var $label = $('Certificate of Competency');
// <input class="competency-checkbox" id="radioBtnYes1" name="radioBtn" value="yes" type="radio"/><span>Yes |</span>
//               <input class="competency-checkbox" id="radioBtnNo1" name="radioBtn" value="no" type="radio"/><span>No |</span>
    
    //  $newcertcompetency.prepend($no);
    // $newcertcompetency.prepend($yes);

    //Append the new certificate of competency field
    $newdiv.append($newcertcompetency);
    
    //Create new error message
    var $newerrormsg = $('<div class="error_container" id="cert_errorMessageContainer' + numOfCertifications + '"></div>');
    $newerrormsg.append($('<label class="error_message" id="cert_errorMessage' + numOfCertifications + '" name="cert_errorMessage' + numOfCertifications + '"><?php echo $ceErr; ?></label>'));
    //Append the new error message
    $newdiv.append($newerrormsg);
    
    //Create remove btn to remove the added stuff
    var $newremovebtn = $('<button type="button" class="btn btn-link">Remove Certification</button>');
    $newremovebtn.click(function() {
        numOfCertifications--;
        numOfcertRadioButton--;
        //Sorry for the brute force ^^'
        $(this).prev().remove();
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
    $newdiv.append($newremovebtn);
    $('[data-toggle="tooltip"]').attr('title','Check if you have passed Experts Academy\'s Skill Assesment Test for this Certification');    
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'right'
    });
    $('#certlist').append($newdiv);
});

/*
 <div class="row">
  <div class="col-md-2"><label>Job Title:</label> </div>
  <div class="col-md-5" id="titlelist">
  <input class="form-control input-sm" type="text" name="jobtitle[]">  
   
  <div class="error_container" id="jobTitle_errorMessageContainer1"><label class="error_message" id="jobTitle_errorMessage1" name="jobTitle_errorMessage1"><?php echo $jtErr; ?></label></div>
   
   
   
  </div>
  <div class="col-md-2"><label>Years of Experience:</label> </div>
  <div class="col-md-3" id="yearslist">
  <input class="form-control input-sm" type="number" name="workExp[]">
   
   
   
  <div class="error_container" id="yearsOfExperience_errorMessageContainer1"><label class="error_message" id="yearsOfExperience_errorMessage1" name="yearsOfExperience1"><?php echo $weErr; ?></label></div>

   
  </div>
  </div>

<div class="row">
  <label class="control-label col-md-2">Company:</label>
  <div class="col-md-5" id="companyList">
  <input class="form-control input-sm" type="text" name="company[]">  
   
  <div class="error_container" id="company_errorMessageContainer1"><label class="error_message" id="company_errorMessage1" name="company_errorMessage1"><?php echo $jtErr; ?></label></div>
  </div>

*/

$( "#workadd" ).click(function(){
    $(this).parent().before($('<br>'));
    $(this).parent().before($('<br>'));
    numOfJobTitles++;
    
    var $newjobtitlediv = $('<div class="row"></div>');
    
    // //Create subrows
    // var $firstrow = $('<div class="row"></div>'); //Should contain the Job Title and Years of Experience
    // var $secondrow = $('<div class="row"></div>'); //Should contain the Company
    
    //Job Title
    var $newjobtitlelabel = $(' <div class="control-label col-md-3"><label>Job Title:</label> </div>');
    //append the numOfJobTitles to the correspoding ids
    var $newjobtitlelist = $('<div class="col-md-5" id="titlelist' + numOfJobTitles + '"></div>'); 
    $newjobtitlelist.append($('<input class="form-control input-sm" type="text" name="jobtitle[]">'));
    var $newjobtitleerrormsg = $('<div class="error_container" id="jobTitle_errorMessageContainer' + numOfJobTitles + '"></div>');
    $newjobtitleerrormsg.append($('<label class="error_message" id="jobTitle_errorMessage' + numOfJobTitles + '" name="jobTitle_errorMessage1' + numOfJobTitles + '"><?php echo $jtErr; ?></label>'));
    $newjobtitlelist.append($newjobtitleerrormsg);                              
    
    //Years of Experience
    var $newyearlabel = $('<div class="col-md-2"><label>Years of Experience:</label> </div>');
    //append the numOfJobTitles to the correspoding ids
    var $newyearlist = $('<div class="col-md-2" id="yearslist' + numOfJobTitles + '"></div>');
    $newyearlist.append($('<input  min="0" class="form-control input-sm" type="number" name="workExp[]">'));
    var $newyearerrormsg = $('<div class="error_container" id="yearsOfExperience_errorMessageContainer' + numOfJobTitles + '"></div>');
    $newyearerrormsg.append($('<label class="error_message"  id="yearsOfExperience_errorMessage' + numOfJobTitles + '" name="yearsOfExperience' + numOfJobTitles + '"><?php echo $weErr; ?></label>'));
    $newyearlist.append($newyearerrormsg);
    
    // //Company
    // var $newcompanylabel = $(' <div class="control-label col-md-2"><label>Company:</label> </div>');
    // //append the numOfJobTitles to the correspoding ids
    // var $newcompanylist = $('<div class="col-md-5" id="companyList' + numOfJobTitles + '"></div>');
    // $newcompanylist.append($('<input class="form-control input-sm" type="text" name="company[]">'));
    // var $newcompanyerrormsg = $('<div class="error_container" id="company_errorMessageContainer' + numOfJobTitles + '"></div>');
    // $newcompanyerrormsg.append($('<label class="error_message" id="company_errorMessage' + numOfJobTitles + '" name="company_errorMessage' + numOfJobTitles + '"><?php echo $jtErr; ?></label> </div>'));
    // $newcompanylist.append($newcompanyerrormsg);
    
    //Append them all to the new row div
    // $firstrow.append($newjobtitlelabel);
    // $firstrow.append($newjobtitlelist);
    // $firstrow.append($newyearlabel);
    // $firstrow.append($newyearlist);
    // $secondrow.append($newcompanylabel);
    // $secondrow.append($newcompanylist);

    $newjobtitlediv.append($newjobtitlelabel);   
    $newjobtitlediv.append($newjobtitlelist);
    $newjobtitlediv.append($newyearlabel);   
    $newjobtitlediv.append($newyearlist);

    $(this).parent().before($newjobtitlediv);
    
    //Create new remove button that will remove the div before it
    var $newremovediv = $('<div class="row"></div>');
    var $newremovebtn = $('<button class="btn btn-link col-sm-offset-3">Remove Job Title</button>');
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

function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
     var evt = document.createEvent("MouseEvents");
     evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
  }
 }