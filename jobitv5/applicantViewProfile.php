<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	if(isset($_SESSION["account_id"]))
	{
		$ap = getLoggedInApplicant($_SESSION["account_id"]);
		$ap_profile = $ap->get_profile();

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
<link rel="stylesheet" href="css/jobitmenu.css">
<!-- common css end  -->


<!-- specific css start  -->
<link rel="stylesheet" href="css/applicantProfileView.css">
<!-- specific css end  -->


<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->


 
</head>
<body>

	<?php include 'headers/header-applicant.php'; ?>
	<script src="js/applicantProfileActive.js"></script>



<div class="container mainContainer">

 	<div class="row containerRow">
		 		<div class="col-md-offset-2 col-md-8 containerCol">
					<div class="panel panel-default profile-panel">
					
				  		<div class="panel-body">
						  		<div class="row">
						  			<div class="col-md-3">
						  				<img class="profileImg" src="#">
						  			</div>

						  			<div class="col-md-8">
						  				<br>
						  				<label class="output-label" id="nameOutput" name="nameOutput"><b>Name:</b> <?php echo $ap->get_firstname() . " " . $ap->get_lastname(); ?></label> <br>
						  				<label class="output-label" id="birthdateOutput" name="birthdateOutput"><b>Birthdate:</b> <?php echo $ap->get_birthday(); ?></label> <br>
						  				<label class="output-label" id="genderOutput" name="genderOutput"> <b>Gender: </b> <?php echo $ap->get_sex(); ?>  </label> <br>
						  				<label class="output-label" id="maritalStatusOutput" name="maritalStatusOutput"> <b> Marital Status: </b> <?php echo $ap->get_maritalstatus(); ?></label> <br>
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
							  				<label class="output-label col-md-4" id="collegeOutput" name="collegeOutput"><?php echo $ap_profile->get_college(); ?></label>

							  				<label class="col-md-2">College Course: </label>
							  				<label class="output-label col-md-4" id="collegeCourseOutput" name="collegeCourseOutput"><?php echo $ap_profile->get_course(); ?></label>
							  			</div>

							  			<div class="row">
							  				<label class="col-md-2">Highschool: </label>
							  				<label class="output-label col-md-10" id="hsOutput" name="hsOutput"><?php echo $ap_profile->get_school(); ?></label>
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
							  			<label class="output-label col-md-12" id="skillOutput1" name="skillOutput1"><?php echo $ap_profile->get_skills(); ?></label>
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
						  				<?php 

						  					for($i = 0; $i<count($ap_profile->get_workexp()); $i++)
						  					{
						  						$we = $ap_profile->get_workexp();
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

						  					for($i = 0; $i<count($ap_profile->get_certexams()); $i++)
						  					{
						  						$ce = $ap_profile->get_certexams();
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





						   
					  	</div>

					</div> <!--  end of <div class="panel panel-default"> -->
				</div>
	 </div>
</div>  <!-- end of <div class="container mainContainer"> -->


</body>

<!-- js start -->
<script src="js/bootstrap.min.js"></script>
<!-- js end -->

</html>