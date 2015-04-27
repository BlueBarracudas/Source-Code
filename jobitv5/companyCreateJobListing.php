<?php

  session_start();

  include '/MVC/controller.php';

  loadAll();

  if(isset($_SESSION["account_id"]))
  {
    $ap = getLoggedInAccount($_SESSION["account_id"]);
    $company = getCompanyById($_SESSION["account_id"]);

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
<title></title>
<link rel="shortcut icon" href="">

<!-- bootstrap css start  -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" hre[f="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- bootstrap css end  -->



<!-- common css start  -->
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="css/panels.css">
<link rel="stylesheet" href="css/errormessage.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/jobitmenu.css">
<!-- common css end  -->


<!-- specific css start -->
<link rel="stylesheet" href="css/applicantSearch.css">
<link rel="stylesheet" href="css/search.css">
 <link rel="stylesheet" href="css/createJobListing.css">  
<!-- specific css end-->

<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>


<!-- important initialization js files end -->


 
</head>
<body>

<?php include 'headers/header-company.php'; ?>
  <script src="js/companyJobListingActive.js"></script>

<div class="container mainContainer">
  
    
    
    
    
  <div class="panel panel-default profile-panel">
<div class="panel-heading">
                                  <h3 class="panel-title" id="SetupHeader">Create Job Listing <p style="color:black;"> <?php echo $reply ?> </p> </h3>
    
       </div>

        <div class="row error_container">
            <label class="error_message col-md-6" id="header_errorMessage" name="header_errorMessage">ERROR HERE</label>
         </div>

                              <div class="panel-body">
 
 <div id="body">
 <form action="" method ="post">
  <h3> Work Details </h3>
<br>


    <div class="row">
              <div class="col-sm-3"><label>Position:<span style="color:red">*</span></label></div>
            <div class="col-sm-9">
              <div id="position">
                  <input class="form-control input-sm" type="text" name="position">
              </div>
            </div> 
          </div>
 <br>

 

<br>

 <div class="row">
     <div class="col-sm-3"><label>College Course Required:</label> </div>
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

      <div class="row">
            <div class="col-md-3"><label>Lcoation:<span style="color:red">*</span></label></div>
            <div class="col-md-9" id="location">
              <input class="form-control input-sm" type="location" name="location">
            </div>
          </div>

          <br><br>


      <div class="row">
            <div class="col-md-3"><label>Work Hours/Day:<span style="color:red">*</span></label></div>
            <div class="col-md-3" id="workhours">
              <input class="form-control input-sm" type="number" min="0" name="hours">
            </div>
          </div>
          <br>
          <br>

          <div class="row">
              <div class="col-sm-3"><label>Work Schedule:<span style="color:red">*</span></label></div>
            <br><br>
             <div id="schedInputGroup">
              <div class="input-group" id="sched">
                <input type="checkbox" id="monday"> Monday</input>
              </div>
              <div class="input-group" id="sched">
                <input type="checkbox" id="tuesday"> Tuesday</input>
              </div>
              <div class="input-group" id="sched">
                <input type="checkbox" id="wednesday"> Wednesday</input>
              </div>
              <div class="input-group" id="sched">
                <input type="checkbox" id="thursday"> Thursday</input>
              </div>
              <div class="input-group" id="sched">
                <input type="checkbox" id="friday"> Friday</input>
              </div>
              <div class="input-group" id="sched">
                <input type="checkbox" id="saturday"> Saturday</input>
              </div>
              <div class="input-group" id="sched">
                <input type="checkbox" id="sunday"> Sunday</input>
              </div>
            </div>
          </div>


 <br>
 <h4>Work Experience</h4>

 <br>



   <div class="row">
  <div class="col-md-3"><label>Job Title:</label> </div>
  <div class="col-md-5" id="titlelist">
  <input class="form-control input-sm" type="text" name="jobtitle[]">  
   
  <div class="error_container" id="jobTitle_errorMessageContainer1"><label class="error_message" id="jobTitle_errorMessage1" name="jobTitle_errorMessage1"><?php echo $jtErr; ?></label></div>
   
   
   
  </div>
  <div class="col-md-2"><label>Years of Experience:</label> </div>
  <div class="col-md-2" id="yearslist">
  <input class="form-control input-sm"  min="0" type="number" name="workExp[]">
   
   
   
  <div class="error_container" id="yearsOfExperience_errorMessageContainer1"><label class="error_message" id="yearsOfExperience_errorMessage1" name="yearsOfExperience1"><?php echo $weErr; ?></label></div>

   
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
                                <input class="form-control otherCert-input input-sm othercourse" type="text" id="othercourse" name="othercourse">
                              </div>
                              <br>
                              <br>
                            </div>

  <!--          <label class="col-md-5 dateachieved-label control-label">Date Achieved:</label>    
           <div class="col-md-7 dateachieved-input">
                <input class="form-control input-sm classhschool" type="text" name="hschool">
            </div>
            
           <br>  -->
            <div class="checkbox"><label><input class="competency-checkbox" id="radioBtnYes1" name="radioBtn" value="yes" type="radio"/><span>Yes |</span>
              <input class="competency-checkbox" id="radioBtnNo1" name="radioBtn" value="no" type="radio"/><span>No |</span>Certificate of Competency</label> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="right" title="Check if you require the applicant to have passed Experts Academy\'s Skill Assesment Test for this Certification"></span></div>
         


                            <div class="error_container" id="cert_errorMessageContainer1"><label class="error_message" id="cert_errorMessage1" name="cert_errorMessage1"><?php echo $ceErr; ?></label></div>
            
        </div>




        <button type="button" class="btn btn-link" id="certadd">+add another Cert.</button> </div>
  </div>
  
  
  <br>



         <div class="row">
          <div class="col-md-12"><h4>Job Listing Details:<span style="color:red">*</span>
         <br><small>(Attach a file containing the complete details of your job listing)</small></h4></div>
          <br><br><br>
          <div class="col-md-11" id="file">
            <a href="#" onclick="uploadDoc()" id="file"></a>
            <input type="file" id="theFile" />
          </div>
        </div>

         <br>
  

<div class ="row">
    <label class="col-sm-3">Total Slots Available:</label>      <div class="col-md-2" id="yearslist"><input class="form-control input-sm" type="number" name="totalSlots"></div>
   
   

</div>
<br>



  <div class="form-group">
          <div class="row button-row">     
            <a href=""><button type="button" class="btn btn-default">Back</button></a>
             <input type="submit" id="postBtn" class="btn btn-success" value="Post">
          </div>
        </div>
        </form>
 </div>
      </div> 
    </div>
  
</div>



</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
  <script src="js/applicantRegistration-EditProfile.js"></script>
  <script src="js/applicantSetupAddJobTitle2.js"></script>
  <script src="js/applicantSetupShowOther.js"></script>

<!-- js end -->

</html>