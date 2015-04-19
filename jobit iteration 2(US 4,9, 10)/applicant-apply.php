<?php
session_start();

?>

<?php 
    include 'logic/logic_getcompanydetails.php';
	include 'mvc/controller.php';
				
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- added this (dev)-->

<!-- important initialization js files end -->



</head>
<body>


<div class="container mainContainer">

 	<div class="row containerRow">
		 		<div class="col-md-offset-2 col-md-8 containerCol">
					<div class="panel panel-default profile-panel">

						<div class="panel-heading">
				            <h3 class="panel-title"> <?php echo $company_name . " - " . $job_titles; ?> </h3>
				        </div>

					
				  		<div class="panel-body">
						  		
						  		<div class="row">
						  			<label class="col-md-4">College Course Required: </label>
							  				<label class="output-label col-md-8" id="collegeCourseOutput" name="collegeCourseOutput"> <?php echo $course; ?> </label>
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
							  				<label class="output-label col-md-9" id="locationOutput" name="locationOutput"> <?php echo $location; ?> </label>
							  			</div>

							  			<div class="row">
							  				<label class="col-md-3">Work Hours/Day: </label>
							  				<label class="output-label col-md-9" id="hoursPerDayOutput" name="hoursPerDayOutput"> <?php echo $work_hours; ?> </label>
							  			</div>

							  			<div class="row">
							  				<label class="col-md-3">Work Schedule: </label>
							  				<label class="output-label col-md-9" id="workScheduleOutput" name="workScheduleOutput"> <?php echo $work_days; ?> </label>

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
							  			<label class="output-label col-md-12" id="skillOutput1" name="skillOutput1"> <?php echo $skills; ?> </label>
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
							  			<label class="output-label col-md-6" id="jobTitleOutput1" name="jobTitleOutput1"> <?php echo $job_requirement; ?></label>
							  			<label class="output-label col-md-6" id="yearsOfExperienceOutput1" name="yearsOfExperienceOutput1"> <?php echo $work_experience; ?> </label>


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
							  			<label class="output-label col-md-6" id="certificateOutput1" name="certificateOutput1"> <?php echo $certs; ?> </label>
							  			<label class="output-label col-md-offset-1 col-md-5" id="certificateOfCompetencyOutput1" name="certificateOfCompetencyOutput1"><span><i class="glyphicon glyphicon-ok"></i></span></label> <!--  if merong certificate of competency use <span><i class="glyphicon glyphicon-ok"></i></span>, pag wala use  <span><i class="glyphicon glyphicon-remove"></i></span> -->

							  			
							  		
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
							  			<label class="col-md-3">Total Slots: <?php echo $total_slots; ?> </label> <label class="output-label col-md-3" id="totalSlotsOutput" name="totalSlotsOutput"> </label>
                                        <label class="col-md-3">Available Slots: <?php echo $slots_available; ?> </label> <label class="output-label col-md-3" id="availableSlotsOutput" name="availableSlotsOutput"> </label>
							 
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

						  		<div class="row button-row">
						  			<div class="col-md-12">
						  				<input type="button" class="btn btn-default" id="backButton" value="Back"/>
						  				<input type="button" class="btn btn-success" id="applyButton" value="Apply" onClick ="$.get('logic/logic_applicantapply.php); this.disabled='disabled';"/>
						  			</div>
						  
						  		</div>


						  




						   
					  	</div>

					</div> <!--  end of <div class="panel panel-default"> -->
				</div>
	 </div>
</div>  <!-- end of <div class="container mainContainer"> -->


</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<!-- js end -->


<?php 
/*
function apply() 
{	
	//this function just creates a feedback
	include 'logic/logic_applicantapply.php'; 
	
	echo 'alert("You have successfully applied for this job listing!")';

}
*/
?>

<script>
$('#applyButton').click(function(){
   window.location.assign('/logic/logic_applicantapply.php');
});
</script>


</html>