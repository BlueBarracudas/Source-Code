<?php
    
  session_start();
  session_destroy();
  session_start();

  include '/MVC/controller.php';
  loadAll();

    include 'logic/logic_applicantregistration.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
   <link rel="stylesheet" href="Resources/jquery-ui-1.11.3.custom/jquery-ui.css">
   <script src="Resources/jquery-ui-1.11.3.custom/external/jquery/jquery.js"></script>
  
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="css/errormessage.css">
  <link rel="stylesheet" href="css/button.css">
   <link rel="stylesheet" href="css/panels.css">
  <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/applicant-setup.css">  

 

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/applicantRegistration.js"></script>
  

<style>
  /*  .container {
        width: 60%;
        border: 1px solid gray;
        border-radius: 5px;
        
    }*/
	
	#container2{
		display: none;
		 width: 100%;

        border-radius: 5px;
	}
	
	#container2 .panel{
		width: 50%;
		margin: 0 auto;
	}

  #buttons{
      text-align: center;
    }      
      
  #body{
  padding-right: 3%;
  padding-left: 3%;
  }

  #othercollegeinput{
    display: none;
  }

  #othercourseinput{
    display: none;
  }

  #otherCertification{
    display: none;
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
 
 function otherCollege(){
    var x = document.getElementById("collegeInput").value;

    if (x=="Other")
      document.getElementById("othercollegeinput").style.display = 'block';
    else
      document.getElementById("othercollegeinput").style.display = 'none';
 }
 
 function otherCourse(){
    var x = document.getElementById("collegeCourseInput").value;

    if (x=="Other")
      document.getElementById("othercourseinput").style.display = 'block';
    else
      document.getElementById("othercourseinput").style.display = 'none';
 }

 function otherCert(){
    var x = document.getElementById("certification[]").value;

    if (x=="Other")
      document.getElementById("otherCertification").style.display = 'block';
    else
      document.getElementById("otherCertification").style.display = 'none';
 }
</script>
  


<script>
$(document).ready(function(){
	
		 $('[data-toggle="tooltip"]').tooltip()
		var options = '';
		for(var i=1; i<=31; i++){
				if(i !=1){
		options +='<option value='+i+'>'+i+'</option>';
		}else{
		options +='<option value='+i+' selected>'+i+'</option>';
		}
		}
    $('#DOBday').html(options);
	
		options = '';
		for(var i=1940; i<=1996; i++){
			if(i !=1940){
		options +='<option value='+i+'>'+i+'</option>';
		}else{
		options +='<option value='+i+' selected>'+i+'</option>';
		}
		
		}
    $('#DOByear').html(options);
	
//	console.log(  $('#DOByear').val());
	
$('#DOBmonth').change(function() {
	days=31;
    var options = "";
    if($(this).val()%2 == '1') {
      days=31;
    }
    else if ($(this).val() == '2'){
       days=28
    }else{
		days=30
	}
	for(var i=1; i<=days; i++){

         if(i == 1){
            options +='<option value='+i+' selected>'+i+'</option>';
        }


		options +='<option value='+i+'>'+i+'</option>';
	}
    $('#DOBday').html(options);
});

$('#nextButton').click(function(){
	$('#container1').css("display", "none");
	$('#container2').css("display", "inline-block");
});

});
</script>

</head>
<body>

