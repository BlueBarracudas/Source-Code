<?php
  session_start();

  include 'MVC/controller.php';

loadAll();

if(isset($_SESSION["account_id"]))
  {
    
    $ap = getLoggedInApplicant($_SESSION["account_id"]);
    include 'logic/logic_applicantsetup.php';

    if(applicantProfileExists($ap->get_appid()) == true)
    {
      echo "Profile already exists, going back to home page.";
      header('Refresh: 2; URL=applicant-home.php'); 
      exit;
    }

  }

  else
  {
    echo "You are not logged in.";
    header('Refresh: 3; URL=main_login.php'); 
    exit;
  }

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job IT | <?php echo $ap->get_firstname(); ?>'s Profile Setup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Resources/jquery-ui-1.11.3.custom/jquery-ui.css">
  <script src="Resources/jquery-ui-1.11.3.custom/external/jquery/jquery.js"></script>
   <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
    <link rel="stylesheet" href="css/errormessage.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/login.css">    


  
  <style>
      
  .container {
        width: 50%;

        border-radius: 5px;
    }

  .row{
    padding-left: 2%; 
  }
    
  #buttons{
      text-align: center;
    }      
      
  #body{
  padding-right: 3%;
  padding-left: 3%;
  }

  #hschooladd, #collegeadd, #courseadd{
    visibility: hidden;
  }
  </style>

  
  <script type="text/javascript">
function performClick(elemId) {
   var elem = document.getElementById(elemId);
   if(elem && document.createEvent) {
     var evt = document.createEvent("MouseEvents");
     evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
  }
 }
</script>
  
  
  </head>
<body>

<div class="container">
  
    
    
    
    
  <div class="panel panel-default">
<div class="panel-heading">
                                  <h3 class="panel-title" id="SetupHeader">Set-up Profile <p style="color:black;"> <?php echo $reply; ?> </p> </h3>
    
       </div>

                              <div class="panel-body">
 
 <div id="body">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method ="post">
<br>

<h4>Education:</h4>
<br>


  <div class="row">
   <div class="col-sm-3"><label>High School:</label><span style="color:red">*</span></div>
   <div class="col-md-6">
            <div id="hschoollist">
                <input class="form-control input-sm classhschool" type="text" name="hschool">
                
                
                                <div class="error_container" id="highSchool_errorMessageContainer"><label class="error_message" id="highschool_errorMessage" name="highchool_errorMessage"><?php echo $scErr; ?></label></div>
                
                
                
            </div>
 </div>
    </div>
 <br>

  <div class="row">
  <div class="col-sm-3"><label>College:<span style="color:red">*</span> </label></div>
    <div class="col-sm-6">
        <div id="collegelist">
            <input class="form-control input-sm classcollege" type="text" name="college">
        
        
        
                        <div class="error_container" id="college_errorMessageContainer"><label class="error_message" id="college_errorMessage" name="college_errorMessage"><?php echo $colErr; ?></label></div>
                
        
        
        
        </div>
      </div>
</div>

<br>

 <div class="row">
     <div class="col-sm-3"><label>College Course:</label> </div>
     <div class="col-sm-6">
         <div id="courselist">
         <input class="form-control input-sm classcourse" id ="idcourse" type="text" name="course">
             
             
             
             
                             <div class="error_container" id="collegeCource_errorMessageContainer"><label class="error_message" id="collegeCourse_errorMessage" name="collegeCourse_errorMessage"><?php echo $couErr; ?></label></div>
                
             
             
             
         </div>     
     </div>
    
     
     </div>
 <br>
 <br>
  <div class="row">
      <div class="col-sm-3"><label>Skill(s):</label><span style="color:red">*</span></div>
     <div class="col-sm-6">
        <div id="skilllist">
            <input class="form-control input-sm" type="text" name="skills[]">
            
                            <div class="error_container" id="skill_errorMessageContainer1"><label class="error_message" id="skill_errorMessage1" name="skill_errorMessage1"><?php echo $skErr; ?></label></div>
                
            
            
        </div>
        <button type="button" class="btn btn-link" id="skilladd">+add another Skill.</button>
      </div>
</div>
 <br>


 <h4>Work Experience</h4>
<br>
 <div class="row">
       
            <div class="col-sm-3"><label>Job Title:</label> </div>
            <div class="col-sm-5" id="titlelist">
                <input class="form-control input-sm" type="text" name="jobtitle[]">    
                
                    <div class="error_container" id="jobTitle_errorMessageContainer1"><label class="error_message" id="jobTitle_errorMessage1" name="jobTitle_errorMessage1"><?php echo $jtErr; ?></label></div>
                            
                
                
  
                
                <button type="button" class="btn btn-link" id="workadd">+add another Job Title.</button>
            </div>
            <div class="col-sm-2"><label>Years of Experience:</label> </div>
            <div class="col-sm-2" id="yearslist">
                <input class="form-control input-sm" type="number" name="workExp[]">
      
                
                
                <div class="error_container" id="yearsOfExperience_errorMessageContainer1"><label class="error_message" id="yearsOfExperience_errorMessage1" name="yearsOfExperience1"><?php echo $weErr; ?></label></div>
                
            </div>
           
      
     </div>

  <br> 

    <div class="row">
  <div class="col-sm-3"><label>Certification(s):</label> </div> <div class="col-sm-4">
        <div id="certlist">
            <input class="form-control input-sm classcert" type="text" name="certification[]">
            
                            <div class="error_container" id="cert_errorMessageContainer1"><label class="error_message" id="cert_errorMessage1" name="cert_errorMessage1"><?php echo $ceErr; ?></label></div>
                
            
            
        </div>
        <button type="button" class="btn btn-link" id="certadd">+add another Cert.</button> </div>
  </div>
  
  
  <br> <br>
  
  <div class="form-group">
          <div id="buttons">     
            <a href="applicant-home.php"><button type="button" class="btn btn-default">Cancel</button></a>
             <input type="submit" id="saveBtn" class="btn btn-success" value="Save"></input>
          </div>
        </div>
        </form>
 </div>
      </div> 
    </div>
  
