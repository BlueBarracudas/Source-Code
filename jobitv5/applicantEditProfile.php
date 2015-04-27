<?php

  session_start();

  include '/MVC/controller.php';

  loadAll();

  if(isset($_SESSION["account_id"]))
  {
    $ap = getLoggedInApplicant($_SESSION["account_id"]);
    $ap_profile = $ap->get_profile();
    include 'logic/logic_applicanteditprofile.php';

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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Profile</title>
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  
   <link rel="stylesheet" href="Resources/jquery-ui-1.11.3.custom/jquery-ui.css">
   <script src="Resources/jquery-ui-1.11.3.custom/external/jquery/jquery.js"></script>
    
    
<script src="js/applicantEditProfile.js"></script>  
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/errormessage.css">
  <link rel="stylesheet" href="css/button.css">
   <link rel="stylesheet" href="css/panels.css">
  <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/applicant-setup.css">  
    <link rel="stylesheet" href="css/applicantEditProfilePage.css">  

 

  <script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/applicantRegistration-EditProfile.js"></script>
  <script src="js/applicantSetupAddJobTitle.js"></script>
  <script src="js/applicantSetupShowOther.js"></script>
  




</head>
<body>

<div class="container mainContainer" id="container1">
  <div class="row col-md-offset-1 col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1 class="panel-title">Edit Profile</h1>
        </div>

        <div class="panel-body">
                                              <br>

    <div class="row error_container">
            <label class="error_message col-md-6" id="header_errorMessage" name="header_errorMessage">ERROR HERE</label>
    </div>

    <form class="form-horizontal" id="registrationForm" role="form" method="POST" action="">
      
    

          
          
<h4>Personal Details:</h4>
<br>
   
    
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
               <input type ="text" class="form-control" id="cityInput" name="cityInput"/> <?php echo $address;?>
                
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



<div id="container2">
<br>

<h4>Education:</h4>
<br>


  <div class="row">
   <div class="col-md-3"><label>High School:</label><span style="color:red">*</span></div>
   <div class="col-md-9">
            <div id="hschoollist">
                <input class="form-control input-sm classhschool" type="text" name="hschool">
                
                
                                <div class="error_container" id="highSchool_errorMessageContainer"><label class="error_message" id="highschool_errorMessage" name="highchool_errorMessage"><?php echo $scErr; ?></label></div>
                
                
                
            </div>
 </div>
    </div>
 <br>

  <div class="row">
  <div class="col-sm-3"><label>College:<span style="color:red">*</span> </label></div>
    <div class="col-sm-9">
        <div id="collegelist">
              <select id="collegeInput" onchange="otherCollege(this)" name="collegeInput" class="form-control" >
                            <option value="" disabled selected>--- Select ---</option>
                            <option value="De La Salle University - Manila (DLSU)" >De La Salle University - Manila (DLSU)</option>
                            <option value="University of the Philippines - Diliman (UPD)" >University of the Philippines - Diliman (UPD)</option>
                            <option value="University of the Philippines - Diliman (UPD)" >University of the Philippines - Diliman (UPD)</option>
                            <option value="Other" >Other</option>
              </select>
                            <div id="othercollegeinput">
                              <br>
                              <label class="col-md-2 otherCollege-label">Other:<span style="color:red">*</span></label>
                              <div class="col-md-10">
                                <input class="form-control otherCollege-input input-sm othercollege" type="text" id="othercollege" name="othercollege">
                              </div>
                            </div>
        
                        <div class="error_container" id="college_errorMessageContainer"><label class="error_message" id="college_errorMessage" name="college_errorMessage"><?php echo $colErr; ?></label></div>
                
        
        
        
        </div>
      </div>
</div>

<br>

 <div class="row">
     <div class="col-sm-3"><label>College Course:</label> </div>
     <div class="col-sm-9">
         <div id="courselist">

          <select id="collegeCourseInput" onchange="otherCourse(this)" name="collegeCourseInput" class="form-control" >
                            <option value="" disabled selected>--- Select ---</option>
                            <option value="BS-CS (Computer Science)">BS-CS (Computer Science)</option>
                            <option value="BS-CE (Computer Engineering)" >BS-CE (Computer Engineering)</option>
              <option value="Other" >Other</option>
          </select>
                            <div id="othercourseinput">
                              <br>
                              <label class="col-md-2 otherCourse-label control-label">Other:<span style="color:red">*</span></label>
                              <div class="col-md-10">
                                <input class="form-control otherCourse-input input-sm othercourse" type="text" id="othercourse" name="othercourse">
                              </div>
                            </div>
             
             
                             <div class="error_container" id="collegeCourse_errorMessageContainer"><label class="error_message" id="collegeCourse_errorMessage" name="collegeCourse_errorMessage"><?php echo $couErr; ?></label></div>
                
             
             
             
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
   
   <div class="row">
  <div class="control-label col-md-2"><label>Job Title:</label> </div>
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
   
   
  </div>





   
  </div>
  
  

<div class="row">
             <button type="button" class="btn btn-link col-md-offset-3" id="workadd">+add another Job Title.</button>
            </div>
     
  <br> 

    <div class="row">
  <div class="col-sm-3"><label>Certification(s):</label> </div> <div class="col-md-7">
        <div id="certlist">

             <select class="form-control input-sm classcert" onchange="otherCert(this)" type="text" name="certification[]" id="certification[]">
                            <option value="" disabled selected>--- Select Certificate ---</option>
                            <option value="Cisco Certified Network Associate (CCNA)">Cisco Certified Network Associate (CCNA)</option>
                            <option value="Cisco Certified Network Professional (CCNP)" >Cisco Certified Network Professional (CCNP)</option>
              <option value="Other" >Other</option>
            </select>
                            <div id="otherCertification">
                              <label class="col-md-3 otherCert-label control-label">Other:</label>
                              <div class="col-md-9">
                                <input class="form-control otherCert-input input-sm othercourse" type="text" id="othercert" name="othercert">
                              </div>
                              <br>
                              <br>
                            </div>

           <label class="col-md-5 dateachieved-label control-label">Date Achieved:</label>    
           <div class="col-md-7 dateachieved-input">
                <input class="form-control input-sm classhschool" type="date" name="certdate">
            </div>
            
           <br> 
            <div class="checkbox"><label><input class="competency-checkbox" type="checkbox"/>Certificate of Competency</label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Check if you have passed Experts Academy\'s Skill Assesment Test for this Certification"></span></div>
         


                            <div class="error_container" id="cert_errorMessageContainer1"><label class="error_message" id="cert_errorMessage1" name="cert_errorMessage1"><?php echo $ceErr; ?></label></div>
            
        </div>




        <button type="button" class="btn btn-link" id="certadd">+add another Cert.</button> </div>
  
    
    
    
    
    </div>
        </div>
  
  <br>
  

        <h4>Resume</h4>
    <span class="btn btn-default btn-file">
        Upload Resume<input type="file" id="uploadResume" name="Upload New Resume"> </span>

    
    <br><br><br>

    
    
      <div class="form-group">
          <div id="buttons">     
            <a href="applicantHomePage.php"><button type="button" class="btn btn-default">Back</button></a>
             <input type="submit" id="saveChangesBtn" class="btn btn-success" value="Save Changes">
          </div>
        </div>

    </form> 
        </div>
  
    </div>
  </div>
</div>







</body>

<script src="js/jquery-2.1.3.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="Resources/jquery-ui-1.11.3.custom/jquery-ui.js"></script>


<script src="js/applicantSetupAddJobTitle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</html>