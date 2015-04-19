$(document).ready(function(){


	$("#saveBtn").mouseover(function(){
		$("#saveBtn").css("background-color", "rgba(255,82,0, 0.8)");
		$("#saveBtn").css("border-color", "rgba(255,82,0, 0.8)");
	});

	$("#saveBtn").mouseout(function(){
		$("#saveBtn").css("background-color", "rgba(255,82,0, 1)");
		$("#saveBtn").css("border-color", "rgba(255,82,0, 1)");
	});

});


$( "#certadd" ).click(function(){
    $newdiv = $('<div>');
    $newdiv.append($('<br>'));
    
    numOfCertifications++;
    //Create new select
    //Append the numOfCertifications to corresponding ids
    var $newselect = $('<select class="form-control input-sm classcert" type="text" onchange="otherCert(this)" name="certification[]" id="certification[]' + numOfCertifications + '"></select');
    $newselect.append($('<option value="" disabled selected>--- Select Certificate ---</option>'));
    $newselect.append($('<option value="Cisco Certified Network Associate (CCNA)">Cisco Certified Network Associate (CCNA)</option>'));
    $newselect.append($('<option value="Cisco Certified Network Professional (CCNP)" >Cisco Certified Network Professional (CCNP)</option>'));
    $newselect.append($('<option value="Other" >Other</option>'));
    //Append the new select element
    $newdiv.append($newselect);

    var $newOther = $('<div id="otherCertification">');
    $newOther.append($('<label class="col-md-3 otherCert-label control-label">Other:</label>'));
    var $inputdiv = $('<div class="col-md-9">');
    $inputdiv.append($('<input class="form-control otherCert-input input-sm othercourse" type="text" id="othercourse" name="othercourse">'));
    $newOther.append($inputdiv);
    $newOther.append($('<br>'));
    $newOther.append($('<br>'));
    $newdiv.append($newOther);
    
    //Create new Date Achieved field
    //var $newdateachievedlabel = $('<label class="col-md-5 dateachieved-label control-label">Date Achieved:</label>');
    //Append the label
    // $('#certlist').append($newdateachievedlabel);
    // var $newdateachievedinput = $('<div class="col-md-7 dateachieved-input"></div>');
    // $newdateachievedinput.append($('<input class="form-control input-sm classhschool" type="text" name="hschool">'));
    // //Append the input
    // $('#certlist').append($newdateachievedinput);
    
    // //Insert new br
    
    //Create new Certificate of Competency field
    var $newcertcompetency = $('<div class="checkbox"><label><input class="competency-checkbox" type="checkbox"/>Certificate of Competency</label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="<insert desc. here>"></span></div>');
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
        //Sorry for the brute force ^^'
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).remove();
    });


$('[data-toggle="tooltip"]').attr('title','Check if you require the applicant to have passed Experts Academy\'s Skill Assesment Test for this Certification');    
$('[data-toggle="tooltip"]').tooltip({
        placement : 'right'
});


    //Append new remove btn
    $newdiv.append($newremovebtn);
    $('[data-toggle="tooltip"]').attr('title','Check if you require the applicant to have passed Experts Academy\'s Skill Assesment Test for this Certification');    
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
    
    //Create subrows
    // var $firstrow = $('<div class="row"></div>'); //Should contain the Job Title and Years of Experience
    // var $secondrow = $('<div class="row"></div>'); //Should contain the Company
    
    //Job Title
    var $newjobtitlelabel = $('<div class=" col-md-3"><label>Job Title:</label> </div>');
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
    $newyearlist.append($('<input class="form-control input-sm" type="number" name="workExp[]">'));
    var $newyearerrormsg = $('<div class="error_container" id="yearsOfExperience_errorMessageContainer' + numOfJobTitles + '"></div>');
    $newyearerrormsg.append($('<label class="error_message" id="yearsOfExperience_errorMessage' + numOfJobTitles + '" name="yearsOfExperience' + numOfJobTitles + '"><?php echo $weErr; ?></label>'));
    $newyearlist.append($newyearerrormsg);
    
    // //Company
    // var $newcompanylabel = $(' <div class="col-md-2"><label>Company:</label> </div>');
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
    // // $secondrow.append($newcompanylabel);
    // // $secondrow.append($newcompanylist);
    // $newjobtitlediv.append($firstrow);
    // $newjobtitlediv.append($secondrow);


    $newjobtitlediv.append($newjobtitlelabel);
    $newjobtitlediv.append($newjobtitlelist);
    $newjobtitlediv.append($newyearlabel);
    $newjobtitlediv.append($newyearlist);
    
    $(this).parent().before($newjobtitlediv);
    
    //Create new remove button that will remove the div before it
    var $newremovediv = $('<div class="row"></div>');
    var $newremovebtn = $('<button class="btn btn-link col-md-offset-3">Remove Job Title</button>');
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


 // <div class="row">
 //  <div class="col-md-3"><label>Job Title:</label> </div>
 //  <div class="col-md-5" id="titlelist">
 //  <input class="form-control input-sm" type="text" name="jobtitle[]">  
   
 //  <div class="error_container" id="jobTitle_errorMessageContainer1"><label class="error_message" id="jobTitle_errorMessage1" name="jobTitle_errorMessage1"><?php echo $jtErr; ?></label></div>
   
   
   
 //  </div>
 //  <div class="col-md-2"><label>Years of Experience:</label> </div>
 //  <div class="col-md-2" id="yearslist">
 //  <input class="form-control input-sm" type="number" name="workExp[]">
   
   
   
 //  <div class="error_container" id="yearsOfExperience_errorMessageContainer1"><label class="error_message" id="yearsOfExperience_errorMessage1" name="yearsOfExperience1"><?php echo $weErr; ?></label></div>