</div>

</body>


 <script src="js/jquery-2.1.3.js"></script>
  <script src="js/setupApplicantProfile.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="Resources/jquery-ui-1.11.3.custom/jquery-ui.js"></script>

<script>
var colleges = [ "University of the Philippines Diliman", "De La Salle University Manila", "Ateneo de Manila University"];
var highschools = [ "De La Salle Zobel", "La Salle Greenhills ", "Grace Christian High School", "Xavier School", "Imaculate Conception Academy"];
var Courses = [ "Computer Science", "Information Technology", "Communication Technology"];
var certifications = [ "CCNA", "CCNP", "CCIE"];
var numOfSkills = 1;
var numOfJobTitles = 1;
var numOfCertifications = 1;    

$( ".classcollege" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( colleges, function( item ){
              return matcher.test( item );
          }) );
      }
});



$( ".classhschool" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( highschools, function( item ){
              return matcher.test( item );
          }) );
      }
});


$( "#idcourse" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep( Courses, function( item ){
              return matcher.test( item );
          }) );
      }
});


$( ".classcert" ).autocomplete({
  source: function( request, response ) {
          var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
          response( $.grep(certifications, function( item ){
              return matcher.test( item );
          }) );
      }
});

$( "#certadd" ).click(function(){
        var br = document.createElement('br');
     var br2 = document.getElementById("certlist");
    br2.appendChild(br);
    var newfield = document.createElement("input");
    newfield.setAttribute("class","form-control input-sm classcert");
    newfield.setAttribute("type","text");
    newfield.setAttribute("name","certification[]");
    numOfCertifications++;
    var newerrormsg = document.createElement("div");
    newerrormsg.setAttribute("class","error_container");
    newerrormsg.setAttribute("id","cert_errorMessageContainer"+numOfCertifications);
    var newerrorlbl = document.createElement("label");
    newerrorlbl.setAttribute("class","error_message");
    newerrorlbl.setAttribute("id","cert_errorMessage"+numOfCertifications);
    newerrorlbl.setAttribute("name","cert_errorMessage"+numOfCertifications);
    newerrorlbl.innerHTML = "";
    newerrormsg.appendChild(newerrorlbl);
    $("#certlist").append(newfield);
    $("#certlist").append(newerrormsg);
    $("#certlist .classcert").last().autocomplete({
            source: function( request, response ) {
                var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
                response( $.grep(certifications, function( item ){
                    return matcher.test( item );
                }) );
            }
    });
    var remove = document.createElement("button");
    remove.setAttribute("class","btn btn-link");
    remove.innerHTML = "Remove Certification"
    remove.onclick = function() {
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).remove();
        numOfCertifications--;
    }
    $("#certlist").append(remove);
});  
    
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

$( "#workadd" ).click(function(){
        var br = document.createElement('br');
      var br2 = document.createElement('br');
    


    var workfield = document.createElement("input");
    workfield.setAttribute("class","form-control input-sm");
    workfield.setAttribute("type","text");
    workfield.setAttribute("name","jobtitle[]");
    numOfJobTitles++;
    var newerrormsg = document.createElement("div");
    newerrormsg.setAttribute("class","error_container");
    newerrormsg.setAttribute("id","jobTitle_errorMessageContainer"+numOfJobTitles);
    var newerrorlbl = document.createElement("label");
    newerrorlbl.setAttribute("class","error_message");
    newerrorlbl.setAttribute("id","jobTitle_errorMessage"+numOfJobTitles);
    newerrorlbl.setAttribute("name","jobTitle_errorMessage"+numOfJobTitles);
    newerrorlbl.innerHTML = "<?php echo $jtErr; ?>";
    newerrormsg.appendChild(newerrorlbl);
    $(this).before(br);
    $(this).before(workfield);
    $(this).before(newerrormsg);
    
    var yearfield = document.createElement("input");
    yearfield.setAttribute("class","form-control input-sm");
    yearfield.setAttribute("type","number");
    yearfield.setAttribute("name","workExp[]");
    var yearerrormsg = document.createElement("div");
    yearerrormsg.setAttribute("class","error_container");
    yearerrormsg.setAttribute("id","yearsOfExperience_errorMessageContainer"+numOfJobTitles);
    var yearerrorlbl = document.createElement("label");
    yearerrorlbl.setAttribute("class","error_message");
    yearerrorlbl.setAttribute("id","yearsOfExperience_errorMessage"+numOfJobTitles);
    yearerrorlbl.setAttribute("name","yearsOfExperience"+numOfJobTitles);
    yearerrorlbl.innerHTML = "<?php echo $weErr;?>";
    yearerrormsg.appendChild(yearerrorlbl);
     $("#yearslist").append(br2);
    $("#yearslist").append(yearfield);
    $("#yearslist").append(yearerrormsg);
    var remove = document.createElement("button");
    remove.setAttribute("class","btn btn-link");
    remove.innerHTML = "Remove Job Title"
    remove.onclick = function() {
        $(this).prev().remove();
        $(this).prev().remove();
        $(this).prev().remove();
        $("#yearslist").children().last().remove();
        $("#yearslist").children().last().remove();
        $("#yearslist").children().last().remove();
        $(this).remove();
    }
    $(this).before(remove);
});

</script>
</html>