<div class="container" id="container1">
  <div class="row col-md-offset-1 col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Registration: Basic Information</h1>
        </div>

        <div class="panel-body">
                                              <br>

    <div class="row">
            <label class="error_message col-md-6" id="header_errorMessage" name="header_errorMessage"><?php echo $reply; ?></label>
    </div>

    <form class="form-horizontal" id="registrationForm" role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
        <div class="form-group">
            <label class="control-label col-md-5" for="studentid">Student ID (For Experts Academy Students):</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="studentid" name="fname" disabled>
                <div class="error_container" id="studentId_errorMessageContainer"><label class="error_message" id="studentId_errorMessage" name="studentId_errorMessage"></label></div>
            </div>
        </div>
        <div class="col-md-12">
            <h4>Fill-up form below (For non Experts Academy Students):</h4>
        </div>

  <div class="form-group">   
        
 <label class="col-sm-1" for="fname">First Name:<span style="color:red">*</span></label>
      
      <div class="col-md-3">         
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $first_name;?>">
     <div class="error_container" id="firstName_errorMessageContainer"><label class="error_message" id="firstName_errorMessage" name="firstName_errorMessage"><?php echo $fnErr; ?></label></div>
            </div>
      
     
               <label class="col-sm-1" for="mname">Middle Name:</label>      
                   <div class="col-md-3">
                <input type="text" class="form-control" id="mname" name="mname" placeholder="Full middle name" value="<?php echo $middle_name;?>">
                       
                       <div class="error_container" id="middleName_errorMessageContainer"><label class="error_message" id="middleName_errorMessage" name="middleName_errorMessage"><?php echo $mnErr; ?></label></div>
            </div>
      
      
       
            <label class="col-sm-1" for="lname">Last Name:<span style="color:red">*</span></label>
        <div class="col-md-3">
        
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $last_name;?>">
            
            
            <div class="error_container" id="lastName_errorMessageContainer"><label class="error_message" id="lastName_errorMessage" name="lastName_errorMessage"><?php echo $lnErr; ?> </label></div>
            </div>
        
        
        </div>
        
        
        
        

        
        <div class="form-group">
            <label class="control-label col-md-2" for="bdayForm">Birthdate:</label>
        </div>

     
        <div class="form-group">
        <div id="bdayForm">
                 <label class="control-label col-md-offset-1 col-md-1" for="DOBmonth">Month:</label>
                <div class="col-md-3">
                    <select id="DOBmonth" name="DOBMonth" class="form-control" >
                            <option value="1" selected>January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                   </select>
                </div>
            </div>
        



            <label class="control-label col-md-offset-1 col-md-2" for="cellnum">Mobile Phone:</label>
            <div class="col-md-3">
                <input type="text" class="form-control" id="cellnum" placeholder="ex. +639847226451" name="cpnum" value="<?php echo $contact_no;?>">
                
                <div class="error_container" id="cellNumber_errorMessageContainer"><label class="error_message" id="cellNumber_errorMessage" name="cellNumber_errorMessage"><?php echo $cnErr; ?> </label></div>
                
            </div>
    
        
        
        
        </div>
       
  

        <div class="form-group">
                  <label class="control-label col-md-offset-1 col-md-1" for="DOBday">Day:</label>
                <div class="col-md-3">
                    <select id="DOBday" name="DOBDay" class="form-control">
                                 
                   </select>
                </div>


            <label class="control-label col-md-offset-1 col-md-2" for="cityInput">City:<span style="color:red">*</span></label>
            <div class="col-md-3">
               <input type ="text" class="form-control" id="cityInput" name="cityInput"/>
                
                <div class="error_container" id="city_errorMessageContainer"><label class="error_message" id="city_errorMessage" name="city_errorMessage"><?php echo $addErr; ?></label></div>
            </div>

  
      
        
        
        </div>
        
        
        

        <div class="form-group">
                  <label class="control-label col-md-offset-1 col-md-1" for="DOByear">Year:</label>
                <div class="col-md-3">
                    <select id="DOByear" name="DOBYear" class="form-control">
                 
                   </select>
                </div>

                            <label class="control-label col-md-offset-1 col-md-2" for="address">Address:<span style="color:red">*</span></label>
            <div class="col-md-3">
               <textarea class="form-control" rows="3" id="address" name="address"> <?php echo $address;?></textarea>
                
                <div class="error_container" id="address_errorMessageContainer"><label class="error_message" id="address_errorMessage" name="address_errorMessage"><?php echo $addErr; ?></label></div>
            </div>

       
        
        
      
        
        </div>

      

        <div class="form-group">
            <label class="control-label col-md-2" for="email">Email:<span style="color:red">*</span></label>
            <div class="col-md-4">
                <input type="email" placeholder="ex. username@domain.com" class="form-control" id="email" name="emailAdd" value="<?php echo $email;?>"> <div class="error_container" id="emailAdress_errorMessageContainer"><label class="error_message" id="emailAdress_errorMessage" name="emailAdress_errorMessage"><?php echo $emErr; ?> </label></div>
            </div>
      
                  <label class="control-label col-md-2" for="mstatus">Marital Status:<span style="color:red">*</span></label>
            <div class="col-md-3">
                <select class="form-control" id="mstatus" name="Marital-Status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                </select>
          
            <div class="error_container" id="maritalStatus_errorMessageContainer"><label class="error_message" id="maritalStatus_errorMessage" name="maritalStatus_errorMessage"><?php echo $msErr; ?> </label></div>
            
            </div>
      
        

       
        
        
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="pwd">Password:<span style="color:red">*</span></label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="pwd" name="password">
                    
                <div class="error_container" id="password_errorMessageContainer"><label class="error_message" id="password_errorMessage" name="password_errorMessage"><?php echo $pwErr; ?></label></div>
                
            </div>


             <label class="control-label col-md-offset-1 col-md-2" for="gender">Gender:<span style="color:red">*</span></label>
                <div class="col-md-4">
                    <div class="radio">
                        <label><input type="radio" name="sex" value="M">Male</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="sex" value="F">Female</label>
                    </div>
               
                <div class="error_container" id="gender_errorMessageContainer"><label class="error_message" id="gender_errorMessage" name="gender_errorMessage"><?php echo $seErr; ?> </label></div>
            
            </div>

        </div>

        
        <div class="form-group">
            <label class="control-label col-md-2" for="confirm">Confirm Password:<span style="color:red">*</span></label>
            <div class="col-md-3">
                <input type="password" class="form-control" id="confirm" name="confirmPassword">
          
            <div class="error_container" id="confirmPassword_errorMessageContainer"><label class="error_message" id="confirmPassword_errorMessage" name="confirmPassword_errorMessage"><?php echo $cpErr; ?></label></div>
            </div>
        </div>

      <br>
        <div class="form-group">
            <div class="row btn-row">
   
                <a href="main-login.php"><button type="button" class="btn btn-default">Cancel</button></a>           
                <input type="submit" id="nextButton" class="btn btn-success" value="Next"></input>
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







//Replace the "Hi!" string with the description
$('[data-toggle="tooltip"]').attr('title','Check if you have passed Experts Academy\'s Skill Assesment Test for this Certification');    
$('[data-toggle="tooltip"]').tooltip({
        placement : 'right'
});

</script>
<script src="js/applicantSetupAddJobTitle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</html>