function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
     var evt = document.createEvent("MouseEvents");
     evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
  }
 }

function otherCourse(input){
    var x = input.value;
    var y = document.getElementById("othercourseinput");
    if (x == "Other"){
        y.style.display = "block";
    }
    else {
        document.getElementById("othercourse").value = "";
        y.style.display ="none";
    }
}

function otherCert(input){
    var x = input.value;
    var div = input.parentNode;
    var y = document.getElementById("otherCertification");
    var child, child2;
    if (x == "Other"){ //get and display child
        for (i = 0; i<div.childNodes.length; i++){
            child = div.childNodes[i];
            if (child.id == "otherCertification")
                child.style.display = "block";
        }
    }
    else {
        for (i = 0; i<div.childNodes.length; i++){
            child = div.childNodes[i];
            if (child.id == "otherCertification"){
                child.style.display = "none";
            }
        }
    }
}




var colleges = [ "University of the Philippines Diliman", "De La Salle University Manila", "Ateneo de Manila University"];
var highschools = [ "De La Salle Zobel", "La Salle Greenhills ", "Grace Christian High School", "Xavier School", "Imaculate Conception Academy"];
var Courses = [ "Computer Science", "Information Technology", "Communication Technology"];
var certifications = [ "CCNA", "CCNP", "CCIE"];
var numOfSkills = 1;
var numOfJobTitles = 1;
var numOfCertifications = 1;    

// $( ".classcollege" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep( colleges, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });



// $( ".classhschool" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep( highschools, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });


// $( "#idcourse" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep( Courses, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });


// $( ".classcert" ).autocomplete({
//   source: function( request, response ) {
//           var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
//           response( $.grep(certifications, function( item ){
//               return matcher.test( item );
//           }) );
//       }
// });



// $( "#skilladd" ).click(function(){
//         var br = document.createElement('br');
//      var br2 = document.getElementById("skilllist");
//     br2.appendChild(br);
//     var newfield = document.createElement("input");
//     newfield.setAttribute("class","form-control input-sm");
//     newfield.setAttribute("type","text");
//     newfield.setAttribute("name","skills[]");
//     var newerrormsg = document.createElement("div");
//     numOfSkills++;
//     newerrormsg.setAttribute("class","error_container");
//     newerrormsg.setAttribute("id","skill_errorMessageContainer"+numOfSkills);
//     var newerrorlbl = document.createElement("label");
//     newerrorlbl.setAttribute("class","error_message");
//     newerrorlbl.setAttribute("id","skill_errorMessage"+numOfSkills);
//     newerrorlbl.setAttribute("name","skill_errorMessage"+numOfSkills);
//     newerrorlbl.innerHTML = "<?php echo $skErr; ?>";
//     newerrormsg.appendChild(newerrorlbl);
//     $("#skilllist").append(newfield);
//     $("#skilllist").append(newerrormsg);
//     var remove = document.createElement("button");
//     remove.setAttribute("class","btn btn-link");
//     remove.innerHTML = "Remove Skill"
//     remove.onclick = function() {
//         $(this).prev().remove();
//         $(this).prev().remove();
//         $(this).prev().remove();
//         $(this).remove();
//         numOfSkills--;
//     }
//     $("#skilllist").append(remove);
// });




//Replace the "Hi!" string with the description


