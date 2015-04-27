<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInAccount($_SESSION["account_id"]);
		$company = getCompanyById($_SESSION["account_id"]);

		if(isset($_GET['id']))
		{
			$applicant = getApplicantById($_GET['id']);
			$profile = $applicant->get_profile();
		}
		else
		{
			echo "No joblisting selected.";
			header('Refresh: 2; URL=applicantSearch.php');
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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<link rel="shortcut icon" href="">

<!-- bootstrap css start  -->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<!-- bootstrap css end  -->



<!-- common css start  -->
<link rel="stylesheet" href="css/button.css">
<link rel="stylesheet" href="css/panels.css">
<link rel="stylesheet" href="css/errormessage.css">
<link rel="stylesheet" href="css/style.css">
<!-- common css end  -->


<!-- specific css start  -->
<link rel="stylesheet" href="css/applicantProfileView.css">
<!-- specific css end  -->


<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->


 
</head>
<body>


<div class="container mainContainer">

 	<div class="row containerRow">
		 		<div class="col-md-offset-2 col-md-8 containerCol">
					<div class="panel panel-default profile-panel">

						 <div class="panel-heading">
				            <h3 class="panel-title"><?php echo $applicant->get_firstname(). " " . $applicant->get_lastname(); ?></h3>
				         </div>
					
				  		<div class="panel-body">
						  		<div class="row">
						  			<div class="col-md-3">
						  				<img class="profileImg" src="#">
						  			</div>

						  			<div class="col-md-8">
						  				<br>
						  				<label class="output-label" id="birthdateOutput" name="birthdateOutput"><?php echo $applicant->get_birthday(); ?></label> <br>
						  				<label class="output-label" id="genderOutput" name="genderOutput"> <?php echo $applicant->get_sex(); ?></label> <br>
						  				<label class="output-label" id="maritalStatusOutput" name="maritalStatusOutput"> <?php echo $applicant->get_maritalstatus(); ?></label> <br>
						  			</div>

						  		</div>

						  		<br><br>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Education</h4>
							  			<hr>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<div class="row">
							  				<label class="col-md-2">College: </label>
							  				<label class="output-label col-md-4" id="collegeOutput" name="collegeOutput"><?php echo $profile->get_college(); ?></label>

							  				<label class="col-md-2">College Course: </label>
							  				<label class="output-label col-md-4" id="collegeCourseOutput" name="collegeCourseOutput"><?php echo $profile->get_course(); ?></label>
							  			</div>

							  			<div class="row">
							  				<label class="col-md-2">Highschool: </label>
							  				<label class="output-label col-md-10" id="hsOutput" name="hsOutput"><?php echo $profile->get_school(); ?></label>
							  			</div>
						  			</div>
						  		</div>

						  		<br><br>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Skills</h4>
							  			<hr>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<label class="output-label col-md-12" id="skillOutput1" name="skillOutput1"><?php echo $profile->get_skills(); ?></label>
						  			</div>
						  		</div>


						  		<br><br>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Work Experience</h4>
							  			<hr>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<label class="col-md-6">Job Title</label>
							  			<label class="col-md-6">Years of Experience</label>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">

						  				<?php 

						  					for($i = 0; $i<count($profile->get_workexp()); $i++)
						  					{
						  						$we = $profile->get_workexp();
						  						$we = $we[$i];
						  						echo "<label class=\"output-label col-md-6\" id=\"jobTitleOutput1\" name=\"jobTitleOutput1\">".$we->get_worktitle()."</label>
							  					<label class=\"output-label col-md-6\" id=\"yearsOfExperienceOutput1\" name=\"yearsOfExperienceOutput1\">".$we->get_years()."</label>";
						  					} 


						  				?>	

						  			</div>
						  		</div>


						  		<br><br>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Certifications</h4>
							  			<hr>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<label class="col-md-4">Certificate</label>
							  			<label class="col-md-4">Date Achieved</label>
							  			<label class="col-md-4">Certificate of Competency</label>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<?php 

						  					for($i = 0; $i<count($profile->get_certexams()); $i++)
						  					{
						  						$ce = $profile->get_certexams();
						  						$ce = $ce[$i];
						  					
							  					echo "<label class=\"output-label col-md-4\" id=\"certificateOutput1\" name=\"certificateOutput1\">".$ce->get_certificatename()."</label>
							  					<label class=\"output-label col-md-4\" id=\"dateAchievedOutput1\" name=\"dateAchievedOutput1\"> April 2015 </label>";
							  					if($ce->get_competency() == 1)
							  						echo "<label class=\"output-label col-md-offset-1 col-md-2\" id=\"certificateOfCompetencyOutput1\" name=\"certificateOfCompetencyOutput1\"><span><i class=\"glyphicon glyphicon-ok\"></i></span></label>";
						  						else
						  							echo "<label class=\"output-label col-md-offset-1 col-md-2\" id=\"certificateOfCompetencyOutput1\" name=\"certificateOfCompetencyOutput1\"><span><i class=\"glyphicon glyphicon-remove\"></i></span></label>";
						  					}



						  				?>	
							  		
						  			</div>
						  		</div>


						  		<br><br>

						  		<div class="resumeContainer">

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Resume</h4>
							  			<hr>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  				<!-- DEVs make your own UI for viewing and download the resume -->
						  			</div>
						  		</div>

						  		</div>

						  		<br><br>

						  		<div class="row button-row">
						  			<div class="col-md-12">
						  					<a href="companySearch.php"><input type="button" class="btn btn-default " id="backtButton" name="backtButton" value="Back"/></a>
						  					<input type="submit" class="btn btn-success " id="setAppointmentButton" name="setAppointmentButton" value="Set Appointment" data-toggle="modal" data-target="#schedule-popup"/>
						  			</div>
						  
						  		</div>





						   
					  	</div>

					</div> <!--  end of <div class="panel panel-default"> -->
				</div>
	 </div>
</div>  <!-- end of <div class="container mainContainer"> -->

    
    
    
    
    
    
    
    
    
    
        <div id="schedule-popup" class="modal fade">
        <div class="modal-dialog" id="schedule-container">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" id="schedule-popup-header">Schedule an Appointment</h4>
                </div>
                <!--Body-->
                <form class="form-horizontal" role="form" id="schedule-form">
                    <div class="modal-body">
                            <!--Reschedule Date group-->
                            <div class="form-group">
                                <label class="control-label col-md-2" for="date">Date:</label>
                                <div class="col-md-10">
                                    <input type="date" class="form-control" id="schedule-date" placeholder="Enter date">
                                    <span class="error_message error_container">Error Message</span>
                                </div>
                            </div>
                            <!--Reschedule Time group-->
                            <div class="form-group">
                                <label class="control-label col-md-2" for="time">Time:</label>
                                <div class="col-md-10">
                                    <input type="time" class="form-control" id="schedule-date" placeholder="Enter time">
                                    <span class="error_message error_container">Error Message</span>
                                </div>
                            </div>            
                            <!--Reschedule Message Row-->
                            <div class="form-group">
                               <label class="control-label col-md-2" for="msg">Message:</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="schedule-msg" cols="50" placeholder="Enter Message"></textarea>
                                    <span class="error_message error_container">Error Message</span>
                                </div>
                            </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="col-md-12 btn-row">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                           
                            </div>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
    
    
    
    
    

</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<!-- js end -->

</html>