<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInApplicant($_SESSION["account_id"]);

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
<link rel="stylesheet" href="css/search.css">
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
				            <h3 class="panel-title">Position here</h3>
				        </div>

					
				  		<div class="panel-body">
						  		
						  		<div class="row">
						  			<label class="col-md-4">College Course Required: </label>
							  				<label class="output-label col-md-8" id="collegeCourseOutput" name="collegeCourseOutput">Applicant's college course here</label>
						  		</div>

						  		<br>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Work Details</h4>
							  			<hr>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<div class="row">
							  				<label class="col-md-3">Location: </label>
							  				<label class="output-label col-md-9" id="locationOutput" name="locationOutput">Location here</label>
							  			</div>

							  			<div class="row">
							  				<label class="col-md-3">Work Hours/Day: </label>
							  				<label class="output-label col-md-9" id="hoursPerDayOutput" name="hoursPerDayOutput">Work Hours/Day here
							  				</label>
							  			</div>

							  			<div class="row">
							  				<label class="col-md-3">Work Schedule: </label>
							  				<label class="output-label col-md-9" id="workScheduleOutput" name="workScheduleOutput">Work schedule here</label>

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
							  			<label class="output-label col-md-12" id="skillOutput1" name="skillOutput1">skill 1 here</label>
							  			<label class="output-label col-md-12" id="skillOutput2" name="skillOutput2">skill 2 here</label>
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
							  			<label class="output-label col-md-6" id="jobTitleOutput1" name="jobTitleOutput1">Job Title 1 here</label>
							  			<label class="output-label col-md-6" id="yearsOfExperienceOutput1" name="yearsOfExperienceOutput1">Years of Experience 1 here</label>

							  			<label class="output-label col-md-6" id="jobTitleOutput2" name="jobTitleOutput2">Job Title 2 here</label>
							  			<label class="output-label col-md-6" id="yearsOfExperienceOutput2" name="yearsOfExperienceOutput2">Years of Experience 2 here</label>
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
							  			<label class="col-md-6">Certificate</label>
							  			<label class="col-md-6">Certificate of Competency</label>
						  			</div>
						  		</div>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<label class="output-label col-md-6" id="certificateOutput1" name="certificateOutput1">Certificate 1 here</label>
							  			<label class="output-label col-md-offset-1 col-md-5" id="certificateOfCompetencyOutput1" name="certificateOfCompetencyOutput1"><span><i class="glyphicon glyphicon-ok"></i></span></label> <!--  if merong certificate of competency use <span><i class="glyphicon glyphicon-ok"></i></span>, pag wala use  <span><i class="glyphicon glyphicon-remove"></i></span> -->

							  			<label class="output-label col-md-6" id="certificateOutput2" name="certificateOutput2">Certificate 2 here</label>
							  			<label class="output-label col-md-offset-1 col-md-4" id="certificateOfCompetencyOutput2" name="certificateOfCompetencyOutput2"><span><i class="glyphicon glyphicon-remove"></i></span></label> <!--  if merong certificate of competency use <span><i class="glyphicon glyphicon-ok"></i></span>, pag wala use  <span><i class="glyphicon glyphicon-remove"></i></span> -->
							  		
						  			</div>
						  		</div>


						  		<br><br>

						  		<div class="jobListingContainer">

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Complete Job Listing Details</h4>
							  			<hr>
						  			</div>
						  		</div>
                                    
                                                              <div class ="row">
 	<div class="row">
						  			<div class="col-md-12">
							  			<label class="col-md-3">Total Slots: </label> <label class="output-label col-md-3" id="totalSlotsOutput" name="totalSlotsOutput">slots here</label>
                                        <label class="col-md-3">Available Slots: </label> <label class="output-label col-md-3" id="availableSlotsOutput" name="availableSlotsOutput">slots here</label>
							 
						  			</div>
						  		</div>

                                    </div>   
                                    

						  		<div class="row">
						  			<div class="col-md-12">
							  				<!-- DEVs make your own UI for viewing and download the resume -->
						  			</div>
						  		</div>

						  		</div>

						  		<br><br>

						  		<div class="row">
						  			<div class="col-md-12">
							  			<h4>Applicants</h4>
							  			<hr>
						  			</div>
						  		</div>


						  		<div class="row" id="listContainer">

						  			<div class=" col-md-12">
						  			<div class="panel panel-default" id="result1">
								        <div class="panel-heading">
								            <h3 class="panel-title">Applicant name here</h3>
								        </div>

								        <div class="panel-body">
								            <div class="row">
								            	<div class="col-md-6">
								            		<label class="col-md-4">Location: </label> <label class="col-md-8 output-label">Location here</label>
								            		<label class="col-md-4">Course: </label> <label class="col-md-8 output-label">Course here</label>
								            		<label class="col-md-4">School: </label> <label class="col-md-8 output-label">School here</label>
								            	</div>
								            	<div class="col-md-6 resultButtonCol">
								            		<div class="col-md-6 ">
								            			<input type="button" class="btn btn-default btn-fill " id="viewProfile1" name="viewProfile1" value="View Profile"/>
								            		</div>
								            		<div class="col-md-6">
								            			<input type="button" class="btn btn-success btn-fill" id="setAppointment1" name="setAppointment1" data-toggle="modal" data-target="#schedule-popup" value="Set Appointment"/>
								            		</div>
								            	</div>
								            </div>
								        </div>

									</div> <!--  end of <div class="panel panel-default"> -->


								<div class="panel panel-default" id="result2">
								        <div class="panel-heading">
								            <h3 class="panel-title">Applicant name here</h3>
								        </div>

								        <div class="panel-body">
								            <div class="row">
								            	<div class="col-md-6">
								            		<label class="col-md-4">Location: </label> <label class="col-md-8 output-label">Location here</label>
								            		<label class="col-md-4">Course: </label> <label class="col-md-8 output-label">Course here</label>
								            		<label class="col-md-4">School: </label> <label class="col-md-8 output-label">School here</label>
								            	</div>
								            	<div class="col-md-6 resultButtonCol">
								            		<div class="col-md-6 ">
								            			<input type="button" class="btn btn-default btn-fill " id="viewProfile2" name="viewProfile2" value="View Profile"/>
								            		</div>
								            		<div class="col-md-6">
								            			<input type="button" class="btn btn-success btn-fill" id="setAppointment2" name="setAppointment2" data-toggle="modal" data-target="#schedule-popup" value="Set Appointment"/>
								            		</div>
								            	</div>
								            </div>
								        </div>

									</div> <!--  end of <div class="panel panel-default"> -->


								</div>



			<div class="col-md-12">			
			<hr id="bottomOfResults">
			</div>

	<!-- 		<nav class="center">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav> -->



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