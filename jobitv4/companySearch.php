<?php

	session_start();

	include '/MVC/controller.php';

	loadAll();

	$searchresults = "";
	$by_search = "";

	if($_SERVER["REQUEST_METHOD"] == "POST") {

		 if(!empty($_POST["keyInput"]) && $_GET['id'] == 1)
		 {
		 	$searchresults = searchApplicantByKeyWord($_POST["keyInput"]);
		 }

		 else if($_GET['id'] == 2)
		 {
		 	$searchresults = filteredSearchApplicant($_POST);
		 } 
		
	}

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
<!-- specific css end-->

<!-- important initialization js files start -->
<script src="js/jquery-2.1.3.js"></script>

<!-- important initialization js files end -->


 
</head>
<body>

<?php include 'headers/header-company.php'; ?>
	<script src="js/companySearchActive.js"></script>

<div class="container mainContainer">
	<div class="row containerRow">
		<div class="col-md-3">

			<div class="panel panel-default">
			    
			        <div class="panel-body">
			            
						<div class="row center">
							<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=1" method="POST">
									<div class="form-group">
										<label class="col-md-12">Search by Keyword/s:</label>
										<div class="col-md-12">
											<input type="text" name="keyInput" class="form-control searchInput" id="searchInput"/>
										</div>
										<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
										<div class="col-md-12">
											<input type="submit" class="btn btn-success searchButtonInput" id="searchButtonInput" value="Search"/>
										</div>

										<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
							
										<div class="col-md-12">
											<a href="#filteredSearchDiv" data-toggle="collapse" aria-expanded="false" aria-controls="filteredSearchDiv">Filtered Search</a>
										</div>


									</div>
							</form>

							<div class="filteredSearchDiv collapse" id="filteredSearchDiv">
				
								<div class="form-group">
									<div class="col-md-12">
										<hr>
									</div>
								</div>

								<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id=2" method="post">
									<div class="form-group">
										<label class="col-md-12">Age</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="ageInput" name="ageInput" class="ageInput"/>
										</div>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->


									<div class="form-group">
										<label class="col-md-12">City</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="cityInput" name="cityInput" class="cityInput"/>
										</div>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

									<div class="form-group">
										<label class="col-md-12">Skills</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="skillsInput" name="skillsInput" class="skillsInput"/>
										</div>
									</div>

									
									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

									<div class="form-group">
										<label class="col-md-12">Certification Exam Taken</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="certificationExamInput" name="certInput" class="certificationExamInput"/>
										</div>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

									<div class="form-group">
										<label class="col-md-12">College Course</label>
										<div class="col-md-12">
											<input type="text" class="form-control" id="collegeCourseInput" name="collegeCourseInput" class="collegeCourseInput"/>
										</div>
									</div>


									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->

									<div class="form-group">
										<label class="col-md-12">Work Experience</label>
									
									<div class="form-group">
											<label class="col-md-12">Job Title</label>
											<div class="col-md-12">
											<input type="text" class="form-control" id="collegeCourseInput" name = "jobInput" class="collegeCourseInput"/>
											</div>
										</div>

										<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
										
									<div class="form-group">
											<label class="col-md-12">Years of Experience</label>
											<div class="col-md-12">
											<input type="number" class="form-control" id="collegeCourseInput" name ="yearsInput" class="collegeCourseInput"/>
											</div>
										</div>

										
									</div>


									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
									<div class="col-md-12">
											<input type="submit" class="btn btn-success filteredSearchButtonInput" id="filteredSearchButtonInput" value="Search"/>
									</div>

									<div class="form-group form-group-spacer"><label class="col-md-12">space</label></div> <!-- used as spacing -->
									<div class="col-md-12">
										<a href="#filteredSearchDiv" data-toggle="collapse" aria-expanded="false" aria-controls="filteredSearchDiv">Hide</a>
									</div>
									
						
									
								</form>
					
							</div>






						</div>

			        </div>

			</div> <!--  end of <div class="panel panel-default"> -->



		</div>

		<div class="col-md-8">

			<?php 
			if($searchresults != ""){

				if($_GET['id']==1)
					populateApplicantSearch($searchresults, $_POST["keyInput"]);
				if($_GET['id']==2)
					populateApplicantSearch($searchresults, "filtered search");
				}
			?>

			<hr id="bottomOfResults">
			<?php 
				if($searchresults == "")
				echo "<b><p align=\"center\" class =\"emptyMessage\"> No results. </p></b>"; ?>

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

</div>







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